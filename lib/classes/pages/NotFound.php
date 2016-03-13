<?php

class NotFound extends SuperPage {

	// Constructor..
	public function __construct() {
		$this->setView("error", "404");
	}

	// Show is the default action, always. This is meant to display the default UI.
	public function show() {

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
