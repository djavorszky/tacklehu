<?php

spl_autoload_register(function ($name) {
	if (file_exists("lib/classes/$name.php")) {
		require_once("lib/classes/$name.php");
	}
	elseif (file_exists("lib/classes/util/$name.php")) {
		require_once("lib/classes/util/$name.php");
	}
	elseif (file_exists("lib/classes/model/$name.php")) {
		require_once("lib/classes/model/$name.php");	
	}
	elseif (file_exists("lib/classes/pages/super/$name.php")) {
		require_once("lib/classes/pages/super/$name.php");
	}
	elseif (file_exists("lib/classes/pages/public/$name.php")) {
		require_once("lib/classes/pages/public/$name.php");
	}
	elseif (file_exists("lib/classes/pages/private/$name.php")) {
		require_once("lib/classes/pages/private/$name.php");
	}

});

?>
