<?php
	function debug() {
		global $debug;
		return $debug;
	}

	function debug_echo($message) {
		echo "<pre>DEBUG: $message</pre>";
	}
?>
