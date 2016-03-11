<?php

class R {

	private static $locale = "";

	static function init($locale = "") {
		if ($locale) {
			self::$locale = $locale;
		}
	}

	static function lang($key, $array = array()) {
		if (self::$locale) {
			require("res/langs/lang_" . self::$locale . ".php");
		}
		else {
			require("res/langs/lang.php");
		}

		if (! $$key) {
			die_hard("Language key not found: $key");
		}

		if (sizeof($array) == 0) {
			return $$key;
		}

		return vsprintf($$key, $array);
	}

}




?>