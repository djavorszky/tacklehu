<div class="row">
	<div class="page-header col-sm-5 col-sm-offset-3">
		<h1><?php R::lang("login-page-header")?></h1>
	</div>
</div>
<form class="form-horizontal" action="<?php echo Config::getURL()?>/login" method="POST">
	<input type="hidden" name="action" value="doLogin">
	<div class="form-group">
		<label for="email" class="col-sm-2 col-sm-offset-2 control-label"><?php R::lang("email-text")?></label>
		<div class="col-sm-4">
			<input type="email" class="form-control" id="email" name="email" placeholder="<?php R::lang("email-text")?>">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 col-sm-offset-2 control-label"><?php R::lang("password-text")?></label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="password" name="password" placeholder="<?php R::lang("password-text")?>">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-10">
			<button type="submit" class="btn btn-default"><?php R::lang("sign-in-button")?></button>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-4 col-sm-offset-4">
			<a href="<?php echo Config::getURL()?>/register"><?php R::lang("prompt-for-register")?></a>
		</div>
	</div>
</form>
