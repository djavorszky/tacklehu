<?php

class Date {

	static function displayLocalDate($originalDate) {
 		return strftime("%B %e, %G, %H:%M", strtotime($originalDate)); 		
	}
}


?>
