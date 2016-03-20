<?php

class Ow extends SuperPage {

	// Constructor..
	public function __construct($uriString) {
		$explodedUri = explode("/", $uriString);

		$this->setView("ow", "view");

		if (sizeof($explodedUri) > 1) {
			if ($explodedUri[1] == "blog") {
				if (@$explodedUri[2] == "edit") {
					$this->edit(@$explodedUri[3]);
				}
			}
		}
	}

	// View is for viewing individual entries.
	public function view($uriString) {

	}

	// Edit is for editing something or adding a new one.
	public function edit($id = "") {
		if ($id) {
			$result = DB::mq("SELECT entryId, title, content FROM BlogEntry WHERE entryId = $id");
			$blogEntry = mysqli_fetch_object($result);
			$this->setExtraData($blogEntry);
		}

		$this->setView("ow", "blog-edit");

		// Otherwise get all the info from blog stuff and post it somehow or I don't know.
	}

	// Action is to handle POST actions.
	public function action($postArray) {
		if (sizeof($postArray) != 0 && array_key_exists("action", $postArray)) {
			if ($postArray["action"] == "doEditBlogEntry") {
				if (array_key_exists("entryId", $postArray)) {
					$this->updateBlogEntry($postArray);
				}
				else {
					$this->addBlogEntry($postArray);
				}

				Security::redirect(Config::getURL() . "/ow/blog");
			}
			elseif ($postArray["action"] == "doDeleteBlogEntry") {
				BlogEntry::delete($postArray["entryId"]);
				Session::addMessage(R::lang("blog-entry-deleted", array($postArray["entryId"])), "success");
				Security::redirect(Config::getURL() . "/ow/blog");
			}
		}
	}

	private function addBlogEntry($postArray) {
		BlogEntry::persist($postArray["title"], $postArray["content"], $postArray["userId"]);
		Session::addMessage(R::lang("blog-entry-added"), "success");
	}

	private function updateBlogEntry($postArray) {
		BlogEntry::update($postArray['entryId'], $postArray["title"], $postArray["content"], $postArray["userId"]);
		Session::addMessage(R::lang("blog-entry-updated", array($postArray["entryId"])), "success");
	}
}


?>