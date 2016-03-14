<?php

abstract class GetResponseAction {

	// The GetResponseAction is only dealing with responses to GET requests. 
	abstract public function action($requestUri);

	// This is just here because reasons. Otherwise errors.
	abstract public function show();
}


?>