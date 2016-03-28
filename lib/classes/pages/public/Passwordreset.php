<?php

class Passwordreset extends SuperPage {

	// Constructor..
	public function __construct($uriString) {
		$uriArray = explode("/", $uriString);

		if (sizeof($uriArray) == 1) {
			$this->setView("passwordreset", "view");
		} 
		else {
			$code = DB::escapeSQL($uriArray[1]);
			
			$pwReset = DB::mqval("SELECT count(*) FROM PasswordReset WHERE code = \"$code\" AND validity > NOW()");

			if ($pwReset == 1) {
				$this->setExtraData($uriArray[1]);
				$this->setView("passwordreset", "resetpw");
			}
			else {
				Session::addMessage(R::lang("password-reset-code-not-found"), "warning");
				Security::redirect(Config::getURL("/passwordreset"));
			}
		}
		
	}

	// Edit is for editing something or adding a new one.
	public function edit($id = "") {

	}

	// Action is to handle POST actions.
	public function action($postArray) {
		if (isset($postArray["action"])) {
			if ($postArray["action"] == "doSendPasswordResetEmail") {
				$escapedEmail = DB::escapeSQL($postArray["email"]);

				$user = User::getUserByEmail($escapedEmail);

				if ($user) {

					do {
						$code = Security::generateCode(20);
					}
					while ($this->codeExists($code));
					
					$this->addCode($user->userId, $code);

					$email = new Mail();
					$email->setAddress($postArray["email"]);
					$email->setSubject(R::lang("password-reset-email-subject"));
					$email->setBody(R::lang("password-reset-email-body", array($code)));

					$email->send();

				}

				Session::addMessage(R::lang("password-reset-email-sent"), "success");
				Security::redirect(Config::getURL());
			}
			elseif ($postArray["action"] == "doResetPassword") {
				if ($postArray["password1"] != $postArray["password2"]) {
					Session::addMessage(R::lang("password-mismatch"), "warning");
					Security::redirect(Config::getURL("/passwordreset/" . $postArray["code"]));
				}

				$code = DB::escapeSQL($postArray["code"]);

				$userId = DB::mqval("SELECT userId FROM PasswordReset WHERE code = '$code'");

				$user = User::getUserById($userId, true);
				$newPassword = Security::encryptPassword($postArray["password1"], $user->code_);

				DB::mq("UPDATE User SET password = '$newPassword' WHERE userId = $userId");

				DB::mq("DELETE FROM PasswordReset WHERE code = '$code'");

				Session::addMessage(R::lang("password-updated"), "success");
				Session::logUserIn($user);
				Security::redirect(Config::getURL());
			}
		} 
	}

	private function codeExists($code) {
		$exists = DB::mqval("SELECT count(*) FROM PasswordReset WHERE code = '$code'");

		if ($exists == 0) {
			return false;
		}

		return true;
	}

	private function addCode($userId, $code) {
		DB::mq("INSERT INTO PasswordReset (userId, code, validity) VALUES ($userId, '$code', NOW() + INTERVAL 1 DAY)");
	}
}


?>
