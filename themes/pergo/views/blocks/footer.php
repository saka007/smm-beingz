    <?php if($display_html){?>
        <div id="footerSec" class="py-5">
        <div class="container">
            <div class="row">

                <!-- Footer Item -->
                <div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-3">
                    <div class="mb-3">
                        <img src="<?php echo get_option('website_logo', BASE."assets/images/logo.png"); ?>" class="img-fluid" alt=""> 
                    </div>
                    
                    <p>Save time managing your social account in one place. Our service help you build your business, get your social media content around the world and become famous. It offers you all the services you will need for Youtube, Facebook, Twitter & Instagram.</p>
                </div>

                <!-- Footer Item -->
                <div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-3">
                    <h4 class="font-weight-bold mb-4">IMPORTANT</h4>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="" class="nav-link p-0 mb-3 text-dark">BUY INSTAGRAM LIKE</a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link p-0 mb-3 text-dark">BUY INSTAGRAM FOLLOWERS</a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link p-0 mb-3 text-dark">BUY INSTAGRAM VIEWS</a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link p-0 text-dark">TERM'S & CONDITIONS</a>
                        </li>
                    </ul>
                </div>
                
                <!-- Footer Item -->
                <div class="col-lg-2 col-md-2 col-12 mb-lg-0 mb-md-0 mb-3">
                    <h4 class="font-weight-bold mb-4">QUICK</h4>
                    <ul class="nav flex-column">
                        <li><a class="nav-link p-0 mb-3 text-dark" href="<?php echo cn(); ?>"><?php echo lang("Home"); ?></a></li>
                  <li><a class="nav-link p-0 mb-3 text-dark" href="<?php echo cn('faq'); ?>"><?php echo lang("FAQs"); ?></a></li>
                  <li><a class="nav-link p-0 mb-3 text-dark" href="<?php echo cn('blog'); ?>"><?php echo lang('Blog'); ?></a></li>
                  <li><a class="nav-link p-0 mb-3 text-dark" href="<?php echo cn('terms'); ?>"><?php echo lang("terms__conditions"); ?></a></li>
                  <li><a class="nav-link p-0 mb-3 text-dark" href="<?php echo cn('contact'); ?>"><?php echo lang('Contact'); ?></a></li>
                    </ul>
                </div>
                
                
                <!-- Footer Item -->
                <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-3">
                    <div id="contactItem" class="mb-3">
                        <h4 class="font-weight-bold mb-4">CONTACT</h4>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link p-0 mb-3 text-dark">
                                    <img src="https://img.icons8.com/ios-glyphs/16/000000/message-group.png"/>
                                    <span><?php echo get_option('contact_email',"help@boostinstagramfollowers.com"); ?></span>
                                </a>
                            </li>
    
                            <!--<li class="nav-item">-->
                            <!--    <a href="" class="nav-link p-0 mb-3 text-dark">-->
                            <!--        <img src="https://img.icons8.com/ios-filled/16/000000/outgoing-call.png"/>-->
                            <!--        <span><?php echo get_option('contact_tel',"+12345678"); ?> </span>-->
                            <!--    </a>-->
                            <!--</li>-->
                        </ul>
                    </div>
                    
                    <div id="workItem" class="mb-3">
                        <h4 class="font-weight-bold mb-4">WORKING HOURS</h4>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                Monday - Saturday
                            </li>
                            <li class="nav-item">
                               <?php echo get_option('contact_work_hour',"Mon - Sat 09 am - 10 pm"); ?>
                            </li>
                        </ul>
                    </div>
                    
                    
                    <div id="workItem">
                        <h4 class="font-weight-bold">CONNECT US ON</h4>
                                   <div class="row align-items-center">
              <div class="col-auto">
                <ul class="list-inline mb-0">
                  <?php 
                    if (get_option('social_facebook_link','') != '') {
                  ?>
                  <li class="list-inline-item"><a href="<?php echo get_option('social_facebook_link',''); ?>" target="_blank" class="btn btn-icon btn-facebook"><i class="fa fa-facebook"></i></a></li>
                  <?php }?>
                  <?php 
                    if (get_option('social_twitter_link','') != '') {
                  ?>
                  <li class="list-inline-item"><a href="<?php echo get_option('social_twitter_link',''); ?>" target="_blank" class="btn btn-icon btn-twitter"><i class="fa fa-twitter"></i></a></li>
                  <?php }?>
                  <?php 
                    if (get_option('social_instagram_link','') != '') {
                  ?>
                  <li class="list-inline-item"><a href="<?php echo get_option('social_instagram_link',''); ?>" target="_blank" class="btn btn-icon btn-instagram"><i class="fa fa-instagram"></i></a></li>
                  <?php }?>

                  <?php 
                    if (get_option('social_pinterest_link','') != '') {
                  ?>
                  <li class="list-inline-item"><a href="<?php echo get_option('social_pinterest_link',''); ?>" target="_blank" class="btn btn-icon btn-pinterest"><i class="fa fa-pinterest"></i></a></li>
                  <?php }?>

                  <?php 
                    if (get_option('social_tumblr_link','') != '') {
                  ?>
                  <li class="list-inline-item"><a href="<?php echo get_option('social_tumblr_link',''); ?>" target="_blank" class="btn btn-icon btn-vk"><i class="fa fa-tumblr"></i></a></li>
                  <?php }?>

                  <?php 
                    if (get_option('social_youtube_link','') != '') {
                  ?>
                  <li class="list-inline-item"><a href="<?php echo get_option('social_youtube_link',''); ?>" target="_blank" class="btn btn-icon btn-youtube"><i class="fa fa-youtube"></i></a></li>
                  <?php }?>

                </ul>
              </div>
            </div>
                    </div>
                    
                    
                </div>

            </div>
        </div>
    </div>
 
    <?php }?>
    
    <script src="<?php echo BASE; ?>assets/plugins/vendors/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE; ?>assets/plugins/vendors/jquery.sparkline.min.js"></script>
    <script src="<?php echo BASE; ?>assets/js/core.js"></script>
    <!-- toast -->
    <script type="text/javascript" src="<?php echo BASE; ?>assets/plugins/jquery-toast/js/jquery.toast.js"></script>
    <!-- AOS -->
    <script src="<?php echo BASE; ?>themes/pergo/assets/plugins/aos/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <?php  if(segment(1) != 'auth'){?>
    <!-- theme Js -->
    <script src="<?php echo BASE; ?>themes/pergo/assets/js/theme.js"></script>
    <?php } ?>
    <!-- Script js -->
    <script src="<?php echo BASE; ?>assets/js/process.js"></script>
    <script src="<?php echo BASE; ?>assets/js/general.js"></script>
    <?php echo htmlspecialchars_decode(get_option('embed_javascript', ''), ENT_QUOTES); ?>
    <script>
      $(document).ready(function(){
        "use strict";
        var is_notification_popup = "<?php echo get_option('enable_notification_popup', 0); ?>"
        setTimeout(function(){
            if (is_notification_popup == 1) {
              $("#notification").modal('show');
            }else{
              $("#notification").modal('hide');
            }
        },500);
     });
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </body>
</html>