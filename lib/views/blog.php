<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet mdl-cell--2-col-phone">It's alive :-)</div>
<div class="mdl-cell mdl-cell--4-col">Content</div>
<div class="mdl-cell mdl-cell--4-col">goes</div>
<div class="mdl-cell mdl-cell--4-col">
	<?php
		if (sizeof($_GET) != 0) {
			print_array($_GET);
		}
		else {
			echo '$_GET is empty<br>';
		}
	?>
</div>