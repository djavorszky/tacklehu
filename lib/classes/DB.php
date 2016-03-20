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
			elseif ($value != "NOW()") {
				$values .= "'" . self::escapeSQL($value) . "', ";
			}
			else {
				$values .= "NOW(), ";
			}
		}

		$cols = rtrim($cols, ", ");
		$values = rtrim($values, ", ");

		$query = "INSERT INTO $table ($cols) VALUES ($values);";

		self::mq($query);

		return self::insertId();
	}

	static function update($table, $columns, $where) {
		if (!is_array($columns) || !is_array($where)) {
			die_hard("Update called with non-array(s).");
		}

		$updatingString = "";
		foreach ($columns as $column => $value) {
			if (is_numeric($value)) {
				$processedValue = $value;
			}
			elseif ($value != "NOW()") {
				$processedValue = "'" . self::escapeSQL($value) . "'";
			}
			else {
				$proccessedValue = "NOW()";
			}

			$updatingString .= "$column = $processedValue, ";
		}

		$updatingString = rtrim($updatingString, ", ");

		foreach ($where as $column => $value) {
			$whereString = "$column = $value";
		}

		$query = "UPDATE $table SET $updatingString WHERE $whereString";

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
		return mysqli_fetch_array(self::mq($query))[0];
	}

	static function insertId() {
		return mysqli_insert_id(self::$connection);
	}

	static function escapeSQL($string) {
		return mysqli_real_escape_string(self::$connection, $string);
	}
}



?>
