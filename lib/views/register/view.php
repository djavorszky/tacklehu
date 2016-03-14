<div class="row">
	<div class="page-header col-sm-5 col-sm-offset-3">
		<h1><?php R::lang("register-page-header")?></h1>
	</div>
</div>
<form class="form-horizontal" action="<?php echo Config::getURL()?>/register" method="POST">
	<input type="hidden" name="action" value="doRegister">
	<div class="form-group">
		<label for="email" class="col-sm-2 col-sm-offset-2 control-label"><?php R::lang("email-text")?></label>
		<div class="col-sm-4">
			<input type="email" class="form-control" id="email" name="email" placeholder="<?php R::lang("email-text")?>">
		</div>
	</div>
	<div class="form-group">
		<label for="username" class="col-sm-2 col-sm-offset-2 control-label"><?php R::lang("username-text")?></label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="username" name="username" placeholder="<?php R::lang("username-text")?>">
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 col-sm-offset-2 control-label"><?php R::lang("password-text")?></label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="password" name="password" placeholder="<?php R::lang("password-text")?>">
		</div>
	</div>
	<div class="form-group">
		<label for="password2" class="col-sm-2 col-sm-offset-2 control-label"><?php R::lang("password-again-text")?></label>
		<div class="col-sm-4">
			<input type="password" class="form-control" id="password2" name="password2" placeholder="<?php R::lang("password-again-text")?>">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-10">
			<button type="submit" class="btn btn-primary"><?php R::lang("register-button")?></button>
		</div>
	</div>
</form>
