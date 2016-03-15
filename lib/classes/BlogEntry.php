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

	static function getEntries($start = 0, $end = 0) {
		
	}
}


?>