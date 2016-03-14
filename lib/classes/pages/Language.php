<?php

class Language extends GetResponseAction {

	public function action($requestUri) {
		$requestArray = explode("/", $requestUri);
		$languageKey = Config::getLanguageKey($requestArray[1]);

		Cookie::setCookie("lang", $languageKey, Cookie::$length_year);
		
		// Can't add a session message via R, because right now it's still one language.
		// However the message will be printed when we've changed the language.
		// So the user's going to see the message in the language of the previous
		// selection, not the new one...

		// Session::addMessage(R::lang("language-change-successful"), "success");

		Security::redirect(Config::getURL());
	}
}
?>
