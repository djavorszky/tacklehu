<?php

class R {

	private static $langValues = array();

	static function init($locale = "") {

		if ($locale) {
			$fileName = "lang_$locale.properties";	
		}
		else {
			$fileName = "lang.properties";			
		}

		$file = fopen(Config::getRootDir() . "/res/langs/$fileName", "r");

		while (($line = fgets($file)) != false) {
			if ($line != "\n") {
				$keyValue = explode("=", $line);
				self::$langValues[$keyValue[0]] = $keyValue[1];
			}
		}

		fclose($file);
	}

	static function lang($key, $array = array()) {
		if (! array_key_exists($key, self::$langValues)) {
			die_hard("Language key not found: $key");
		}

		if (sizeof($array) == 0) {
			return self::$langValues[$key];
		}
		
		echo vsprintf(self::$langValues[$key], $array);
	}

}




?>