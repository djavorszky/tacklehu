<?php

class UserEntry {

	private $userId;
	private $userName;
	private $firstName;
	private $lastName;
	private $emailAddress;
	private $password;
	private $code;
	private $registerDate;
	private $lastLogin;
	private $roleId;

	static function persist() {

		$columns = array(
			"authorId" => $userId,
			"title" => $title,
			"displayContent" => $displayContent,
			"rawContent" => $rawContent,
			"createDate" => "NOW()",
			"displayDate" => "NOW()"
			);

		DB::insert("BlogEntry", $columns);
	}

	static function update() {

		$columns = array(
			"title" => $title,
			"displayContent" => $displayContent,
			"rawContent" => $rawContent,
			"authorId" => $userId
		);

		DB::update("BlogEntry", $columns, array("entryId" => $entryId));
	}

	static function delete($userId) {
		DB::mq("DELETE FROM User WHERE userId = $userId");
	}

	static function getEntries($start = 0, $end = 10) {
		$limit = $end - $start;

		$result = DB::mq("SELECT userId, userName, emailAddress, lastLogin FROM User ORDER BY userId DESC LIMIT $start, $limit");

		return self::createReturnArray($result);
	}

	private static function createReturnArray($mysqlResult) {
		$returnArray = array();

		while ($row = mysqli_fetch_object($mysqlResult)) {
			$listEntry = new UserListEntry($row->userId, $row->userName, $row->emailAddress, $row->lastLogin);
			$returnArray[] = $listEntry;
		}

		return $returnArray;		
	}
}


?>