<?php

class DBUpgrader {

	static function checkTables() {
		$q = DB::mq("SELECT * FROM db_upgrade");
		
		$applied = array();

		if (!$q) {
			self::applyDBScript("0-create-db-upgrade-table.sql");
			$applied[0] = "0-create-db-upgrade-table.sql";
		}
		else {
			while ($row = mysqli_fetch_object($q)) {
				$applied[] = $row->file;
			}
		}

		$files = scandir(Config::getRootDir() . "/db");

		foreach ($files as $file) {
			if ($file[0] == ".") {
				continue;
			}

			if (! in_array($file, $applied)) {
				self::applyDBScript($file);
			}
		}
	}

	static function applyDBScript($fileName) {
		$file = fopen(Config::getRootDir() . "/db/$fileName", "r");

		while (($line = fgets($file)) != false) {
			DB::mq($line);
		}

		fclose($file);

		DB::mq("INSERT INTO db_upgrade (file, applied) VALUES ('$fileName', NOW())");
	}

}



?>