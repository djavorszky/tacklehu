<?php

class CaptchaVerifier {

	private static $url = "https://www.google.com/recaptcha/api/siteverify";

	static function verify($response) {
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, self::$url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_POSTFIELDS, "secret=" . Config::getCaptchaSecretKey() . "&response=" . $response);

		$response = curl_exec($ch);
		curl_close ($ch);

		$response = json_decode($response);

		return $response->success;
	}
}

?>