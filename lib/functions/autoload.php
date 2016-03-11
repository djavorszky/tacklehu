<?php

spl_autoload_register(function ($name) {
    require_once("lib/classes/$name.php");
});

?>
