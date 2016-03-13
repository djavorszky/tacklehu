<!-- TODO: languaige properties -->

<div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--3-offset-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone">
	<form action="<?php echo Config::getURL()?>/login" method="POST">
		<input type="hidden" name="action" value="doLogin">
		<div>
			<div class="mdl-cell mdl-cell--8-col mdl-cell--10-col-tablet mdl-cell--12-col-phone">
				<div class="mdl-typography mdl-typography--headline">Sign in</div>
			</div>
		</div>
		<div>
			<div class="mdl-cell mdl-cell--5-col mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" name="user" id="username">
				<label class="mdl-textfield__label" for="username">Username</label>
				<span class="mdl-textfield__error">Field is required.</span>
			</div>
			<div class="mdl-cell mdl-cell--5-col mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="password" name="password" id="password">
				<label class="mdl-textfield__label" for="password">Password</label>
				<span class="mdl-textfield__error">Field is required.</span>
			</div>
		</div>
		<div class="mdl-cell mdl-cell-4-col mdl-cell--2-col-tablet mdl-cell--1-col-phone">
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
			  Sign in
			</button>
		</div>
		<div class="mdl-cell mdl-cell mdl-cell--10-col mdl-cell--12-col-phone">
			<a href="<?php echo Config::getURL()?>/register">Don't have an account yet? Click here to register.</a>
		</div>
	</form>
</div>
