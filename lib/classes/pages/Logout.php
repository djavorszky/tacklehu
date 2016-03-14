<?php

class Logout extends GetResponseAction {

	public function action($requestUri) {
		Session::addMessage("Logged out successfully, bye!", "success");
		Session::logUserOut();
		Security::redirect(Config::getURL());
	}

	public function show() {
		// ignore.
	}

}

?>
