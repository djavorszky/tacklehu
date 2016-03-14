<?php

abstract class SuperPage {

	protected $component;
	protected $view;
	protected $requestUri;

	public function loadView() {
		include(Config::getRootDir() . "/lib/views/$this->component/$this->view.php");
	}

	public function setView($component, $viewName) {
		$this->component = $component;
		$this->view = $viewName;
	}

	// Show is the default action, always. This is meant to display the default UI.
	public function show() {
		$this->loadView();
	}

	// Constructor..
	abstract public function __construct($uriString);

	// View is for viewing individual entries.
	abstract public function view($uriString);

	// Edit is for editing something or adding a new one.
	abstract public function edit($id = "");

	// Action is to handle POST actions.
	abstract public function action($postArray);
}

?>
