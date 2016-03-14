<?php

class Blog extends SuperPage {

	public function __construct($requestUri) {
		$this->requestUri = $requestUri;

		$this->setView("blog", "view");
	}

	// View is for viewing individual entries.
	public function view($uriString) {
		//TODO implement.
	}

	// Edit is for editing something or adding a new one.
	public function edit($id = "") {
		//TODO implement.
	}

	// Action is to handle POST actions.
	public function action($postArray) {
		//TODO implement.
	}
}

?>