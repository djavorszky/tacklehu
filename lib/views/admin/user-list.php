<div class="row">
<?php

	$userEntries = UserEntry::getEntries();
?>

	<a class="btn btn-primary" href="<?php echo Config::getURL("/usersadmin/edit")?>"><?php echo R::lang("add-user") ?></a>
	<br><br>
<table class="table table-striped table-hover table-responsive">
	<tr>
		<th><?php echo R::lang("user-id") ?></th>
		<th><?php echo R::lang("username") ?></th>
		<th><?php echo R::lang("email-address") ?></th>
		<th><?php echo R::lang("last-login") ?></th>
		<th><?php echo R::lang("actions") ?></th>
	</tr>

	<?php
		foreach ($userEntries as $entry => $userListEntryObject) {
	?>
	<tr>
		<td><?php echo $userListEntryObject->getUserId() ?></td>
		<td><?php echo $userListEntryObject->getUserName() ?></td>
		<td><?php echo $userListEntryObject->getEmailAddress() ?></td>
		<td><?php echo $userListEntryObject->getLastLogin() ?></td>
		<td>
			<form class="form-inline" action="<?php echo Config::getURL("/usersadmin")?>" method="POST">
				<input type="hidden" name="action" value="doDeleteUser">
				<input type="hidden" name="userId" value="<?php echo $userListEntryObject->getUserId()?>">
				<a class="btn btn-default" href="<?php echo $userListEntryObject->getEditURL()?>"><?php echo R::lang("edit") ?></a>

				<button type="submit" class="btn btn-danger" onclick="return confirm('<?php echo R::lang("are-you-sure-confirm") ?>')"><?php echo R::lang("delete") ?></button>

			</form>
		</td>
	</tr>
	<?php
		}
	?>
</table>
</div>