<div class="mdl-grid">
	<div class="mdl-cell mdl-cell--6-col mdl-cell--3-offset-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone">
		<div class="mdl-cell mdl-cell--12-col">
			<div class="mdl-typography mdl-typography--headline">Sign in</div>
		</div>
		<form action="<?php echo Config::getURL()?>/login" method="POST">
			<input type="hidden" name="action" value="doLogin">
			<div class="mdl-cell mdl-cell--5-col mdl-cell--10-col-tablet mdl-cell--4-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="email" name="email" id="email">
				<label class="mdl-textfield__label" for="email">Email</label>
				<span class="mdl-textfield__error">Something's wrong</span>
			</div>
			<div class="mdl-cell mdl-cell--5-col mdl-cell--10-col-tablet mdl-cell--4-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				<input class="mdl-textfield__input" type="password" name="password" id="password">
				<label class="mdl-textfield__label" for="password">Password</label>
				<span class="mdl-textfield__error">Field is required.</span>
			</div>
			<div class="mdl-cell mdl-cell-12-col">
				<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
				  Sign in
				</button>
			</div>
			<div class="mdl-cell mdl-cell--10-col">
				<a href="<?php echo Config::getURL()?>/register">Don't have an account yet? Click here to register.</a>
			</div>
		</form>
	</div>
</div>
