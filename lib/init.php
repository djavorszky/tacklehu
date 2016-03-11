<?php

$debug = true;

require_once("functions/autoload.php");
require_once("functions/misc.php");

// order is important!
Config::init();

DB::init();

DBUpgrader::checkTables();

?>
