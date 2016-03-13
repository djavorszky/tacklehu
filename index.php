<!doctype html>
<?php
require_once("lib/init.php");

$user = "tackle";

$response = Handler::respond($_GET, $_POST);
?>

<html>
<head>
	<title><?php echo R::lang("site-title-key") ?></title>
	<script src="<?php echo Config::getMaterialJS() ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Config::getCustomCSS() ?>">
	<link rel="stylesheet" href="<?php echo Config::getMaterialCSS() ?>">
	<link rel="stylesheet" href="<?php echo Config::getMaterialIcons() ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo Config::getMaterialFonts() ?>">
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		<?php require_once("lib/views/common/header.php"); ?>
		<main class="mdl-layout__content">
			<div class="mdl-grid">
				<?php 
					$response->show();
				?>
			</div>
		</main>
	</div>
</body>
</html>


<?php
// This is the end.
require_once("lib/done.php");

?>
