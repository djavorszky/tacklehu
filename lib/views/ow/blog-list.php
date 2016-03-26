
<div class="row">
	<a class="btn btn-primary" href="<?php echo Config::getURL("/ow/blog/edit")?>"><?php echo R::lang("add-entries") ?></a>
</div>
	<br>
<div class="row">
<?php
$count = DB::mqval("SELECT count(*) FROM BlogEntry");

if ($count > 0) {

	$adminBlogEntries = BlogEntry::getAdminEntries();
?>
<table class="table table-striped table-hover table-responsive">
	<tr>
		<th><?php echo R::lang("entry-id") ?></th>
		<th><?php echo R::lang("title-table") ?></th>
		<th><?php echo R::lang("author") ?></th>
		<th><?php echo R::lang("create-date") ?></th>
		<th><?php echo R::lang("display-date") ?></th>
		<th><?php echo R::lang("actions") ?></th>
	</tr>

	<?php
		foreach ($adminBlogEntries as $entry => $adminBlogEntryObject) {
	?>
	<tr>
		<td><?php echo $adminBlogEntryObject->getEntryId() ?></td>
		<td><?php echo $adminBlogEntryObject->getTitle() ?></td>
		<td><?php echo $adminBlogEntryObject->getAuthor() ?></td>
		<td><?php echo $adminBlogEntryObject->getCreateDate() ?></td>
		<td><?php echo $adminBlogEntryObject->getDisplayDate() ?></td>
		<td>
			<form class="form-inline" action="<?php echo Config::getURL("/ow/blog")?>" method="POST">
				<input type="hidden" name="action" value="doDeleteBlogEntry">
				<input type="hidden" name="entryId" value="<?php echo $adminBlogEntryObject->getEntryId()?>">
				<a class="btn btn-default" href="<?php echo $adminBlogEntryObject->getEditURL()?>"><?php echo R::lang("edit") ?></a>

				<button type="submit" class="btn btn-danger" onclick="return confirm('<?php echo R::lang("are-you-sure-confirm") ?>')"><?php echo R::lang("delete") ?></button>

			</form>
		</td>
	</tr>
	<?php
		}
	?>
</table>

<?php } else { ?>
<div class="alert alert-warning">
	<?php echo R::lang("no-blog-entries-yet"); ?>
</div>
<?php
}
?>
</div>