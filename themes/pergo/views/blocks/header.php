<!doctype html>
<html lang="en" dir="ltr">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
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
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Arvo&display=swap" rel="stylesheet">
    
    <script src="<?php echo BASE; ?>assets/plugins/vendors/jquery-3.2.1.min.js"></script>

    <!-- Core -->
    <link href="<?php echo BASE; ?>assets/css/core.css" rel="stylesheet">

    <!-- AOS -->
    <link rel="stylesheet" href="<?php echo BASE; ?>themes/pergo/assets/plugins/aos/dist/aos.css" />
      
    <!-- toast -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>assets/plugins/jquery-toast/css/jquery.toast.css">
    <link rel="stylesheet" href="<?php echo BASE; ?>assets/plugins/boostrap/colors.css" id="theme-stylesheet">

    <link href="<?php echo BASE; ?>assets/css/util.css" rel="stylesheet">
    <link href="<?php echo BASE; ?>assets/css/keyframes.css" rel="stylesheet">
    <link href="<?php echo BASE; ?>themes/pergo/assets/css/theme_style.css" rel="stylesheet">
    <link href="<?php echo BASE; ?>themes/pergo/assets/css/theme_footer.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo BASE; ?>themes/pergo/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE; ?>themes/pergo/assets/css/style.css">
    
    <script type="text/javascript">
      var token = '<?php echo strip_tags($this->security->get_csrf_hash()); ?>',
          PATH  = '<?php echo PATH; ?>',
          BASE  = '<?php echo BASE; ?>';
      var    deleteItem = '<?php echo lang("Are_you_sure_you_want_to_delete_this_item"); ?>';
      var    deleteItems = '<?php echo lang("Are_you_sure_you_want_to_delete_all_items"); ?>';
    </script>
    <?=htmlspecialchars_decode(get_option('embed_head_javascript', ''), ENT_QUOTES)?>
    <style>.square_btn {
    display: inline-block;
    padding: 7px 20px;
    border-radius: 25px;
    text-decoration: none;
    color: #000000;
    background-image: -webkit-linear-gradient(45deg, #FFC107 0%, #ff8b5f 100%);
    background-image: linear-gradient(45deg, #FFC107 0%, #ff8b5f 100%);
    transition: .4s;
    margin-top: 40%;
    z-index: 99999;
        position: fixed;
}</style>
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
    
        <!-- Header Section Start -->

    <div id="headerSec">

        <!-- Navigation Section Start -->
        
        <nav id="mainNavbar" class="navbar navbar-light navbar-expand-md">
            <div class="container">
                <a href="index.html" class="navbar-brand">
                    <img src="<?php echo get_option('website_logo_white', BASE."assets/images/logo-white.png"); ?>" class="img-fluid" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
               
                <div id="mainMenu" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item">
                            <a href="<?php echo site_url();?>" class="nav-link text-dark">Home</a>
                        </li>
                          <?php 
                                foreach ($all_items['0']->categories as $key => $value) { if ($value->url_slug == 'free-trial' ) { continue; } ?>
                                <li class="nav-item">
                                  <a href="<?php echo $value->url_slug;?>" class="nav-link text-dark"><?php echo $value->name; ?> </a>
                                </li>
                            <?php }  ?>
                        <li class="nav-item">
                            <a href="/contact" class="nav-link text-dark">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a href="/free-trial" class="btn btn-primary btn-lg square_btn">Free Trial</a>
                        </li>
                        <li class="nav-item" style="width: 3rem;">
                          <div id="google_translate_element"></div>
                         </li>
                            <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Navigation Section End -->

        <!-- Hero Section Start -->

        <div id="heroSec" class="mb-5">
            <div class="container">
                <div class="row">
                    <div id="heroContent" class="col-lg-6 col-md-6 col-12 mb-lg-0 mb-md-0 mb-3 text-white align-self-center">
                        <h1 class="hero-title font-weight-bolder"><?php echo lang("get_your_social_accounts_followers_and_likes_at_one_place_instantly"); ?></h1>
                        <p class="hero-content"><?php echo lang("save_time_managing_your_social_account_in_one_place_our_service_help_you_build_your_business_get_your_social_media_content_around_the_world_and_become_famous_it_offers_you_all_the_services_you_will_need_for_youtube_facebook_twitter__instagram"); ?></p>
                        <a href="https://boostinstagramfollowers.com/buy-instagram-auto-likes"><button type="button" class="btn btn-light shadow px-4 rounded-15 btn-sm">View Packages</button></a>
                    </div>
                    <div id="heroImage" class="col-lg-6 col-md-6 col-12 align-self-center">
                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/hero-img.png" class="img-fluid" alt="Hero Image">
                    </div>
                </div>
            </div>
        </div>

        <!-- Hero Section End -->


        <div id="dialougeSec" class="pt-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-12 offset-lg-2 offset-md-2">
                        <div class="text-center">
                            <h1 class="font-weight-bolder">Boost Instagram Followers with Insta Beingz</h1>
                            <p>With millions of users active on Instagram daily, it’s safe to say that if a brand wants to interact with their audience, this is the best platform for them to accomplish this. In fact, many brands have already started leveraging from the benefits of having a prominent presence on Instagram. However, if you’re new to the world of Instagram, it can be brutal as gaining likes and followers isn’t very easy, especially with the plethora of competition present.</p> 
                            <span id="dots" style="opacity: 0;">.</span>
                        </div>
                    </div>
                    
                    <div id="more" class="col-lg-8 col-md-8 col-12 offset-lg-2 offset-md-2">
                        <div class="text-center">
                            <p>However, you don’t need to worry as BoostBeingz is here! You can avail authentic followers and likes for your Instagram page, to increase your page’s visibility and credibility. </p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-12 offset-lg-2 offset-md-2">
                        <div class="text-center">
                         <button onclick="myFunction()" id="myBtn" class="btn btn-yellow-grad px-4 rounded-15 btn-sm" type="button">Read More</button>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <!-- Header Section End -->
    <?php }?>
