<?php

class Handler {

	private static $defaultAction = "blog";

	public static function respond($getArray, $postArray) {
		if ($getArray['requestUri'] == "" || $getArray['requestUri'] == "index.php") {
			$obj = new Blog();
		}
		else {
			$explodedUri = explode("/", $getArray['requestUri']);

			foreach ($explodedUri as $stuff) {
				$clazz = ucFirst($stuff);

				if (class_exists($clazz)) {
					$obj = new $clazz();
				}
				else {
					// TODO: Implement...
					$obj = new NotFound();
				}
			}
		}

		return $obj;	
	}

}

?>
