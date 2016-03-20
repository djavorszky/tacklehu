<?php

$debug = true;

require_once("functions/autoload.php");
require_once("functions/misc.php");

// order is important!
Session::start();

Config::init();

DB::init();

DBUpgrader::checkTables();

$lang = Cookie::getCookieValue("lang");

if ($lang && in_array($lang, Config::getLanguages())) {
	R::init($lang);
	setlocale("LC_TIME", "$lang" . "_" . strtoupper($lang));
}
else {
	R::init();
}

$_signedInUser = Session::getSignedInUser();

?>
