<div class="mdl-card mdl-shadow--4dp" style="margin:0 auto; width:720px;">
	<div class="mdl-card__title">
		<h2 class="mdl-card__title-text"><?php echo R::lang("page-not-found-title"); ?></h2>
	</div>
	<div class="mdl-card__supporting-text mdl-card--border">
		<h3 class="mdl-card__title-text"><?php echo R::lang("page-not-found-subtitle", array("404")) ?></h3>
	</div>
	<div class="mdl-card__supporting-text mdl-card--border">
		<?php echo R::lang("page-not-found-explanation") ?>
	</div>

	<div class="mdl-card__actions mdl-card--border" style="text-align:center;" >
		<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" href="<?php echo Config::getURL() ?>">
			<?php echo R::lang("page-not-found-action") ?>
		</a>
	</div>
</div>
