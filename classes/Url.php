<?php

class Url {
	private $baseUrl;
	private $parameters;

	function __construct() {
		$this->baseUrl = Config::getUrl();
		$this->parameters = array();
	}

	function add($key, $value) {
		$this->parameters[$key] = $value;
	}

	function construct() {
		
		if (sizeof($this->parameters) == 0) {
			return $baseUrl;
		}

		$url = $this->baseUrl . "?";
		foreach ($this->parameters as $key => $value) {
			$url .= "$key=$value&";
		}

		return rtrim($url, "&");
	}

}


?>