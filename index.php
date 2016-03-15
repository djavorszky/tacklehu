<!DOCTYPE html>
<?php
require_once("lib/init.php");

$response = Handler::respond($_GET, $_POST);
?>

<html>
<head>
	<title><?php echo R::lang("site-title-key") ?></title>
	<?php Config::printBootstrapAndJQueryResources() ?>
	<link rel="shortcut icon" href="<?php echo Config::getURL()?>/res/black-letter-t.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php require_once("lib/views/common/header.php"); ?>
	<div class="container">
		<?php 
			Session::showMessage();

			$response->show();
		?>
	</div>
</body>
</html>


<?php
// This is the end.
require_once("lib/done.php");

?>
