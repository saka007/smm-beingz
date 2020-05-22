<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" >
    <meta name="description" content="<?php echo strip_tags(get_option('website_desc', "SmartStore is the best option to get all social media services in website. Easy build Social Media Marketing Store with a unique design and business process automation")); ?>">
    <meta name="keywords" content="<?php echo strip_tags(get_option('website_keywords', "SmartStore, smm reseller panel, smmpanel, panelsmm, create smm store, business smm, socialmedia, instagram reseller panel, create smm store, resell smm services, smm store, start smm business, cheap smm business, buy instagram followers, instagram likes, facebook followers, facebook likes, twitter likes, youtube views, soundclound")); ?>">
    <title><?php echo strip_tags(get_option('website_title', "SmartStore - Social Media Marketing Store Script")); ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_option('website_favicon', BASE."assets/images/favicon.png"); ?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">

    
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?php echo BASE; ?>assets/plugins/vendors/jquery-3.2.1.min.js"></script>

    <!-- Core -->
    <link href="<?php echo BASE; ?>assets/css/core.css" rel="stylesheet">
      
    <!-- toast -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>assets/plugins/jquery-toast/css/jquery.toast.css">
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/plugins/boostrap/colors.css" id="theme-stylesheet">
    <link href="<?php echo BASE; ?>assets/css/util.css" rel="stylesheet">
    <link href="<?php echo BASE; ?>themes/regular/assets/css/theme_style.css" rel="stylesheet">
    <link href="<?php echo BASE; ?>assets/css/footer.css" rel="stylesheet">

    <script type="text/javascript">
      var token = '<?php echo strip_tags($this->security->get_csrf_hash()); ?>',
          PATH  = '<?php echo PATH; ?>',
          BASE  = '<?php echo BASE; ?>';
      var    deleteItem = '<?php echo lang("Are_you_sure_you_want_to_delete_this_item"); ?>';
      var    deleteItems = '<?php echo lang("Are_you_sure_you_want_to_delete_all_items"); ?>';
    </script>
    <?=htmlspecialchars_decode(get_option('embed_head_javascript', ''), ENT_QUOTES)?>
  </head>
  <body class="">

    <div id="page-overlay" class="visible incoming">
      <div class="loader-wrapper-outer">
        <div class="loader-wrapper-inner">
          <div class="lds-double-ring">
            <div></div>
            <div></div>
            <div>
              <div></div>
            </div>
            <div>
              <div></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if($display_html){?>
    <div id="particles-js"></div>
    <header class="header fixed-top" id="headerNav">
      <div class="container">
        <nav class="navbar navbar-expand-lg ">
          <a class="navbar-brand" href="<?php echo cn(); ?>">
            <img class="site-logo d-none" src="<?php echo get_option('website_logo', BASE."assets/images/logo.png"); ?>" alt="Webstie logo">
            <img class="site-logo-white" src="<?php echo get_option('website_logo_white', BASE."assets/images/logo-white.png"); ?>" alt="Webstie logo">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fe fe-menu"></i></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item active">
                <a class="nav-link js-scroll-trigger" href="<?php echo cn(); ?>"><?php echo lang("Home"); ?></a>
              </li>

              <li class="nav-item dropdown <?php echo (strpos(segment(1), 'buy') !== false ) ? "active" : ""?>">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo lang('Services'); ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php 
                    if (!empty($all_items)) {
                      foreach ($all_items as $key => $social_network) {
                  ?>
                  <li class="dropdown-submenu"><a class="dropdown-item dropdown-toggle" href="#"><?php echo strip_tags($social_network->name)?></a>
                    <ul class="dropdown-menu">
                      <?php 
                        $categories = $social_network->categories;
                        foreach ($categories as $key => $category) {
                      ?>
                      <li class="dropdown-submenu"><a class="dropdown-item" href="<?php echo cn($category->url_slug); ?>"><?php echo lang('Buy'); ?> <?php echo strip_tags($category->name)?></a>
                      <?php } ?>
                    </ul>
                  </li>
                  <?php }}?>
                </ul>
              </li>
              
              <li class="nav-item <?php echo (segment(1) == 'blog') ? "active" : ""?>">
                <a class="nav-link js-scroll-trigger" href="<?php echo cn('blog'); ?>"><?php echo lang('Blog'); ?></a>
              </li>              

              <li class="nav-item <?php echo (segment(1) == 'faq') ? "active": ""?>">
                <a class="nav-link js-scroll-trigger" href="<?php echo cn('faq'); ?>"><?php echo lang('FAQ'); ?></a>
              </li>

              <li class="nav-item <?php echo (segment(1) == 'contact') ? "active" : ""?>">
                <a class="nav-link js-scroll-trigger" href="<?php echo cn('contact'); ?>"><?php echo lang('Contact'); ?></a>
              </li>

            </ul> 

          </div>
        </nav>
      </div>
    </header>
    <?php }?>
