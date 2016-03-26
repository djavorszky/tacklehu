<!DOCTYPE html>
<?php
$start = microtime(true);
require_once("lib/init.php");

$response = Handler::respond($_GET, $_POST);
?>

<html>
<head>
	<title><?php echo R::lang("site-title-key") ?></title>
	<?php Config::printBootstrapAndJQueryResources() ?>
	<?php if (Config::isCaptchaConfigured()) { ?> 
		<script src='https://www.google.com/recaptcha/api.js'></script>
	<?php } ?>
	<link rel="shortcut icon" href="<?php echo Config::getURL('/res/black-letter-t.ico')?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="container">
		<?php require_once("lib/views/common/header.php"); ?>

		<?php 
			Session::showMessage();

			$response->show();
		?>

	</div>
	<?php 
		$pageLoad = microtime(true) - $start;
		echo round($pageLoad * 1000) . " ms";
	?>
</body>
</html>
<?php
// This is the end.
require_once("lib/done.php");
?>
