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

	static function insert($table, $array) {
		if (!is_array($array)) {
			die_hard("Insert called with non-array.");
		}

		$cols = "";
		$values = "";
		foreach ($array as $column => $value) {
			$cols .= "$column, ";
			if (is_numeric($value)) {
				$values .= "$value, ";
			}
			else {
				$values .= "'" . self::escapeSQL($value) . "', ";
			}
		}

		$cols = rtrim($cols, ", ");
		$values = rtrim($values, ", ");

		$query = "INSERT INTO $table ($cols) VALUES ($values);";

		self::mq($query);
	}

	static function mq($query) {
		$q = mysqli_query(self::$connection, $query);
		if (!$q && debug()) {
			echo "<pre>";
			echo "$query<br>";
			echo mysqli_error(self::$connection);
			echo "</pre>";
			error_log("Error with query: \"$query\" -- " . mysqli_error(self::$connection));

		}

		return $q;
	}

	static function mqval($query) {
		return self::mq($query)[0];
	}

	static function insertId() {
		return mysqli_insert_id(self::$connection);
	}

	static function escapeSQL($string) {
		return mysqli_real_escape_string(self::$connection, $string);
	}
}



?>
