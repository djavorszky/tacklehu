<?php

class Config {
	// File System settings.
	private static $root_dir = "/home/javdaniel/liferay/git/tacklehu";

	// URL settings
	private static $protocol = "http";
	private static $host = "localhost";
	private static $context = "tacklehu";
	private static $page = "index.php";
	private static $hasContext = true;
	private static $url;

	// Database settings
	private static $db_host = "localhost";
	private static $db_user = "root";
	private static $db_pass = "root";
	private static $db_database = "tacklehu";

	static function init() {
		mb_internal_encoding("UTF-8");
		mb_http_output('UTF-8');
		mb_http_input('UTF-8');

// 		TODO comment it back once this is on a server.
//		date_default_timezone_set($server_timezone);
//		session_start();
		ob_start();

	}

	static function destroy() {
		ob_end_flush();
	}

	static function getRootDir() {
		return self::$root_dir;
	}

	static function getUrl() {
		if (!self::$url) {
			self::constructUrl();
		}

		return self::$url;
	}

	static function setHasContext($boolean) {
		self::$hasContext = $boolean;
		self::constructUrl();
	} 

	private function constructUrl() {
		if (self::$hasContext) {
			self::$url = self::$protocol . "://" . self::$host . "/" . self::$context . "/" . self::$page;
		}
		else {
			self::$url = self::$protocol . "://" . self::$host . "/" . self::$page;
		}
	}

	static function getDBHost() {
		return self::$db_host;
	}

	static function getDBUser() {
		return self::$db_user;
	}

	static function getDBPass() {
		return self::$db_pass;
	}

	static function getDBDatabase() {
		return self::$db_database;
	}

}

?>
