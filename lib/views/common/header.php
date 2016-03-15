<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsible-navigation" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo Config::getURL()?>"><?php echo R::lang("site-title-key") ?></a>
    </div>
    <div class="collapse navbar-collapse" id="collapsible-navigation">
      <ul class="nav navbar-nav">
        <?php 
          foreach (Config::getPages() as $name => $href) {
        ?>
            <li<?php echo Url::isCurrentPage($href) ? ' class="active"' : "" ?>><a href="<?php echo Config::getURL()?>/<?php echo $href ?>"><?php echo R::lang($name) ?></a></li>
        <?php 
        } 

        if ($_signedInUser && Role::hasRole(Role::$role_admin, $_signedInUser->userId)) {
          foreach (Config::getAdminPages() as $name => $href) {
        ?>
          <li<?php echo Url::isCurrentPage($href) ? ' class="active"' : "" ?>><a href="<?php echo Config::getURL()?>/<?php echo $href ?>"><?php echo R::lang($name) ?></a></li>   
        <?php 
          }
        }
        ?>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo R::lang("language")?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php 
            foreach (Config::getLanguages() as $longKey => $shortKey) {
              echo "<li><a href=\"" . Config::getURL() . "/language/$longKey\">" . R::lang($longKey) . "</a></li>";
            }
            ?>
          </ul>
        <?php if ($_signedInUser) { ?>
        <li><a href="<?php echo Config::getURL()?>/logout"><?php echo Security::escapeHTML($_signedInUser->userName) ?> (<?php echo R::lang("nav-link-logout") ?>)</a></li>
        <?php } else { ?>
        <li><a href="<?php echo Config::getURL()?>/login"><?php echo R::lang("nav-link-login") ?></a></li>
        <?php } ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
