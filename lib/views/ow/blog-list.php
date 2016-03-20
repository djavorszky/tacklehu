
<div class="row">
	<a class="btn btn-primary" href="<?php echo Config::getURL()?>/ow/blog/edit">Add an entry</a>
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
		<th>entryId</th>
		<th>title</th>
		<th>author</th>
		<th>createDate</th>
		<th>displayDate</th>
		<th>actions</th>
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
			<form class="form-inline" action="<?php echo Config::getURL()?>/ow/blog" method="POST">
				<input type="hidden" name="action" value="doDeleteBlogEntry">
				<input type="hidden" name="entryId" value="<?php echo $adminBlogEntryObject->getEntryId()?>">
				<a class="btn btn-default" href="<?php echo $adminBlogEntryObject->getEditURL()?>">Edit</a>

				<button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
			</form>
		</td>
	</tr>
	<?php
		}
	?>
</table>

<?php } else { ?>
<div class="alert alert-warning">
	There aren't any blog entries yet.
</div>
<?php
}
?>
</div>