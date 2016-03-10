<?php

spl_autoload_register(function ($name) {
    if (debug()) echo "Loading class $name.\n";
    require_once("classes/$name.php");
});

?>
