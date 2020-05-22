<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
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
    <!-- Dashboard Core -->
    <link href="<?php echo BASE; ?>assets/css/core.css" rel="stylesheet" />
    <!-- toast -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>assets/plugins/jquery-toast/css/jquery.toast.css">
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/plugins/boostrap/colors.css" id="theme-stylesheet">
    <link href="<?php echo BASE; ?>assets/css/util.css" rel="stylesheet">
    <link href="<?php echo BASE; ?>assets/css/layout.css" rel="stylesheet">
    <script type="text/javascript">
      var token = '<?php echo strip_tags($this->security->get_csrf_hash()); ?>',
          PATH  = '<?php echo PATH; ?>',
          BASE  = '<?php echo BASE; ?>';
      var    deleteItem = '<?php echo lang("Are_you_sure_you_want_to_delete_this_item"); ?>';
      var    deleteItems = '<?php echo lang("Are_you_sure_you_want_to_delete_all_items"); ?>';
    </script>
    <?=htmlspecialchars_decode(get_option('embed_head_javascript', ''), ENT_QUOTES)?>
  </head>
  <body>

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
    <div class="login-bg-image"></div>
    <div class="page auth-login-form">
      <div class="container h-100">
          <?php echo $template['body']; ?>
      </div>
    </div>

    <script src="<?php echo BASE; ?>assets/plugins/vendors/jquery-3.2.1.min.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/vendors/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/vendors/jquery.sparkline.min.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/vendors/selectize.min.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/vendors/jquery.tablesorter.min.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/vendors/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/vendors/jquery-jvectormap-de-merc.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/vendors/jquery-jvectormap-world-mill.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/vendors/circle-progress.min.js"></script>
    <!-- toast -->
    <script type="text/javascript" src="<?php echo BASE; ?>assets/plugins/jquery-toast/js/jquery.toast.js"></script>
    <!-- general JS -->
    <script src="<?php echo BASE; ?>assets/js/process.js"></script>
    <script src="<?php echo BASE; ?>assets/js/general.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </body>
</html>

