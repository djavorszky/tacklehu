<?php

class Cookie {

	public static $length_day = 86400;
	public static $length_week = 604800;
	public static $length_month = 2592000;
	public static $length_year = 31104000;
 

	static function setCookie($name, $value, $length) {
		setcookie($name, $value, time() + $length, "/");
	}

	static function unsetCookie($name) {
		setcookie($name, "", time() - 3600, "/");
	}

	static function getCookieValue($name) {
		if (isset($_COOKIE[$name])) {
			return $_COOKIE[$name];
		}

		return false;
	}

}



?>