<?php
	$user = $this->getExtraData();

?>

<h1><?php echo R::lang("edit-user") ?></h1>
<form class="form-horizontal" action="<?php echo Config::getURL("/usersadmin")?>" method="POST">
	
	<?php if ($user) { ?> 
		<input type="hidden" name="action" value="doUpdateUser">
		<input type="hidden" name="userId" value="<?php echo $user->userId?>">
	<?php } else { ?>
		<input type="hidden" name="action" value="doCreateUser">
	<?php } ?>
	<div class="form-group">
		<label for="username" class="col-sm-2 control-label"><?php echo R::lang("username") ?></label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="username" name="username" placeholder="<?php echo R::lang("username") ?>" <?php if ($user) { echo "value=\"$user->userName\""; } ?> required>
		</div>
	</div>
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label"><?php echo R::lang("email-address") ?></label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="email" name="email" placeholder="<?php echo R::lang("email-address") ?>" <?php if ($user) { echo "value=\"$user->emailAddress\""; } ?> required>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label"><?php echo R::lang("password-text") ?></label>
		<div class="col-sm-10">
			<input type="password" class="form-control" id="password" name="password" placeholder="<?php echo R::lang("password-text") ?>" <?php if (!$user) echo "required" ?>>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-primary"><?php if ($user) { echo R::lang("update-entry"); } else { echo R::lang("add-entry"); } ?></button>
			<a class="btn btn-default" href="<?php echo Config::getURL("/usersadmin")?>"><?php echo R::lang("cancel") ?></a>
		</div>
	</div>
</form>

