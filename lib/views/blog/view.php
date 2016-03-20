<div class="row">
	<div class="col-sm-8">
	<?php
		$blogEntries = BlogEntry::getEntries();

		foreach ($blogEntries as $key => $blogEntry) {
		?>
		<div class="row">
			<h2><a href="#"><?php echo $blogEntry->getTitle() ?></a></h2>
			<p class="lead">by <a href="#"><?php echo $blogEntry->getAuthor() ?></a></p>
			<p><span class="glyphicon glyphicon-time"></span> posted on <?php echo $blogEntry->getDisplayDate() ?></p>
			<p><?php
				echo Date::displayLocalDate($blogEntry->getDisplayDate());

			 ?></p>
		</div>
		<hr>
			<div class="col-sm-12">
			<p class="text-justify"><?php echo $blogEntry->getContent() ?></p></div>
		<hr>

	<?php } ?>
	</div>
</div>