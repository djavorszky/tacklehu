<?php

class Date {

	static function getLocalDate($originalDate) {
 		return strftime("%B %e, %G, %H:%M", strtotime($originalDate)); 		
	}
}


?>
