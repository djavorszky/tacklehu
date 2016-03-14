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

	static function getUserById($userId, $withPassword = false) {
		if ($withPassword) {
			return mysqli_fetch_object(DB::mq("SELECT * FROM User WHERE userId = $userId"));
		}
		else {
			return mysqli_fetch_object(DB::mq("SELECT userId, userName, emailAddress, registerDate, lastLogin, firstName, lastName FROM User WHERE userId = $userId"));
		}
	}

	static function getUserByUserName($userName, $withPassword = false) {
		if ($withPassword) {
			return mysqli_fetch_object(DB::mq("SELECT * FROM User WHERE userName = '$userName'"));
		}
		else {
			return mysqli_fetch_object(DB::mq("SELECT userId, userName, emailAddress, registerDate, lastLogin, firstName, lastName FROM User WHERE userName = '$userName'"));
		}
	}

	static function getUserByEmail($emailAddress, $withPassword = false) {
		if ($withPassword) {
			return mysqli_fetch_object(DB::mq("SELECT * FROM User WHERE emailAddress = '$emailAddress'"));
		}
		else {
			return mysqli_fetch_object(DB::mq("SELECT userId, userName, emailAddress, registerDate, lastLogin, firstName, lastName FROM User WHERE emailAddress = '$emailAddress'"));
		}
	}
}


?>