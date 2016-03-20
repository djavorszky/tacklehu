<?php

class BlogListEntry {

	private $entryId;
	private $title;
	private $content;
	private $author;
	private $createDate;
	private $displayDate;

	public function __construct($entryId, $title, $content, $authorId, $createDate, $displayDate) {
		$this->entryId = $entryId;
		$this->title = $title;
		$this->content = $content;
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

	public function getContent() {
		return $this->content;
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
}

?>
