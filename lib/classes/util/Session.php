<?php

class Session {

	static function start() {
		session_start();
	}

	static function addMessage($message, $type) {
		$_SESSION['messageText'] = $message;
		$_SESSION['messageType'] = $type;
	}

	static function showMessage() {
		if (isset($_SESSION['messageText'])) {
			echo '<div class="alert alert-' . $_SESSION['messageType'] . ' alert-dismissible" role="alert">';
			echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
			echo $_SESSION['messageText'];
			echo '</div>';

			unset($_SESSION['messageText']);
			unset($_SESSION['messageType']);
		}
	}

	static function logUserIn($user) {
		$_SESSION['user'] = $user;
	}

	static function logUserOut() {
		unset($_SESSION['user']);
	}

	static function getSignedInUser() {
		if (isset($_SESSION['user'])) {
			return $_SESSION['user'];
		}
		else {
			return false;
		}
	}
}



?>