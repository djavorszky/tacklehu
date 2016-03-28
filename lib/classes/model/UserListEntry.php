<?php

class UserListEntry {

	private $userId;
	private $userName;
	private $emailAddress;
	private $lastLogin;

	public function __construct($userId, $userName, $emailAddress, $lastLogin) {
		$this->userId = $userId;
		$this->userName = $userName;
		$this->emailAddress = $emailAddress;
		$this->lastLogin = $lastLogin;

	}

	public function getUserId() {
		return $this->userId;
	}

	public function getUserName() {
		return $this->userName;
	}

	public function getEmailAddress() {
		return $this->emailAddress;
	}

	public function getAuthor() {
		return $this->author;
	}

	public function getLastLogin() {
		return $this->lastLogin;
	}

	public function getEditURL() {
		return Config::getURL("/usersadmin/edit/" . $this->userId);
	}
}

?>
