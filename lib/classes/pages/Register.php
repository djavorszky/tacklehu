<?php

class Register extends SuperPage {
	// Constructor..
	public function __construct($uriString) {
		$this->setView("register", "view");
	}

	// View is for viewing individual entries.
	public function view($uriString) {

	}

	// Edit is for editing something or adding a new one.
	public function edit($id = "") {

	}

	// Action is to handle POST actions.
	public function action($postArray) {
		if (sizeof($postArray) != 0 && array_key_exists("action", $postArray) && $postArray["action"] == "doRegister") {
			if ($postArray['password'] == $postArray['password2']) {
				if (! User::isNameOrEmailTaken($postArray['username'], $postArray['email'])) {
					$code = Security::generateCode(20);

					$encryptedPassword = Security::encryptPassword($postArray['password'], $code);

					// TODO: Implement captcha.

					$columns = array(
						"userName" => $postArray['username'],
						"password" => $encryptedPassword,
						"emailAddress" => $postArray['email'],
						"lastLogin" => "NOW()",
						"registerDate" => "NOW()",
						"code_" => $code
					);

					$userId = DB::insert("User", $columns);

					$user = User::getUserById($userId);

					Session::addMessage(R::lang("register-success", array(Security::escapeHTML($user->userName))), "success");
					Session::logUserIn($user);
					Security::redirect(Config::getURL());
				}
				else {
					Session::addMessage(R::lang("user-exists"), "warning");
					Security::redirect(Config::getURL() . "/register");
				}
			}
			else {
				Session::addMessage(R::lang("password-mismatch"), "warning");
				Security::redirect(Config::getURL() . "/register");
			}
		}
	}
}


?>