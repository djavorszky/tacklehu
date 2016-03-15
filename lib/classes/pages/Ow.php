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
		if (!$id) {
			$this->setView("ow", "blog-edit");
		}

		// Otherwise get all the info from blog stuff and post it somehow or I don't know.
	}

	// Action is to handle POST actions.
	public function action($postArray) {
		if (sizeof($postArray) != 0 && array_key_exists("action", $postArray)) {
			if ($postArray["action"] == "doEditBlogEntry") {
				print_array($postArray);
				BlogEntry::persist($postArray["title"], $postArray["content"], $postArray["userId"]);
			}
		}
	}

}


?>