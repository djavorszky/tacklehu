<?php

class DB {


	private static $connection;

	static function init() {
		$host = Config::getDBHost();
		$user = Config::getDBUser();
		$password = Config::getDBPass();
		$database = Config::getDBDatabase();

		self::$connection = mysqli_connect($host, $user, $password, $database);

		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error() . "\n";
		}

		self::mq("SET NAMES utf8;");
	}

	static function mq($query) {
		$q = mysqli_query(self::$connection, $query);
		if (!$q && debug()) {
			echo "<pre>";
			echo "$query\n";
			echo mysqli_error(self::$connection);
			echo "</pre>";
		}

		return $q;
	}

	static function mqval($query) {
		return self::mq($query)[0];
	}

	static function insertId() {
		return mysqli_insert_id(self::$connection);
	}
}



?>
