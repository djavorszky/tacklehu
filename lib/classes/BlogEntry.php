<?php

class BlogEntry {

	private $entryId;
	private $author;
	private $title;
	private $content;
	private $createDate;
	private $displayDate;

	static function persist($title, $content, $userId) {

		$columns = array(
			"authorId" => $userId,
			"title" => $title,
			"content" => $content,
			"createDate" => "NOW()",
			"displayDate" => "NOW()"
			);

		DB::insert("BlogEntry", $columns);
	}

	static function update($entryId, $title, $content, $userId) {

		$columns = array(
			"title" => $title,
			"content" => $content,
			"authorId" => $userId
		);

		DB::update("BlogEntry", $columns, array("entryId" => $entryId));
	}

	static function delete($entryId) {
		DB::mq("DELETE FROM BlogEntry WHERE entryId = $entryId");
	}

	static function getEntries($start = 0, $end = 10) {
		$limit = $end - $start;

		$result = DB::mq("SELECT * FROM BlogEntry WHERE displayDate <= NOW() LIMIT $start, $limit");

		return self::createReturnArray($result);
	}

	static function getAdminEntries($start = 0, $end = 30) {
		$limit = $end - $start;

		$result = DB::mq("SELECT * FROM BlogEntry LIMIT $start, $limit");

		return self::createReturnArray($result);
	}

	private static function createReturnArray($mysqlResult) {
		$returnArray = array();

		while ($row = mysqli_fetch_object($mysqlResult)) {
			$listEntry = new BlogListEntry($row->entryId, $row->title, $row->content, $row->authorId, $row->createDate, $row->displayDate);
			$returnArray[] = $listEntry;
		}

		return $returnArray;		
	}
}


?>