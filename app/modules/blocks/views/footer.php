 <?php $url = current_url(true);
 $parse_url = parse_url($url, PHP_URL_PATH);
 if (!in_array($parse_url, array("/contact", "/checkout/success", "/checkout/unsuccess"))) {  ?>
 <div id="buyInstructionSec" class="py-5">
        <div class="container">
            <div class="text-center text-white">
                <h1 class="font-weight-bolder mb-4">How to Buy a Package?</h1>
                <p id="buyP" class="mb-5">Buying social media packages from Our servies is simple and fast. Just follow these step</p>
            </div>

            <div class="row">

                <!-- Instruction Item -->
                <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-5">
                    <div class="card border-0 shadow instruction-item instruction-item-1">
                        <div class="card-body">
                            <div class="text-center">
                                <h3>Choose Package</h3>
                                <p>It's easy to get started with us. Choose from our wide range of packages that</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Instruction Item -->
                <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-5">
                    <div class="card border-0 shadow instruction-item instruction-item-2">
                        <div class="card-body">
                            <div class="text-center">
                                <h3>Enter Details</h3>
                                <p>Provide us details about what you need to boost now. We DONʼT require your password</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Instruction Item -->
                <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-5">
                    <div class="card border-0 shadow instruction-item instruction-item-3">
                        <div class="card-body">
                            <div class="text-center">
                                <h3>Wait for results</h3>
                                <p>You can pay via card or any other available method. We will create and proceed with an order and inform you once done</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    <div id="pacSayFooBG">
        <!-- Contact Us Section Start -->

        <div id="contactSec" class="mb-5" style="background:#FFFFFF;">
            <div class="container">
                <div class="text-center py-5">
                    <h1 class="font-weight-bolder">Contact us</h1>
                </div>

                <form class="form actionFormWithoutToast" action="https://boostinstagramfollowers.com/contact/send_message" data-redirect="https://boostinstagramfollowers.com/contact" method="POST">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-sm-0 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control rounded-0 form-input-box" id="name" name="name" placeholder="NAME*">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-sm-0 mb-3">
                            <div class="form-group">
                              <input type="text" name="subject" class="form-control rounded-0 form-input-box" id="subject" placeholder="SUBJECT*">
                              <!--  <select name="subject" class="form-control browser-default custom-select custom-select-lg ">-->
                              <!--  <option value="" disabled selected>SUBJECT</option>-->
                              <!--  <option value="subject_general">General</option>-->
                              <!--  <option value="subject_order">Order</option>-->
                              <!--  <option value="subject_payment">Payment</option>-->
                              <!--</select>-->
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-sm-0 mb-3">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control rounded-0 form-input-box" id="email" placeholder="EMAIL*">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <textarea id="message" name="message" class="form-control rounded-0 form-input-box" rows="5" placeholder="MESSAGE"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-warning btn-yellow-grad px-4 rounded-15">SEND</button>
                            </div>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>

        <!-- Contact Us Section End -->


        <!-- People Say Section Start -->
<?php 
$useragent=$_SERVER['HTTP_USER_AGENT'];

if(!preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) { ?>

        <div id="peopleSaySec" class="py-5">
            <div class="container">
                <div class="owl-carousel">
                    <div class="item">
                        <div class="people-say-item">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12 offset-lg-1 mb-lg-0 mb-md-0 mb-3 align-self-center text-white">
                                    <h1 class="font-weight-bold">What People Say About Us</h1>
                                    <p>Our service has an extensive customer roster built on years’ worth of trust. Read what our buyers think about our range of service.</p>
                                </div>
        
                                <div class="col-lg-6 col-md-6 col-12 offset-lg-1 offset-md-1 mb-lg-0 mb-md-0 mb-3">
                                    <div class="card bg-transparent border-0 say-item-card">
                                        <div class="card-body">
                                            <p>I cannot stress enough how happy I am with the service that I received. Thanks to all of you, my Instagram account is surging with activity! Youʼve not only earned yourself a loyal</p>
                                        </div>
                                    </div>
        
                                    <div class="d-flex align-items-center mt-lg-2 mt-md-2 mt-3 ml-lg-4 ml-md-4 ml-4">
                                        <div class="mr-2">
                                            <img src="<?php echo BASE; ?>themes/pergo/assets/images/Group 89.png" class="img-fluid">
                                        </div>
                                        <div class="people-model text-white">
                                            <h2 class="mb-0">Keith Irvine</h2>
                                            <p class="mb-0">Instagram Model</p>
                                        </div>
                                    </div>
                                </div>
        
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
<?php } ?>
        <!-- People Say Section End -->
<?php } ?>

        <!-- Footer Section Start -->

    <div id="footerSec" class="py-5" style="background:#FFFFFF;">
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
                        <h4 class="font-weight-bold mb-4">CONTACT<?php //echo lang("contact_informations"); ?></h4>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="" class="nav-link p-0 mb-3 text-dark">
                                    <img src="https://img.icons8.com/ios-glyphs/16/000000/message-group.png"/>
                                    <span><?php echo get_option('contact_email',"do-not-reply@smartpanel.com"); ?></span>
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

    <!-- Footer Section End -->
    </div>