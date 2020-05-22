<aside class="navbar navbar-side navbar-fixed js-sidebar" id="aside">
  <div class="mobile-logo">
    <a href="<?php echo cn('statistics'); ?>" class="navbar-brand text-inherit">
      <img src="<?php echo BASE; ?>assets/images/logo.png" alt="Website Logo" class="hide-navbar-folded navbar-brand-logo">
      <img src="<?php echo BASE; ?>assets/images/favicon.png" alt="Website Logo" class="hide-navbar-expanded navbar-brand-logo">
    </a>
  </div>
  <div class="flex-fill scroll-bar">
    <ul class="navbar-nav mb-md-4" id="menu">
      <h6 class="navbar-heading first">
        <span class="text"><?php echo lang('General'); ?></span>
      </h6>
      <li class="nav-item">
        <a class="nav-link <?php if(segment(1) == 'statistics') echo "active"; else echo ""; ?>" href="<?php echo cn('statistics'); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo lang('Statistics'); ?>">
          <span class="nav-icon">
            <i class="icon-fa fa fa-bar-chart"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('Statistics'); ?>
          </span>
        </a>
      </li>
      <h6 class="navbar-heading">
        <span class="text"><?php echo lang('Service_Area'); ?></span>
      </h6>
      <li class="nav-item">
        <a class="nav-link <?php if(segment(1) == 'order') echo "active"; else echo ""; ?>" href="<?php echo cn('order'); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo lang('order_logs'); ?>">
          <span class="nav-icon">
            <i class="icon fe fe-shopping-cart"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('order_logs'); ?>
          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if(segment(1) == 'transactions') echo "active"; else echo ""; ?>" href="<?php echo cn('transactions'); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo lang('Transaction_logs'); ?>">
          <span class="nav-icon">
            <i class="icon-fa fa fa-credit-card"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('Transaction_logs'); ?>
          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if(segment(1) == 'social_network') echo "active"; else echo ""; ?>" href="<?php echo cn('social_network'); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo lang('social_network'); ?>">
          <span class="nav-icon">
            <i class="icon-fa fa fa-th-large"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('social_network'); ?>
          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if(segment(1) == 'category') echo "active"; else echo ""; ?>" href="<?php echo cn('category'); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo lang('Category'); ?>">
          <span class="nav-icon">
            <i class="icon-fa fa fa-table"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('Category'); ?>
          </span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link <?php if(segment(1) == 'services') echo "active"; else echo "";?>" href="<?php echo cn('services'); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo lang('Services'); ?>">
          <span class="nav-icon">
            <i class="icon-fa fa fa-list-ul"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('Services'); ?>
          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if(segment(1) == 'users') echo "active"; else echo ""; ?>" href="<?php echo cn('users'); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo lang('Customers'); ?>">
          <span class="nav-icon">
            <i class="icon fe fe-users"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('Customers'); ?>
          </span>
        </a>
      </li>

      <h6 class="navbar-heading">
        <span class="text"><?php echo lang('Apps_Setting'); ?></span>
      </h6>

      <li class="nav-item">
        <a class="nav-link <?php if(segment(1) == 'setting') echo "active"; else echo ""; ?>" href="<?php echo cn('setting/website_setting'); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo lang('Settings'); ?>">
          <span class="nav-icon">
            <i class="icon fe fe-settings"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('Settings'); ?>
          </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if(segment(1) == 'blogs') echo "active"; else echo ""; ?>" href="<?php echo cn('blogs'); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo lang('Blog'); ?>">
          <span class="nav-icon">
            <i class="icon fe fe-edit"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('Blog'); ?>
          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if(segment(1) == 'faqs') echo "active"; else echo ""; ?>" href="<?php echo cn('faqs'); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo lang('FAQ'); ?>">
          <span class="nav-icon">
            <i class="icon fe fe-help-circle"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('FAQ'); ?>
          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if(segment(1) == 'provider') echo "active"; else echo ""; ?>" href="<?php echo cn('provider'); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo lang('Provider'); ?>">
          <span class="nav-icon">
            <i class="icon fe fe-share-2"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('Provider'); ?>
          </span>
        </a>
      </li>

      <h6 class="navbar-heading">
        <span class="text"><?php echo lang('Other'); ?></span>
      </h6>
      <li class="nav-item">
        <a class="nav-link <?php if(segment(1) == 'language') echo "active"; else echo ""; ?>" href="<?php echo cn('language'); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo lang('Language'); ?>">
          <span class="nav-icon">
            <i class="icon-fa fa fa-language"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('Language'); ?>
          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link <?php if(segment(1) == 'module') echo "active"; else echo ""; ?>" href="<?php echo cn('module'); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo lang('Module'); ?>">
          <span class="nav-icon">
            <i class="icon fe fe-layers"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('Module'); ?>
          </span>
        </a>
      </li>

      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="<?php echo lang('Theme_Customizer'); ?>">
        <a class="nav-link" href="#customize" data-toggle="modal" >
          <span class="nav-icon">
            <i class="icon fe fe-sliders"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('Theme_Customizer'); ?>
          </span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="https://smartpanelsmm.com/docs/" data-toggle="tooltip" data-placement="right" title="<?php echo lang('Documentation'); ?>" target="_blank">
          <span class="nav-icon">
            <i class="icon fe fe-book"></i>
          </span>
          <span class="nav-text">
            <?php echo lang('Documentation'); ?>
          </span>
        </a>
      </li>

    </ul>
  </div>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a href="<?php echo cn('auth/logout'); ?>" class="nav-link" data-toggle="tooltip" data-placement="right" title="<?php echo lang('Logout'); ?>">
        <span class="nav-icon"><i class="icon fe fe-power"></i>
        </span>
        <span class="nav-text"><?php echo lang('Logout'); ?></span>
      </a>
    </li>
  </ul>
</aside>