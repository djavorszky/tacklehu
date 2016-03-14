<!doctype html>
<?php
require_once("lib/init.php");

$response = Handler::respond($_GET, $_POST);
?>

<html>
<head>
	<title><?php R::lang("site-title-key") ?></title>
	<?php Config::printBootstrapAndJQueryResources() ?>
</head>
<body>
	<?php require_once("lib/views/common/header.php"); ?>
	<div class="container">
		<?php 
			Session::showMessage();

			if ($_user) {
				echo "User '$_user->userName' is logged in.";
			}

			$response->show();
		?>
	</div>
</body>
</html>


<?php
// This is the end.
require_once("lib/done.php");

?>
