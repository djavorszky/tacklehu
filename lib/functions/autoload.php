<?php

spl_autoload_register(function ($name) {
	if (file_exists("lib/classes/$name.php")) {
		require_once("lib/classes/$name.php");	
	}
	elseif (file_exists("lib/classes/pages/$name.php")) {
		require_once("lib/classes/pages/$name.php");
	}
	elseif (file_exists("lib/classes/pages/admin/$name.php")) {
		require_once("lib/classes/pages/$name.php");
	}
    
});

?>
