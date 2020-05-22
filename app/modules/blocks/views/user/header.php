<link rel="stylesheet" href="<?php echo BASE; ?>themes/pergo/assets/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo BASE; ?>themes/pergo/assets/css/style.css">

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
<?php 
 $url = current_url(true);
 $parse_url = parse_url($url, PHP_URL_PATH);
?>
<div id="headerSec" <?php if($parse_url == '/checkout/success') echo 'style="background-size: cover;"';  ?> >

        <!-- Navigation Section Start -->
        
        <nav id="mainNavbar" class="navbar navbar-light navbar-expand-md">
            <div class="container">
                <a href="<?php echo site_url();?>" class="navbar-brand">
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
                                <li class="nav-item test">
                                  <a href="<?php echo $value->url_slug;?>" class="nav-link text-dark"><?php echo $value->name; ?></a>
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
    <?php 
 if (!in_array($parse_url, array("/contact", "/checkout/success", "ghi"))) {  ?>
        <div id="heroSec" class="mb-5">
            <div class="container">
                <div class="row">
                    <div id="heroContent" class="col-lg-6 col-md-6 col-12 mb-lg-0 mb-md-0 mb-3 text-white align-self-center">
                        <?php 
                        $url = current_url(true);
                        if(parse_url($url, PHP_URL_PATH) == '/checkout' ) { ?>
                             <h1 class="hero-title font-weight-bolder"> Checkout </h1>
                        <?php } else { ?>
                        <h1 class="hero-title font-weight-bolder"> Buy <?php echo strip_tags($second_link->name); ?></h1>
                        <?php } ?>
                        <p class="hero-content"><?php echo lang("save_time_managing_your_social_account_in_one_place_our_service_help_you_build_your_business_get_your_social_media_content_around_the_world_and_become_famous_it_offers_you_all_the_services_you_will_need_for_youtube_facebook_twitter__instagram"); ?></p>
                        <?php if(parse_url($url, PHP_URL_PATH) != '/checkout' ) { ?>
                        <!--<button type="button" class="btn btn-light shadow px-4 rounded-15 btn-sm">View More</button>-->
                        <?php } ?>
                    </div>
                    <div id="heroImage" class="col-lg-6 col-md-6 col-12 align-self-center">
                         <?php if (strip_tags($second_link->name) == 'Instagram Views') { ?>
                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/Insta_views.png" class="img-fluid" alt="Hero Image">
                        <?php } elseif (strip_tags($second_link->name) == 'Instagram Followers') { ?>
                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/Insta_Followers.png" class="img-fluid" alt="Hero Image">
                        <?php } elseif (strip_tags($second_link->name) == 'Instagram Auto Likes') { ?>
                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/auto-likes.png" class="img-fluid" alt="Hero Image">
                        <?php } else { ?>
                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/hero-img2.png" class="img-fluid" alt="Hero Image">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
   <?php } ?>
        <!-- Hero Section End -->