<?php

require_once("config.php");

$url = new Url();

$url->add("page", "test");

echo $url->construct();
echo "\n";
$url->add("loc", "2");
$url->add("id", "14141");

echo $url->construct() . "\n";
?>


<?php
// This is the end.
Config::destroy();

?>
