<?php

class Config {
	// Available pages
	private static $pages = array("blog" => "blog", "admin" => "ow");

	// Available languages
	private static $languages = array("hungarian" => "hu", "english" => "en");

	// Bootstrap locations
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
	private static $db_host = "";
	private static $db_user = "";
	private static $db_pass = "";
	private static $db_database = "";

	static function init() {
		mb_internal_encoding("UTF-8");
		mb_http_output('UTF-8');
		mb_http_input('UTF-8');

		ob_start();

		// You'll have to create this file and specify
		// the below 4 variables that correspond to your
		// database settings.
		//
		// This is done because db-config.php is put on
		// .gitignore. If you don't, you'll run into a lot
		// of errors.
		include_once(self::$root_dir . '/lib/config-ext.php');

		self::$db_host = $db_host;
		self::$db_user = $db_user;
		self::$db_pass = $db_pass;
		self::$db_database = $db_database;
		self::$protocol = $protocol;
		self::$host = $host;
		self::$context = $context;
		self::$hasContext = $hasContext;
	}

	static function getPages() {
		return self::$pages;
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
	static function getLanguages() {
		return self::$languages;
	}

	static function getLanguageKey($longKey) {
		return self::$languages[$longKey];
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

	static function end() {
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
