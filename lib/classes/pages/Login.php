<?php

class Login extends SuperPage {

	// Constructor..
	public function __construct($requestUri) {
		$this->setView("login", "view");
	}

	// View is for viewing individual entries.
	public function view($uriString) {

	}

	// Edit is for editing something or adding a new one.
	public function edit($id = "") {

	}

	// Action is to handle POST actions.
	public function action($postArray) {
		if (sizeof($postArray) != 0 && array_key_exists("action", $postArray) && $postArray["action"] == "doLogin") {
			$escapedEmailAddress = DB::escapeSQL($postArray['email']);

			$user = User::getUserByEmail($escapedEmailAddress, true);

			if ($user) {
				$encryptedPassword = Security::encryptPassword($postArray['password'], $user->code_);
				if ($encryptedPassword == $user->password) {

					Session::logUserIn(User::getUserById($user->userId));
					DB::mq("UPDATE User SET lastLogin = NOW() WHERE userId = $user->userId");
					Session::addMessage("Some success here.", "success");
					Security::redirect(Config::getURL());
				}
				else {
					Session::addMessage("User doesn't exist or wrong password", "warning");
				}
			}
			else {
				Session::addMessage("User doesn't exist or wrong password", "warning");
			}
		}

		// TODO implement captcha after 3 attempts.
		// new table: FailedLogins or something and save $_SERVER['REMOTE_ADDR'] 
		// on failed logins. After 3 attempts, display captcha.
	}

	// Link that will inevitably call the "show()" method.
	public function getDefaultPageLink() {

	}

	// Link that will inevitably call the "view()" method.
	public function getViewPageLink($uriString) {

	}

	// Link that will inevitably call the "edit()" method.
	public function getEditPageLink($uriString) {

	}

}


?>