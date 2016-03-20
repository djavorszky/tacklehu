<?php

class BlogEntry {

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
		
	}

	static function getAdminEntries($start = 0, $end = 30) {
		$limit = $end - $start;

		$result = DB::mq("SELECT entryId, title, authorId, createDate, displayDate FROM BlogEntry LIMIT $start, $limit");

		$returnArray = array();

		while ($row = mysqli_fetch_object($result)) {
			$listEntry = new BlogEntryAdminList($row->entryId, $row->title, $row->authorId, $row->createDate, $row->displayDate);
			$returnArray[] = $listEntry;
		}

		return $returnArray;
	}
}


?>