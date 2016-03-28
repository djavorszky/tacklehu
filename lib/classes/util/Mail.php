<?php

class Mail {

	private $header;

	private $address;
	private $subject;
	private $body;

	public function __construct() {
		$this->header = Config::getEmailHeader();
	}

	public function setAddress($address) {
		$this->address = $address;
	}

	public function setSubject($subject) {
		$this->subject = $subject;
	}

	public function setBody($body) {
		$this->body = $body;
	}

	public function send() {
		if ($this->address == "" || $this->subject == "" || $this->body == "") {
			error_log("Missing parameters for email.");
			return false;
		}

		return mail($this->address, $this->subject, $this->body, $this->header);
	}

	public function log() {
		error_log("header: $this->header");
		error_log("address: $this->address");
		error_log("subject: $this->subject");
		error_log("body: $this->body");
	}
}

?>
