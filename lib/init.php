<?php

$debug = true;

require_once("functions/autoload.php");
require_once("functions/misc.php");

// order is important!
Session::start();

Config::init();

DB::init();

DBUpgrader::checkTables();

R::init("hu");

$_signedInUser = Session::getSignedInUser();

?>
