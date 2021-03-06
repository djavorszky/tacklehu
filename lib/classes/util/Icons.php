<?php

class Icons {

	private static $iconList = array(
			"blogadmin" => "glyphicon glyphicon-pencil",
			"usersadmin" => "glyphicon glyphicon-user",
			"register" => "glyphicon glyphicon-plus",
			"login" => "glyphicon glyphicon-lock",
			"reset-pw" => "glyphicon glyphicon-repeat"
		);

	static function getIcon($resource) {

		return '<span class="' . self::$iconList["$resource"] . '" aria-hidden="true"> </span>';
	}
}

?>
