<?php

class Security {

	private static $availableCharacters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789?!=";
	private static $randMax = 63;

	static function generateCode($length) {		
		$code = "";

		for ($i = 0; $i < $length; $i++) {
			$rand = rand(0, self::$randMax);
			$code .= self::$availableCharacters[$rand];
		}

		return $code;
	}
}



?>