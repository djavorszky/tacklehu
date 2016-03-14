<!-- TODO: languaige properties -->

<div class="mdl-cell--6-col-desktop mdl-cell--3-offset-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone">
	<form action="<?php echo Config::getURL()?>/register" method="POST">
		<input type="hidden" name="action" value="doRegister">
		<div>
			<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet mdl-cell--4-col-phone">
				<div class="mdl-typography mdl-typography--headline">Register</div>
			</div>
		</div>
		<div>
			<div class="mdl-cell mdl-cell--10-col mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="email" name="email" id="email">
				<label class="mdl-textfield__label" for="username">Email address</label>
				<span class="mdl-textfield__error">Please provide a valid email address.</span>
			</div>
		</div>
		<div>
			<div class="mdl-cell mdl-cell--10-col mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="text" name="user" id="user" pattern="^[a-zA-Z]{1}[a-zA-Z0-9_.-]*$" title="Only letters, numbers, underscore, hyphen and period are allowed and must start with a letter.">
				<label class="mdl-textfield__label" for="user">Username</label>
				<span class="mdl-textfield__error">Must start with a letter. Can contain letters, numbers, period, hyphen and underscore.</span>
			</div>
		</div>
		<div>
			<div class="mdl-cell mdl-cell--5-col mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="password" name="password" id="password">
				<label class="mdl-textfield__label" for="password">Password</label>
				<span class="mdl-textfield__error">Password is required.</span>
			</div>
			<div class="mdl-cell mdl-cell--5-col mdl-cell--8-col-tablet mdl-cell--4-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="password" name="password2" id="password2">
				<label class="mdl-textfield__label" for="password">Password again</label>
				<span class="mdl-textfield__error">Please confirm your password.</span>
			</div>
		</div>
		<div class="mdl-cell mdl-cell--8-col mdl-cell--8-col-tablet mdl-cell--4-col-phone">
			<button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored">
			  Register
			</button>
		</div>
	</form>
</div>