
<div class="row">
	<a class="btn btn-primary" href="<?php echo Config::getURL()?>/ow/blog/edit">Add an entry</a>
</div>
<div class="row">
<?php
$count = DB::mqval("SELECT count(*) FROM BlogEntry");

if ($count > 0) {
?>
<table class="table table-condensed table-striped table-hover table-responsive">
	<tr>
		<th>entryId</th>
		<th>title</th>
		<th>author</th>
		<th>createDate</th>
		<th>displayDate</th>
	</tr>
</table>

<?php } else { ?>
<div class="alert alert-warning">
	There aren't any blog entries yet.
</div>
<?php
}
?>
</div>