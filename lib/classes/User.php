<?php

class User {

	static function isNameOrEmailTaken($userName, $emailAddress) {
		$escapedUserName = DB::escapeSQL($userName);
		$escapedEmailAddress = DB::escapeSQL($emailAddress);

		$count = DB::mqval("SELECT count(*) FROM User WHERE userName = '$escapedUserName' OR emailAddress = '$emailAddress'");

		if ($count > 0) {
			return true;
		}

		return false;
	}
}


?>