<?php

spl_autoload_register(function ($name) {
    if (debug()) debug_echo("Loading class $name.");
    require_once("classes/$name.php");
});

?>
