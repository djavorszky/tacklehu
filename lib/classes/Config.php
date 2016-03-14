<?php

class Config {

	// Material locations
	private static $bootstrap_js_local = "/res/bootstrap/js/bootstrap.min.js";

	private static $bootstrap_css_local = "/res/bootstrap/css/bootstrap.min.css";

	private static $bootstrap_theme_css = "/res/bootstrap/css/bootstrap-theme.min.css";

	private static $bootstrap_fonts_local = "/res/css/fonts.css";

	private static $jquery_local = "/res/jquery/jquery-2.2.1.min.js";

	// CDN settings
	private static $use_cdn = false;

	// File System settings.
	private static $root_dir = "/home/javdaniel/liferay/git/tacklehu";

	// URL settings
	private static $protocol = "http";
	private static $host = "localhost";
	private static $context = "tacklehu";
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

		session_start();
		ob_start();
	}

	static function printBootstrapAndJQueryResources() {
		if (self::$use_cdn) {
			echo '<script src="https://code.jquery.com/jquery-2.2.1.min.js" integrity="sha256-gvQgAFzTH6trSrAWoH1iPo9Xc96QxSZ3feW6kem+O00=" crossorigin="anonymous"></script>';
			echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">';
			echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">';
			echo '<link rel="stylesheet" href="' . self::getCustomCSS() . '">';
			echo '<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>';
		}
		else {
			echo '<script src="' . self::getJQuery() . '"></script>';
			echo '<link rel="stylesheet" href="' . self::getBootstrapCSS() . '">';
			echo '<link rel="stylesheet" href="' . self::getBootstrapThemeCSS() . '">';
			echo '<link rel="stylesheet" href="' . self::getCustomCSS() . '">';
			echo '<script src="' . self::getBootstrapJS() . '"></script>';
		}
	}

	static function getJQuery() {
		if (self::$context) {
			return "/" . self::$context . self::$jquery_local;
		}
		return self::$jquery_local;
	}

	static function getCustomCSS() {
		if (self::$context) {
			return "/" . self::$context . "/res/css/custom.css";
		}
		return "/res/css/custom.css";
	}

	static function getBootstrapJS() {
		if (self::$context) {
			return "/" . self::$context . self::$bootstrap_js_local;
		}
		return self::$bootstrap_js_local;
	}

	static function getBootstrapCSS() {
		if (self::$context) {
			return "/" . self::$context . self::$bootstrap_css_local;
		}
		return self::$bootstrap_css_local;
	}

	static function getBootstrapThemeCSS() {
		if (self::$context) {
			return "/" . self::$context . self::$bootstrap_theme_css;
		}
		return self::$bootstrap_theme_css;
	}

	static function getBootstrapFonts() {
		if (self::$context) {
			return "/" . self::$context . self::$bootstrap_fonts_local;
		}
		return self::$bootstrap_fonts_local;
	}

	static function useCDN() {
		return self::$use_cdn;
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
			self::$url = self::$protocol . "://" . self::$host . "/" . self::$context;
		}
		else {
			self::$url = self::$protocol . "://" . self::$host;
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
