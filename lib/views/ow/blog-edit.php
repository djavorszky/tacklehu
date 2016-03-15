<?php global $_signedInUser; ?>
<form class="form-horizontal" action="<?php echo Config::getURL()?>/ow/blog" method="POST">
	<input type="hidden" name="action" value="doEditBlogEntry">
	<input type="hidden" name="userId" value="<?php echo $_signedInUser->userId?>">
	<div class="form-group">
		<label for="Title" class="col-sm-1 control-label">Title</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="title" name="title" placeholder="Title">
		</div>
	</div>
	<div class="form-group">
		<label for="content" class="col-sm-1 control-label">Content</label>
		<div class="col-sm-4">
			<textarea rows="10" class="form-control" name="content" id="content"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10">
			<button type="submit" class="btn btn-primary">Add entry</button>
			<a class="btn btn-default" href="<?php echo Config::getURL()?>/ow/blog">Cancel</a>
		</div>
	</div>
</form>