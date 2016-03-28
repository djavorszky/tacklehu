<?php

abstract class GetResponseAction {

	protected $restricted = false;
	protected $requiredRole;
	
	public function isRestricted() {
		return $this->restricted;
	}

	abstract public function __construct($requestUri);

	// The GetResponseAction is only dealing with responses to GET requests.
	// Always, ALWAYS redirect at the end of actions.
	abstract public function action($requestUri);

}


?>