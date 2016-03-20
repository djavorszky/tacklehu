<?php global $_signedInUser; 

$blogEntry = $this->getExtraData();
?>
<form class="form-horizontal" action="<?php echo Config::getURL()?>/ow/blog" method="POST">
	<input type="hidden" name="action" value="doEditBlogEntry">
	<?php if ($blogEntry) { ?>
	<input type="hidden" name="entryId" value="<?php echo $blogEntry->entryId ?>">
	<?php } ?>
	<input type="hidden" name="userId" value="<?php echo $_signedInUser->userId?>">
	<div class="form-group">
		<label for="Title" class="col-sm-1 control-label"><?php echo R::lang("title") ?></label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="title" name="title" placeholder="<?php echo R::lang("title") ?>" <?php if ($blogEntry) { echo "value=\"$blogEntry->title\""; } ?>>
		</div>
	</div>
	<div class="form-group">
		<label for="content" class="col-sm-1 control-label"><?php echo R::lang("content") ?></label>
		<div class="col-sm-4">
			<textarea rows="10" class="form-control" name="content" id="content"><?php if ($blogEntry) { echo "$blogEntry->content"; } ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary"><?php if ($blogEntry) { echo R::lang("update-entry"); } else { echo R::lang("add-entry"); } ?></button>
			<a class="btn btn-default" href="<?php echo Config::getURL()?>/ow/blog"><?php echo R::lang("cancel") ?></a>
		</div>
	</div>
</form>