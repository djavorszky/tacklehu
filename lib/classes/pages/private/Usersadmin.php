<?php

class Usersadmin extends SuperPage {

	// Constructor..
	public function __construct($uriString) {
		$this->restricted = true;
		$this->requiredRole = Role::$role_admin;

		$explodedUri = explode("/", $uriString);

		$this->setView("admin", "user-list");

		if (sizeof($explodedUri) > 1) {
			if (@$explodedUri[1] == "edit") {
				if (isset($explodedUri[2])) {
					$escapedId = DB::escapeSQL($explodedUri[2]);

					$user = User::getUserById($escapedId, true);

					if ($user) {
						$this->setExtraData($user);
					}
				}

				$this->setView("admin", "user-edit");
			}
		}
	}

	// Edit is for editing something or adding a new one.
	public function edit($id = "") {

	}

	// Action is to handle POST actions.
	public function action($postArray) {
		if (isset($postArray["action"])) {
			if ($postArray["action"] == "doDeleteUser") {
				UserEntry::delete($postArray["userId"]);
				Session::addMessage("Deleted the user", "success");
				Security::redirect(Config::getURL("/usersadmin"));
			}
			elseif ($postArray["action"] == "doCreateUser") {
				if (! User::isNameOrEmailTaken($postArray['username'], $postArray['email']) ) {
					$code = Security::generateCode(20);

					$encryptedPassword = Security::encryptPassword($postArray['password'], $code);

					$columns = array(
						"userName" => $postArray['username'],
						"password" => $encryptedPassword,
						"emailAddress" => $postArray['email'],
						"lastLogin" => "NOW()",
						"code_" => $code,
						"roleId" => Role::$role_user
					);

					$userId = DB::insert("User", $columns);

					Session::addMessage(R::lang("user-created"), "success");
					Security::redirect(Config::getURL("/usersadmin"));
				}
				else {
					Session::addMessage(R::lang("user-exists"), "danger");
					Security::redirect(Config::getURL("/usersadmin/edit"));
				}
			}
			elseif ($postArray["action"] == "doUpdateUser") {
				$escapedId = DB::escapeSQL($postArray["userId"]);
				$escapedUserName = DB::escapeSQL($postArray["username"]);
				$escapedEmailAddress = DB::escapeSQL($postArray["email"]);

				$user = User::getUserById($escapedId, true);
				if ($postArray["username"] != $user->userName || $postArray["email"] != $user->emailAddress) {
					if (User::isNameOrEmailTaken($postArray['username'], $postArray['email'])) {
						Session::addMessage(R::lang("user-exists"), "danger");
						Security::redirect(Config::getURL("/usersadmin/edit/$user->userId"));
					}
				}

				if (isset($postArray["password"])) {
					$encryptedPassword = Security::encryptPassword($postArray["password"], $user->code_);
					DB::mq("UPDATE User SET userName = '$escapedUserName', emailAddress = '$escapedEmailAddress', password = '$encryptedPassword' WHERE userId = $escapedId");
				}
				else {
					DB::mq("UPDATE User SET userName = '$escapedUserName', emailAddress = '$escapedEmailAddress' WHERE userId = $escapedId");
				}

				Session::addMessage(R::lang("user-updated"), "success");
				Security::redirect(Config::getURL("/usersadmin"));
			}
		}
	}
}

?>
