    <!-- Logo and Primary Navigation -->
    <div class="navbar-inner navbar-inner-primary">
      <div class="container">
        <h1 class="logo"><a href="/">TroveBox</a></h1>
        <div class="nav-collapse collapse">
          <ul class="nav separator-left">
            <li class="<?php if($this->utility->isActiveTab('photos')) { ?> active active-page-item<?php } ?>"><a href="<?php $this->url->photosView(); ?>"><i class="tb-icon-gallery <?php if($this->utility->isActiveTab('photos')) { ?> tb-icon-highlight<?php } else { ?>tb-icon-dark<?php } ?>"></i> Gallery</a></li>
            <li class="<?php if($this->utility->isActiveTab('albums')) { ?> active active-page-item<?php } ?>"><a href="<?php $this->url->albumsView(); ?>"><i class="tb-icon-albums <?php if($this->utility->isActiveTab('albums')) { ?> tb-icon-highlight<?php } else { ?>tb-icon-dark<?php } ?>"></i> Albums</a></li>
            <?php if($this->user->isAdmin()) { ?>
              <li class="<?php if($this->utility->isActiveTab('upload')) { ?> active active-page-item<?php } ?>"><a href="<?php $this->url->photosUpload(); ?>"><i class="tb-icon-upload <?php if($this->utility->isActiveTab('upload')) { ?> tb-icon-highlight<?php } else { ?>tb-icon-dark<?php } ?>"></i> Upload</a></li>
            <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
        <div class="search-wrap separator-left">
          <input type="search" name="search" placeholder="Search Tags..."/>
        </div>
        <?php if($this->user->isLoggedIn()) { ?>
          <div class="user">
            <a href="#" class="profile-link profile-photo-header-meta" data-toggle="dropdown"></a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="/user/logout">Logout</a></li>
            </ul>
          </div>
        <?php } else { ?>
          <div class="user">
            <?php if($this->config->site->displaySignupLink == 1) { ?>
            <a href="<?php $this->utility->safe($this->config->site->displaySignupUrl); ?>" class="btn btn-brand btn-arrow">Sign Up</a>
            <?php } ?>
            <a href="/user/login?r=<?php $this->utility->safe($_SERVER['REQUEST_URI']); ?>" class="btn btn-theme-secondary">Sign In</a>
          </div>
        <?php } ?>
      </div>
    </div>
    <?php if(!$this->utility->isActiveTab('home')) { ?>
      <div class="navbar-inner navbar-inner-secondary">
        <div class="container">
          <ul class="nav">
            <li><a href="#"><i class="tb-icon-light tb-icon-home"></i></a></li>
            <li class="separator-left"><span class="profile-name-meta owner"></span></li>
            <?php $this->theme->display('partials/header-secondary.php', array()); ?>
          </ul>
          <div class="help-container">
            <a href="#"><i class="tb-icon-help"></i></a>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if($msg = $this->notification->get()) { ?>
      <div class="alert trovebox-message">
        <div class="container">
          <?php if($msg['type'] !== Notification::typeFlash) { ?>
            <button type="button" class="close <?php if($msg['type'] === Notification::typeStatic) { ?> notificationDelete<?php } ?>" data-dismiss="alert" data-target=".trovebox-message">×</button>
          <?php } ?>
          <?php $this->utility->safe($msg['msg'], '<a>'); ?>
        </div>
      </div>
    <?php } ?>
