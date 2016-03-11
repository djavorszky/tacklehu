<!doctype html>
<?php
require_once("lib/init.php");
?>

<html>
<head>
	<title><?php echo R::lang("site_title_key") ?></title>
	<script src="<?php echo Config::getMaterialJS() ?>"></script>
	<link rel="stylesheet" href="<?php echo Config::getMaterialCSS() ?>">
	<link rel="stylesheet" href="<?php echo Config::getMaterialIcons() ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo Config::getMaterialFonts() ?>">
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
		<?php require_once("lib/views/header.php"); ?>
		<main class="mdl-layout__content">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-cell--2-col-phone">It's alive :-)</div>
				<div class="mdl-cell mdl-cell--4-col">Content</div>
				<div class="mdl-cell mdl-cell--4-col">goes</div>
				<div class="mdl-cell mdl-cell--4-col">stuff.
				</div>
			</div>
		</main>
	</div>
</body>
</html>


<?php
// This is the end.
require_once("lib/done.php");

?>
