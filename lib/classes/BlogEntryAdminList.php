<?php

class BlogEntryAdminList {

	private $entryId;
	private $title;
	private $author;
	private $createDate;
	private $displayDate;

	public function __construct($entryId, $title, $authorId, $createDate, $displayDate) {
		$this->entryId = $entryId;
		$this->title = $title;
		$this->createDate = $createDate;
		$this->displayDate = $displayDate;

		$this->author = DB::mqval("SELECT userName FROM User WHERE userId = $authorId");
	}

	public function getEntryId() {
		return $this->entryId;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getAuthor() {
		return $this->author;
	}

	public function getCreateDate() {
		return $this->createDate;
	}

	public function getDisplayDate() {
		return $this->displayDate;
	}

	public function getEditURL() {
		return Config::getURL() . "/ow/blog/edit/" . $this->entryId;
	}

	public function getDeleteURL() {
		return Config::getURL() . "/ow/blog/delete/" . $this->entryId;
	}
}

?>
