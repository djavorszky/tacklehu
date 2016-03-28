<?php

class Url {

	static function isCurrentPage($href) {
		if ($_GET["requestUri"] == $href || ($href == "blog" && $_GET["requestUri"] == "")) {
			return true;
		}

		return false;
	}
}
?>
