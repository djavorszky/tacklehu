<?php 
global $_signedInUser;

if (! $_signedInUser) { 

?>
<div class="row">
	<div class="col-sm-5 col-sm-offset-3">
		<h1><?php echo R::lang("register-page-header")?></h1>
		<hr>
	</div>
</div>
<form class="form-horizontal" action="<?php echo Config::getURL("/register")?>" method="POST">
	<input type="hidden" name="action" value="doRegister">
	<div class="form-group">
		<label for="email" class="col-sm-2 col-sm-offset-2 control-label"><?php echo R::lang("email-text")?></label>
		<div class="col-sm-4">
			<input type="email" class="form-control" id="email" name="email" placeholder="<?php echo R::lang("email-text")?>">
		</div>
	</div>
	<div class="form-group">
		<label for="username" class="col-sm-2 col-sm-offset-2 control-label"><?php echo R::lang("username-text")?></label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="username" name="username" placeholder="<?php echo R::lang("username-text")?>">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 col-sm-offset-2 control-label"><?php echo R::lang("password-text")?></label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="password" name="password" placeholder="<?php echo R::lang("password-text")?>">
		</div>
	</div>
	<div class="form-group">
		<label for="password2" class="col-sm-2 col-sm-offset-2 control-label"><?php echo R::lang("password-again-text")?></label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="password2" name="password2" placeholder="<?php echo R::lang("password-again-text")?>">
		</div>
	</div>
	<?php if (Config::isCaptchaConfigured()) { ?>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-10">
			<div class="g-recaptcha" data-sitekey="<?php echo Config::getCaptchaSiteKey() ?>"></div>
		</div>
	</div>
	<?php } ?>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-10">
			<button type="submit" class="btn btn-primary"><?php echo R::lang("register-button")?></button>
		</div>
	</div>
</form>
<?php } else { ?>
<div class="row">
	<div class="page-header col-sm-12">
		<h1><?php echo R::lang("logged-in-as-user", array($_signedInUser->userName))?></h1>
	</div>
</div>
<?php } ?>