<?php

class Usersadmin extends SuperPage {

	// Constructor..
	public function __construct($uriString) {
		$this->setView("admin", "user-list");
	}

	// Edit is for editing something or adding a new one.
	public function edit($id = "") {

	}

	// Action is to handle POST actions.
	public function action($postArray) {

	}

}


?>
