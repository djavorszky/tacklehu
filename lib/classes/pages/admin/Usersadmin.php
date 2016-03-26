<?php

class Usersadmin extends SuperPage {

	// Constructor..
	public function __construct($uriString) {
		$explodedUri = explode("/", $uriString);

		$this->setView("admin", "user-list");

		if (sizeof($explodedUri) > 1) {
			if (@$explodedUri[1] == "edit") {
				$this->edit(@$explodedUri[2]);
			}
		}
	}

	// Edit is for editing something or adding a new one.
	public function edit($id = "") {

	}

	// Action is to handle POST actions.
	public function action($postArray) {
		if (isset($postArray["action"]) && $postArray["action"] == "doDeleteUser") {
			UserEntry::delete($postArray["userId"]);
			Session::addMessage("Deleted the user", "success");
			Security::redirect(Config::getURL("/usersadmin"));
		}
	}

}


?>
