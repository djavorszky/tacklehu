<header class="mdl-layout__header">
	<div class="mdl-layout-icon"></div>
	<div class="mdl-layout__header-row">
		<span class="mdl-layout__title"><?php echo R::lang("header-title-key") ?></span>
		<div class="mdl-layout-spacer"></div>
		<nav class="mdl-navigation mdl-layout--large-screen-only">
			<a class="mdl-navigation__link" href="#"><?php echo R::lang("nav-link-1-key") ?></a>
			<a class="mdl-navigation__link" href="#"><?php echo R::lang("nav-link-2-key") ?></a>
			<p class="mdl-navigation__link"><?php echo R::lang("welcome-with-placeholder", array($user)) ?></p>
		</nav>
	</div>
</header>
<div class="mdl-layout__drawer mdl-layout-no-desktop-drawer-button">
	<span class="mdl-layout__title"><?php echo R::lang("header-title-key") ?></span>
    <nav class="mdl-navigation">
        <a class="mdl-navigation__link" href="#"><?php echo R::lang("nav-link-1-key") ?></a>
        <a class="mdl-navigation__link" href="#"><?php echo R::lang("nav-link-2-key") ?></a>
        <a class="mdl-navigation__link" href="#"><?php echo R::lang("nav-link-3-key") ?></a>
    </nav>
</div>