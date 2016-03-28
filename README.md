# tacklehu

## DB config
You'll need to create lib/config-ext.php file with the following content, otherwise you'll run into a lot of issues.
```
<?php
	$db_host = "host of the database";
	$db_user = "database user";
	$db_pass = "database password";
	$db_database = "database table";

	$protocol = "http or https";
	$host = "host of your site";
	$context = "a context, if any";
	$hasContext = true; // if there's a context, set to true, false otherwise

	$captchaConfigured = true;
	$captchaSiteKey = "Google reCaptcha site key";
	$captchaSecretKey = "Google reCaptcha secret key";
?>
```
