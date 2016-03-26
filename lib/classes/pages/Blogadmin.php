<?php

class Blogadmin extends SuperPage {

	// Constructor..
	public function __construct($uriString) {
		$explodedUri = explode("/", $uriString);

		$this->setView("admin", "blog-list");

		if (sizeof($explodedUri) > 1) {
			if (in_array("preview", $explodedUri)) {
				// This part is for viewing the preview of the file.
				$this->echoPreview();
				die();
			} else if (@$explodedUri[1] == "edit") {
				$this->edit(@$explodedUri[2]);
			}
		}
	}

	// View is for viewing individual entries.
	public function view($uriString) {

	}

	// Edit is for editing something or adding a new one.
	public function edit($id = "") {
		if ($id) {
			$result = DB::mq("SELECT entryId, title, displayContent, rawContent FROM BlogEntry WHERE entryId = $id");
			$blogEntry = mysqli_fetch_object($result);
			$this->setExtraData($blogEntry);
		}

		$this->setView("admin", "blog-edit");
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

				Security::redirect(Config::getURL("/blogadmin"));
			}
			elseif ($postArray["action"] == "doDeleteBlogEntry") {
				BlogEntry::delete($postArray["entryId"]);
				Session::addMessage(R::lang("blog-entry-deleted", array($postArray["entryId"])), "success");
				Security::redirect(Config::getURL("/blogadmin"));
			}
		}
	}

	private function addBlogEntry($postArray) {
		$Parsedown = new Parsedown();

		$escapedTitle = Security::escapeHTML($postArray["title"]);
//		$escapedContent = Security::escapeHTML($postArray["content"]);

		$parsedContent = $Parsedown->text($postArray["content"]);
		$rawContent = $postArray["content"];

		BlogEntry::persist($escapedTitle, $parsedContent, $rawContent, $postArray["userId"]);
		Session::addMessage(R::lang("blog-entry-added"), "success");
	}

	private function updateBlogEntry($postArray) {
		$Parsedown = new Parsedown();

		$escapedTitle = Security::escapeHTML($postArray["title"]);
//		$escapedContent = Security::escapeHTML($postArray["content"]);

		$parsedContent = $Parsedown->text($postArray["content"]);
		$rawContent = $postArray["content"];

		BlogEntry::update($postArray['entryId'], $escapedTitle, $parsedContent, $rawContent, $postArray["userId"]);
		Session::addMessage(R::lang("blog-entry-updated", array($postArray["entryId"])), "success");
	}

	private function echoPreview() {
		if (isset($_POST)) {
			$Parsedown = new Parsedown();

//			$escapedContent = Security::escapeHTML($_POST["content"]);

			$parsed = $Parsedown->text($_POST["content"]);

			echo $parsed;
		}
	}

}


?>	