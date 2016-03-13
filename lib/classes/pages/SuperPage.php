<?php

abstract class SuperPage {

	protected $component;
	protected $view;

	public function loadView() {
		include(Config::getRootDir() . "/lib/views/$this->component/$this->view.php");
	}

	public function setView($component, $viewName) {
		$this->component = $component;
		$this->view = $viewName;
	}

	// Constructor..
	abstract public function __construct();

	// Show is the default action, always. This is meant to display the default UI.
	abstract public function show();

	// View is for viewing individual entries.
	abstract public function view($uriString);

	// Edit is for editing something or adding a new one.
	abstract public function edit($id = "");

	// Action is to handle POST actions.
	abstract public function action($postArray);

	// Link that will inevitably call the "show()" method.
	abstract public function getDefaultPageLink();

	// Link that will inevitably call the "view()" method.
	abstract public function getViewPageLink($uriString);

	// Link that will inevitably call the "edit()" method.
	abstract public function getEditPageLink($uriString);
}



?>