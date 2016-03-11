<?php
	function debug() {
		global $debug;
		return $debug;
	}

	function debug_echo($message) {
		echo "<pre>DEBUG: $message</pre>";
	}

	function die_hard($message) {
		error_log($message);
		die();
	}
?>
