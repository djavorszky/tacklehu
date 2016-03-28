<?php

class Security {

	private static $availableCharacters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
	private static $randMax = 60;

	static function generateCode($length) {
		$code = "";

		for ($i = 0; $i < $length; $i++) {
			$rand = rand(0, self::$randMax);
			$code .= self::$availableCharacters[$rand];
		}

		return $code;
	}

	static function encryptPassword($password, $hash) {
		return crypt($password, "$6$" . md5($hash));
	}

	static function redirect($location) {
		header("Location: $location");
		die();
	}

	static function escapeHTML($text) {
		return htmlspecialchars($text);
	}
}



?>