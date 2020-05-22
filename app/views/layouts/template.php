<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="description" content="<?php echo strip_tags(get_option('website_desc', "SmartStore is the best option to get all social media services in website. Easy build Social Media Marketing Store with a unique design and business process automation")); ?>">
    <meta name="keywords" content="<?php echo strip_tags(get_option('website_keywords', "SmartStore, smm reseller panel, smmpanel, panelsmm, create smm store, business smm, socialmedia, instagram reseller panel, create smm store, resell smm services, smm store, start smm business, cheap smm business, buy instagram followers, instagram likes, facebook followers, facebook likes, twitter likes, youtube views, soundclound")); ?>">
    <title><?php echo strip_tags(get_option('website_title', "SmartStore - Social Media Marketing Store Script")); ?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_option('website_favicon', BASE."assets/images/favicon.png"); ?>">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="<?php echo BASE; ?>assets/plugins/vendors/jquery-3.2.1.min.js"></script>
    
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/plugins/font-awesome/css/font-awesome.min.css">
    <!-- flag icon -->
    <link href="<?php echo BASE; ?>assets/plugins/flags/css/docs.css" rel="stylesheet">
    <link href="<?php echo BASE; ?>assets/plugins/flags/css/flag-icon.css" rel="stylesheet">
      
    <!-- c3.js Charts Plugin -->
    <?php if(segment('1') == 'statistics'){ ?>
    <link href="<?php echo BASE; ?>assets/plugins/charts-c3/c3.css" rel="stylesheet">
    <script src="<?php echo BASE; ?>assets/plugins/charts-c3/d3.v3.min.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/charts-c3/c3.min.js"></script>
    <?php }?>
    <!-- toast -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>assets/plugins/jquery-toast/css/jquery.toast.css">
    <!-- boostrap -->
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/plugins/boostrap/colors.css" id="theme-stylesheet">
    <!-- perfect-scrollbar -->
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/admin/vendors/perfect-scrollbar/css/perfect-scrollbar.css">
    <!-- util -->
    <link href="<?php echo BASE; ?>assets/css/util.css" rel="stylesheet">
    <link href="<?php echo BASE; ?>assets/admin/dist/css/admin-core.css" rel="stylesheet" />
    <link href="<?php echo BASE; ?>assets/css/layout.css" rel="stylesheet">
    <script type="text/javascript">
      var token = '<?php echo strip_tags($this->security->get_csrf_hash()); ?>',
          PATH  = '<?php echo PATH; ?>',
          BASE  = '<?php echo BASE; ?>';
      var    deleteItem = "<?php echo lang('Are_you_sure_you_want_to_delete_this_item'); ?>";
      var    deleteItems = "<?php echo lang('Are_you_sure_you_want_to_delete_all_items'); ?>";
    </script>
  </head>
  <body class="antialiased vertical-menu">
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
    <?php echo Modules::run("blocks/header_vertical");?>
    <div class="d-flex flex-row h-100p">
      <?php echo Modules::run("blocks/sidebar");?>
      <div class="layout-main d-flex flex-column flex-fill max-w-full">
        <main class="app-content">
          <?php
            $array_allow = array('user_block_ip', 'user_logs', 'user_mail_logs', 'services', 'category', 'users', 'faqs', 'order', 'transactions');
            if (in_array(segment(1), $array_allow) || in_array(segment(2), $array_allow)) {
          ?>
          <div class="row d-md-none">
            <div class="col-12">
              <form class="ajaxSearchItem input-icon my-3 my-lg-0" method="POST" action="<?php echo cn(segment(1)."/ajax_search/keyword"); ?>">
                <div>
                  <div class="input-group">
                    <input type="text" class="form-control" name="k" placeholder="<?php echo lang("Search_for_"); ?>">
                    <span class="input-group-append">
                      <button class="btn btn-info" type="submit"><i class="fe fe-search"></i></button>
                    </span>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <?php }?>
          <?php echo $template['body']; ?>
        </main>
      </div>
    </div>
    <!-- modal -->
    <div id="modal-ajax" class="modal fade" tabindex="-1"></div>
    <div class="modal fade" id="customize" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-right">
        <div class="modal-dialog theme-customizer" role="document">
          <div class="modal-content">
            <div class="modal-body">
              <div class="modal-header bg-pantone">
                <h4 class="modal-title"><i class="icon-fa fa fa-cogs"></i> THEME CUSTOMIZER</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
              </div>
              <form action="#" class="form js-layout-form p-l-20">

                <!--Color mode  -->
                <div class="form-group m-t-20">
                  <label class="form-label">Day/Night Mode</label>
                  <div class="custom-controls-stacked">
                    <div class="row">
                      <div class="col-6">
                        <label class="form-check-inline custom-control-inline">Day
                          <input class="selectgroup-input" type="radio" name="color-scheme" value="light">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                      <div class="col-6">
                        <label class="form-check-inline custom-control-inline">Night
                          <input class="selectgroup-input" type="radio" name="color-scheme" value="dark">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group mb-2 d-none">
                  <label class="form-label">Nav position</label>
                  <div class="selectgroup w-100p">
                    <label class="selectgroup-item">
                      <input type="radio" name="nav-position" value="top" class="selectgroup-input">
                      <span class="selectgroup-button">top</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="nav-position" value="side" class="selectgroup-input">
                      <span class="selectgroup-button">side</span>
                    </label>
                  </div>
                </div>

                <div class="form-group mb-2 d-none">
                  <label class="form-label">Header color</label>
                  <div class="selectgroup w-100p">
                    <label class="selectgroup-item">
                      <input type="radio" name="header-color" value="light" class="selectgroup-input">
                      <span class="selectgroup-button">light</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="header-color" value="dark" class="selectgroup-input">
                      <span class="selectgroup-button">dark</span>
                    </label>
                  </div>
                </div>

                <!--</div>-->
                <div class="form-group mb-2 d-none">
                  <label class="form-label">Sidebar position</label>
                  <div class="selectgroup w-100p">
                    <label class="selectgroup-item">
                      <input type="radio" name="sidebar-position" value="left" class="selectgroup-input">
                      <span class="selectgroup-button">left</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="sidebar-position" value="right" class="selectgroup-input">
                      <span class="selectgroup-button">right</span>
                    </label>
                  </div>
                </div>

                <!--Layout Option-->
                <div class="form-group m-t-20">
                  <label class="form-label"><i class="fe fe-layout"></i> Layout Option</label>
                  <div class="custom-controls-stacked">
                    <div class="row">
                      <div class="col-6">
                        <label class="form-check-inline custom-control-inline">Expanded Menu
                          <input class="selectgroup-input" type="radio" name="sidebar-size" value="default">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                      <div class="col-6">
                        <label class="form-check-inline custom-control-inline">Collapsed Menu
                          <input class="selectgroup-input" type="radio" name="sidebar-size" value="folded">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <!--Sidebar color option-->
                <div class="form-group m-t-20">
                  <label class="form-label">Sidebar color option</label>
                  <div class="custom-controls-stacked">
                    <div class="row">
                      <div class="col-6">
                        <label class="form-check-inline custom-control-inline">Light
                          <input class="selectgroup-input" type="radio" name="sidebar-color" value="light">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                      <div class="col-6">
                        <label class="form-check-inline custom-control-inline">Dark
                          <input class="selectgroup-input" type="radio" name="sidebar-color" value="dark">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group mb-2 d-none">
                  <label class="form-label">Sidebar fixed</label>
                  <div class="selectgroup w-100p">
                    <label class="selectgroup-item">
                      <input type="radio" name="sidebar-fixed" value="fixed" class="selectgroup-input">
                      <span class="selectgroup-button">fixed</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="sidebar-fixed" value="default" class="selectgroup-input">
                      <span class="selectgroup-button">default</span>
                    </label>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- General scripts -->
    <script type="text/javascript" src="<?php echo BASE; ?>assets/plugins/vendors/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE; ?>assets/plugins/vendors/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE; ?>assets/plugins/vendors/selectize.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE; ?>assets/admin/vendors/autosize/autosize.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE; ?>assets/admin/vendors/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!-- Core scripts -->
    <script type="text/javascript" src="<?php echo BASE; ?>assets/js/core.js"></script>
    <script type="text/javascript" src="<?php echo BASE; ?>assets/admin/dist/js/admin-core.min.js"></script>
    <script type="text/javascript" src="<?php echo BASE; ?>assets/admin/dist/js/customizer.js"></script>
    <!-- toast -->
    <script type="text/javascript" src="<?php echo BASE; ?>assets/plugins/jquery-toast/js/jquery.toast.js"></script>
    <!-- Tiny Editor -->
    <script type="text/javascript" id="tinymce-js" src="<?php echo BASE; ?>assets/plugins/tinymce/tinymce.min.js"></script>
    <!-- flags icon -->
    <script type="text/javascript" src="<?php echo BASE; ?>assets/plugins/flags/js/docs.js"></script>
    <?php if(segment('1')=='gallery' || segment('1')=='setting' || segment('1') == 'blogs'){ ?>
    <script type="text/javascript" src="<?php echo BASE; ?>assets/plugins/jquery-upload/js/vendor/jquery.ui.widget.js"></script>
    <script type="text/javascript" src="<?php echo BASE; ?>assets/plugins/jquery-upload/js/jquery.iframe-transport.js"></script>
    <script type="text/javascript" src="<?php echo BASE; ?>assets/plugins/jquery-upload/js/jquery.fileupload.js"></script>
    <?php } ?>
    <?php if(segment('1') == 'statistics'){ ?>
    <script type="text/javascript" src="<?php echo BASE; ?>assets/js/chart_template.js"></script>
    <?php }?>
    <!-- general JS -->
    <script type="text/javascript" src="<?php echo BASE; ?>assets/js/process.js"></script>
    <script type="text/javascript" src="<?php echo BASE; ?>assets/js/general.js"></script>
  </body>
</html>
