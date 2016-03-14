<?php

class Logout extends GetResponseAction {

	public function action($requestUri) {
		Session::addMessage(R::lang("logout-successful"), "success");
		Session::logUserOut();
		Security::redirect(Config::getURL());
	}

}

?>
