<header class="navbar navbar-expand-lg js-header">
  <div class="header-wrap">

    <a class="navbar-toggler mobile-menu">
      <span class="navbar-toggler-icon"><i class="icon fe fe-menu"></i></span>
    </a>

    <a href="<?php echo cn(); ?>" class="navbar-brand text-inherit mr-md-3">
      <img src="<?php echo BASE; ?>assets/images/logo.png" alt="Website Logo" class="d-md-none navbar-brand-logo">
    </a>
    
    <?php
      if(topbar_tilte_by_module(segment(1))){
    ?>
    <h2 class="topbar module-name d-none d-lg-block">
      <?php echo topbar_tilte_by_module(segment(1)); ?>
    </h2>
    <?php }?>
    
    <div class="topbar-search w-auto flex-fill max-w-md ml-0 ml-md-6 mr-auto d-none d-lg-block">
    <?php
      $array_allow = array('user_block_ip', 'user_logs', 'user_mail_logs', 'services', 'category', 'users', 'faqs', 'order', 'transactions');
      if (in_array(segment(1), $array_allow) || in_array(segment(2), $array_allow)) {
    ?>
      <form class="ajaxSearchItem input-icon my-3 my-lg-0" method="POST" action="<?php echo cn(segment(1)."/ajax_search/keyword"); ?>">
        <div class="input-icon">
          <span class="input-icon-addon"><i class="icon fe fe-search"></i>
          </span>
          <input type="text" name="k" class="form-control form-control-light" placeholder="<?php echo lang("Search_for_"); ?>" tabindex="-1">
          <input type="submit" class=" d-none">
        </div>
      </form>
    <?php }?>
    </div>
    <ul class="nav navbar-menu align-items-center order-1 order-lg-2">
      <?php
        $redirect = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
      ?>

      <li class="nav-item d-none d-lg-block">
        <a class="nav-link" href="#customize" data-toggle="modal" >
          <span class="nav-icon">
            <i class="icon fe fe-sliders" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang('Theme_Customizer'); ?>"></i>
          </span>
        </a>
      </li>

      <li class="nav-item dropdown-lang dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          <span class="flag-icon flag-icon-<?php echo strtolower($lang_current->country_code); ?>"></span> 
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
          <?php 
            foreach ($languages as $key => $row) {
          ?>
          <a class="dropdown-item ajaxChangeLanguageSecond" href="javascript:void(0)" data-url="<?php echo cn('language/set_language/'); ?>" data-redirect="<?php echo strip_tags($redirect); ?>" data-ids="<?php echo strip_tags($row->ids); ?>"><i class="flag-icon flag-icon-<?php echo strtolower($row->country_code); ?>"></i> <?php echo language_codes($row->code); ?>
          </a>
          <?php }?>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link d-flex align-items-center py-0 px-lg-0 px-2 text-color ml-2">
          <span class="ml-2 d-none d-lg-block leading-none">
            <span><?php echo lang('Hi'); ?> <?php echo get_field(USERS, ["id" => session('uid')], 'first_name'); ?>! </span>
            <span class="text-muted d-block mt-1 text-h6"><?php echo lang('Administrator'); ?></span>
          </span>
          <span class="avatar admin-profile"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
          <a class="dropdown-item" href="<?php echo cn('profile'); ?>">
            <i class="icon fe fe-user dropdown-icon"></i>
            <?php echo lang('Profile'); ?>
          </a>
          <a class="dropdown-item" href="<?php echo cn('setting'); ?>">
            <i class="icon fe fe-settings dropdown-icon"></i>
            <?php echo lang('Settings'); ?>
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo cn('auth/logout'); ?>">
            <i class="icon fe fe-log-out dropdown-icon"></i>
            <?php echo lang('Logout'); ?>
          </a>
        </div>
      </li>
    </ul>
  </div>
</header>