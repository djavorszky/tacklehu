<?php

abstract class SuperPage {

	protected $restricted = false;
	protected $requiredRole;
	protected $component;
	protected $view;
	protected $requestUri;
	protected $extraData;

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

	public function setExtraData($extraData) {
		$this->extraData = $extraData;
	}

	public function getExtraData() {
		return $this->extraData;
	}

	public function isRestricted() {
		return $this->restricted;
	}

	public function getRequiredRole() {
		return $this->requiredRole;
	}

	// Constructor..
	abstract public function __construct($uriString);

	// Edit is for editing something or adding a new one.
	abstract public function edit($id = "");

	// Action is to handle POST actions.
	abstract public function action($postArray);
}

?>
