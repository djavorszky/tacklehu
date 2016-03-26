<?php global $_signedInUser; 

$blogEntry = $this->getExtraData();
?>
<div class="col-sm-6">
	<h2>Edit</h2>
<form class="form-horizontal" action="<?php echo Config::getURL("/ow/blog")?>" method="POST">
	<input type="hidden" name="action" value="doEditBlogEntry">
	<?php if ($blogEntry) { ?>
	<input type="hidden" name="entryId" value="<?php echo $blogEntry->entryId ?>">
	<?php } ?>
	<input type="hidden" name="userId" value="<?php echo $_signedInUser->userId?>">
	<div class="form-group">
		<label for="Title" class="col-sm-2 control-label"><?php echo R::lang("title") ?></label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="title" name="title" placeholder="<?php echo R::lang("title") ?>" <?php if ($blogEntry) { echo "value=\"$blogEntry->title\""; } ?> required>
		</div>
	</div>
	<div class="form-group">
		<label for="content" class="col-sm-2 control-label"><?php echo R::lang("content") ?></label>
		<div class="col-sm-10">
			<textarea rows="10" class="form-control" name="content" id="content" required><?php if ($blogEntry) { echo "$blogEntry->content"; } ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><?php if ($blogEntry) { echo R::lang("update-entry"); } else { echo R::lang("add-entry"); } ?></button>
			<a class="btn btn-default" href="<?php echo Config::getURL("/ow/blog")?>"><?php echo R::lang("cancel") ?></a>
		</div>
	</div>
</form>
</div>
<div class="col-sm-6">
	<h2>Preview</h2>
	<div id="blog-edit-preview"></div>
</div>