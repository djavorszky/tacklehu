<!doctype html>
<?php
require_once("lib/init.php");

$user = "tackle";

$response = Handler::respond($_GET, $_POST);
?>

<html>
<head>
	<title><?php echo R::lang("site-title-key") ?></title>
	<?php Config::printBootstrapAndJQueryResources() ?>
</head>
<body>
	<?php require_once("lib/views/common/header.php"); ?>
	<div class="container">
		<?php 
			$response->show();
		?>
	</div>
</body>
</html>


<?php
// This is the end.
require_once("lib/done.php");

?>
