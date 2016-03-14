<div class="jumbotron">
	<div class="page-header">
  		<h1><?php echo R::lang("page-not-found-title")?> <small><?php echo R::lang("page-not-found-subtitle", array("404")) ?></small></h1>
	</div>
  <p><?php echo R::lang("page-not-found-explanation") ?></p>
  <p><a class="btn btn-primary btn-lg" href="<?php echo Config::getURL() ?>" role="button"><?php echo R::lang("page-not-found-action") ?></a></p>
</div>
