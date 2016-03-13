<?php

class Handler {

	private static $defaultAction = "blog";

	public static function respond($getArray, $postArray) {
		$requestUri = $getArray['requestUri'];

		if ($requestUri == "" || $requestUri == "index.php") {
			$obj = new Blog($requestUri);
		}
		else {
			$explodedUri = explode("/", $requestUri);

			$clazz = ucFirst($explodedUri[0]);

			if (class_exists($clazz)) {
				$obj = new $clazz($requestUri);
				$obj->action($postArray);
			}
			else {
				$obj = new NotFound($requestUri);
			}
		}

		return $obj;	
	}

}

?>
