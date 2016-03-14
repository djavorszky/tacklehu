<?php

class NotFound extends SuperPage {

	// Constructor..
	public function __construct($requestUri) {
		$this->setView("error", "404");
	}

	// View is for viewing individual entries.
	public function view($uriString) {

	}

	// Edit is for editing something or adding a new one.
	public function edit($id = "") {

	}

	// Action is to handle POST actions.
	public function action($postArray) {

	}
}
?>
