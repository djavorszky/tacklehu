<?php

class Logout extends GetResponseAction {

	public function __construct($requestUri) {
		$this->restricted = false;
		$this->requiredRole = Role::$role_user;
	}

	public function action($requestUri) {
		Session::addMessage(R::lang("logout-successful"), "success");
		Session::logUserOut();
		Security::redirect(Config::getURL());
	}

}

?>
