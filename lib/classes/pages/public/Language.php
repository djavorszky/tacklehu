<?php

class Language extends GetResponseAction {

	public function __construct($requestUri) {
		$this->restricted = false;
	}

	public function action($requestUri) {
		$requestArray = explode("/", $requestUri);
		$languageKey = Config::getLanguageKey($requestArray[1]);

		Cookie::setCookie("lang", $languageKey, Cookie::$length_year);
		
		switch ($languageKey) {
			case 'en':
				$message = "Language changed successfully!";
				break;
			
			default:
				$message = "Sikeres nyelvváltás!";
				break;
		}
		
		Session::addMessage($message, "success");
		Security::redirect(Config::getURL());
	}
}
?>
