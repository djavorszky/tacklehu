<?php

#error_reporting(-1);
//ini_set('display_errors', 'On');
//set_error_handler("var_dump");

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
}
else {
	R::init("hu");
}

setlocale(LC_TIME, Config::getFullLocale($lang));


$_signedInUser = Session::getSignedInUser();

?>
