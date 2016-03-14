<?php

abstract class GetResponseAction {

	// The GetResponseAction is only dealing with responses to GET requests.
	// Always, ALWAYS redirect at the end of actions.
	abstract public function action($requestUri);

}


?>