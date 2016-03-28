<?php

$code = $this->getExtraData();

?>

<h2><?php echo R::lang("reset-password") ?></h2>
<form class="form form-horizontal" action="<?php echo Config::getURL("/passwordreset")?>" method="POST">
	<input type="hidden" name="action" value="doResetPassword">
	<input type="hidden" name="code" value="<?php echo $code ?>">
	<div class="form-group">
		<label for="password1" class="col-sm-2 control-label"><?php echo R::lang("password-text")?></label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="password1" name="password1" placeholder="<?php echo R::lang("password-text")?>">
		</div>
	</div>
	<div class="form-group">
		<label for="password2" class="col-sm-2 control-label"><?php echo R::lang("password-again-text")?></label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="password2" name="password2" placeholder="<?php echo R::lang("password-again-text")?>">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<button type="submit" class="btn btn-primary"><?php echo Icons::getIcon("reset-pw") ?> <?php echo R::lang("reset-pw-button")?></button>
		</div>
	</div>
</form>

