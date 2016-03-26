<div class="col-sm-8">
	<?php
		$blogEntries = BlogEntry::getEntries();

		foreach ($blogEntries as $key => $blogEntry) {
		?>
		<div class="row">
			<h2><a href="#"><?php echo $blogEntry->getTitle() ?></a></h2>
			<p class="lead"><?php echo R::lang("posted-by") ?> <a href="#"><?php echo $blogEntry->getAuthor() ?></a></p>
			<p><span class="glyphicon glyphicon-time"></span> <?php echo R::lang("posted-on", array(Date::getLocalDate($blogEntry->getDisplayDate()))) ?></p>
		</div>
		<hr>
		<div class="col-sm-12">
			<p class="text-justify"><?php echo $blogEntry->getContent() ?></p>
		</div>
		<div class="row">
			<div class="col-sm-12"><hr></div>
		</div>
	<?php } ?>
</div>

<?php require_once("lib/views/common/sidebar.php"); ?>
