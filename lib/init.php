<?php

$debug = true;

require_once("functions/autoload.php");
require_once("functions/misc.php");

// order is important!
Session::start();

Config::init();

DB::init();

DBUpgrader::checkTables();

if ($lang = Cookie::getCookieValue("lang")) {
	R::init($lang);
}
else {
	R::init();
}

$_signedInUser = Session::getSignedInUser();

?>
