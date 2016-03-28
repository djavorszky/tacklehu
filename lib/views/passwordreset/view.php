<h2><?php echo R::lang("reset-password") ?></h2>
<p><?php echo R::lang("reset-password-explanation") ?></p>
<form class="form form-horizontal" action="<?php echo Config::getURL("/passwordreset")?>" method="POST">
	<input type="hidden" name="action" value="doSendPasswordResetEmail">
	<div class="form-group">
		<label for="email" class="col-sm-2 control-label"><?php echo R::lang("email-text")?></label>
		<div class="col-sm-4">
			<input type="email" class="form-control" id="email" name="email" placeholder="<?php echo R::lang("email-text")?>">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<button type="submit" class="btn btn-primary"><?php echo Icons::getIcon("reset-pw") ?> <?php echo R::lang("reset-pw-email")?></button>
		</div>
	</div>
</form>
