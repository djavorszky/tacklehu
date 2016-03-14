<?php

class Config {

	// Material locations
	private static $mdl_js_local = "/res/material/material.min.js";
	private static $mdl_js_cdn = "https://code.getmdl.io/1.1.2/material.min.js";

	private static $mdl_css_local = "/res/material/material.min.css";
	private static $mdl_css_cdn = "https://code.getmdl.io/1.1.2/material.indigo-red.min.css";

	private static $mdl_icons_local = "/res/css/icons.css";
	private static $mdl_icons_cdn = "https://fonts.googleapis.com/icon?family=Material+Icons";

	private static $mdl_fonts_local = "/res/css/fonts.css";
	private static $mdl_fonts_cdn = "http://fonts.googleapis.com/css?family=Roboto:300,400,500,700";

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

	static function getCustomCSS() {
		if (self::$context) {
			return "/" . self::$context . "/res/css/custom.css";
		}
		return "/res/css/custom.css";
	}

	static function getMaterialJS() {
		if (self::useCDN()) {
			return self::$mdl_js_cdn;
		}
		else {
			if (self::$context) {
				return "/" . self::$context . self::$mdl_js_local;
			}
			return self::$mdl_js_local;
		}
	}

	static function getMaterialCSS() {
		if (self::useCDN()) {
			return self::$mdl_css_cdn;
		}
		else {
			if (self::$context) {
				return "/" . self::$context . self::$mdl_css_local;
			}
			return self::$mdl_css_local;
		}
	}

	static function getMaterialIcons() {
		if (self::useCDN()) {
			return self::$mdl_icons_cdn;
		}
		else {
			if (self::$context) {
				return "/" . self::$context . self::$mdl_icons_local;
			}
			return self::$mdl_icons_local;
		}
	}

	static function getMaterialFonts() {
		if (self::useCDN()) {
			return self::$mdl_fonts_cdn;
		}
		else {
			if (self::$context) {
				return "/" . self::$context . self::$mdl_fonts_local;
			}
			return self::$mdl_fonts_local;
		}
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
