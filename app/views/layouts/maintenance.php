<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8"/>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?php echo BASE; ?>assets/js/vendors/jquery-3.2.1.min.js"></script>
    <!-- Core -->
    <link href="<?php echo BASE; ?>assets/css/core.css" rel="stylesheet">
    <!-- toast -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>assets/plugins/jquery-toast/css/jquery.toast.css">
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/plugins/boostrap/colors.css" id="theme-stylesheet">
    <link href="<?php echo BASE; ?>assets/css/util.css" rel="stylesheet">
    <link href="<?php echo BASE; ?>assets/css/maintenace.css" rel="stylesheet">
    <script type="text/javascript">
      var token = '<?php echo strip_tags($this->security->get_csrf_hash()); ?>',
          PATH  = '<?php echo PATH; ?>',
          BASE  = '<?php echo BASE; ?>';
    </script>
    <?=htmlspecialchars_decode(get_option('embed_head_javascript', ''), ENT_QUOTES)?>
  </head>
  <body class="">
    
    <div id="particles-js"></div>
    <section class="banner"  id="home">
      <div class="container">
        <div class="row">
          <div class="col-md-6 mx-auto">
            <div class="content">
              <div class="logo">
                <img src="<?php echo get_option('website_logo_white', BASE."assets/images/logo-white.png"); ?>" alt="website-logo">
              </div>
              <h1 class="m-b-50 m-t-50">
                <?php echo lang("the_website_is_in_maintenance_mode"); ?>
              </h1>
              <div class="desc">
                <?php echo lang("were_undergoing_a_bit_of_scheduled_maintenance_sorry_for_the_inconvenience_well_be_backup_and_running_as_fast_as_possible"); ?>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>
    <script src="<?php echo BASE; ?>assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE; ?>assets/js/vendors/jquery.sparkline.min.js"></script>
    <script src="<?php echo BASE; ?>assets/js/core.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/particles-js/particles.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/particles-js/app.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/particles-js/stats.js"></script>
    <?php echo htmlspecialchars_decode(get_option('embed_javascript', ''), ENT_QUOTES); ?>
  </body>
</html>

