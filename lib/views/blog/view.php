<div class="col-sm-4">It's alive :-)</div>
<div class="col-sm-4">Content</div>
<div class="col-sm-4">goes</div>
<div class="col-sm-4">
	<?php
		if (sizeof($_GET) != 0) {
			print_array($_GET);
		}
		else {
			echo '$_GET is empty<br>';
		}
	?>
</div>