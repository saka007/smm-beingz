  <?php echo Modules::run(get_theme()."/header"); ?>
    <!-- Service Slogan Section Start -->
<?php 
$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) { ?>
     <div id="serviceSloganSec" class="py-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-5 col-12 mb-lg-0 mb-md-0 mb-3 align-self-center">
                    <img src="<?php echo BASE; ?>themes/pergo/assets/images/service-slogn.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-5 col-md-5 col-12 align-self-center">
                    <h1 class="font-weight-bolder"><?php echo lang("why_our_services_is_the_best"); ?></h1>
                    <p><?php echo lang("why_our_services_is_the_best_desc"); ?></p>
                </div>
            </div>
        </div>
    </div>



    <div id="serviceContactBG">
    
    <div id="buyInstructionSec" class="py-5">
        <div class="container">
            <div class="text-center text-white">
                <h1 class="font-weight-bolder mb-4"><?php echo lang("how_to_buy_a_package"); ?></h1>
                <p id="buyP" class="mb-5"><?php echo lang("buying_social_media_packages_from_our_servies_is_simple_and_fast_just_follow_these_steps"); ?></p>
            </div>

            <div class="row">

                <!-- Instruction Item -->
                <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-5">
                    <div class="card border-0 shadow instruction-item instruction-item-1">
                        <div class="card-body">
                            <div class="text-center">
                                <h3><?php echo lang("choose_package"); ?></h3>
                                <p><?php echo lang("its_easy_to_get_started_with_us_choose_from_our_wide_range_of_packages_that_cater_your_requirements"); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Instruction Item -->
                <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-5">
                    <div class="card border-0 shadow instruction-item instruction-item-2">
                        <div class="card-body">
                            <div class="text-center">
                                <h3><?php echo lang("enter_details"); ?></h3>
                                <p><?php echo lang("provide_us_details_about_what_you_need_to_boost_now_we_dont_require_your_password"); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Instruction Item -->
                <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-5">
                    <div class="card border-0 shadow instruction-item instruction-item-3">
                        <div class="card-body">
                            <div class="text-center">
                                <h3><?php echo lang("wait_for_results"); ?></h3>
                                <p><?php echo lang("you_can_pay_via_card_or_any_other_available_method_we_will_create_and_proceed_with_an_order_and_inform_you_once_done"); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    
   <div id="packageSec" class="py-5">
            <div class="container">
                <div class="row">
                    
                    <!-- Package Item -->
                    <div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-3">
                        <div class="card border-warning shadow rounded-15 pt-5 pb-3 popular-tag pricing-pack">
                            <div class="card-body">
                                <div class="text-center">
                                    <h6 class="font-weight-bold">500 Instagram Likes</h6>
                                    <h1 class="package-price-badge">$ 5.59</h1>
                                </div>
                                <ul class="nav flex-column package-nav mb-3">
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>High Quality</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>No Password Needed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Drop Protection</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Safe and Easy</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Instant Delivery Guaranteed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>24/7 Support</span>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Secure Payments</span>
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="/buy-instagram-likes"><button type="button" class="btn btn-yellow-grad btn-sm px-2 py-2 rounded-15">View More Plans</button></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Package Item -->
                    <div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-3">
                        <div class="card border-white shadow rounded-15 pt-5 pb-3 popular-tag pricing-pack">
                            <div class="card-body">
                                <div class="text-center">
                                    <h6 class="font-weight-bold">250 Instagram Followers</h6>
                                    <h1 class="package-price-badge">$ 4.50</h1>
                                </div>
                                <ul class="nav flex-column package-nav mb-3">
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>High Quality</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>No Password Needed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Drop Protection</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Safe and Easy</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Instant Delivery Guaranteed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>24/7 Support</span>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Secure Payments</span>
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="/buy-instagram-followers"><button type="button" class="btn btn-yellow-grad btn-sm px-2 py-2 rounded-15">View More Plans</button></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Package Item -->
                    <div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-3">
                        <div class="card border-warning shadow rounded-15 pt-5 pb-3 popular-tag pricing-pack">
                            <div class="card-body">
                                <div class="text-center">
                                    <h6 class="font-weight-bold">500 Instagram Views</h6>
                                    <h1 class="package-price-badge">$ 5.59</h1>
                                </div>
                                <ul class="nav flex-column package-nav mb-3">
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>High Quality</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>No Password Needed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Drop Protection</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Safe and Easy</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Instant Delivery Guaranteed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>24/7 Support</span>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Secure Payments</span>
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="/buy-instagram-views"><button type="button" class="btn btn-yellow-grad btn-sm px-2 py-2 rounded-15">View More Plans</button></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Package Item -->
                    <div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-3">
                        <div class="card border-warning shadow rounded-15 pt-5 pb-3 popular-tag pricing-pack">
                            <div class="card-body">
                                <div class="text-center">
                                    <h6 class="font-weight-bold">100 Instagram Auto Likes</h6>
                                    <h1 class="package-price-badge">$ 5.59</h1>
                                </div>
                                <ul class="nav flex-column package-nav mb-3">
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>High Quality</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>No Password Needed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Drop Protection</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Safe and Easy</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Instant Delivery Guaranteed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>24/7 Support</span>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Secure Payments</span>
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="/buy-instagram-auto-likes"><button type="button" class="btn btn-yellow-grad btn-sm px-2 py-2 rounded-15">View More Plans</button></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Our Services Section Start -->

        

        <!-- Our Services Section End -->

        <!-- Contact Us Section Start -->

        <div id="contactSec" class="mb-5">
            <div class="container">
                <div class="text-center py-5">
                    <h1 class="font-weight-bolder">Contact us</h1>
                </div>

                <form action="">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-sm-0 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control rounded-0 form-input-box" id="name" placeholder="NAME*">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-sm-0 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control rounded-0 form-input-box" id="mobile" placeholder="MOBILE NO*"> 
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-sm-0 mb-3">
                            <div class="form-group">
                                <input type="email" class="form-control rounded-0 form-input-box" id="email" placeholder="EMAIL*">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <textarea id="message" class="form-control rounded-0 form-input-box" rows="5" placeholder="MESSAGE"></textarea>
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
    </div>
    <div id="pacSayFooBG">
    <?php echo Modules::run(get_theme()."/footer"); ?>
    </div>
<?php } else { ?>
    <div id="serviceSloganSec" class="py-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-5 col-12 mb-lg-0 mb-md-0 mb-3 align-self-center">
                    <img src="<?php echo BASE; ?>themes/pergo/assets/images/service-slogn.png" class="img-fluid" alt="">
                </div>

                <div class="col-lg-5 col-md-5 col-12 align-self-center">
                    <h1 class="font-weight-bolder"><?php echo lang("why_our_services_is_the_best"); ?></h1>
                    <p><?php echo lang("why_our_services_is_the_best_desc"); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Slogan Section End -->

    <div id="serviceContactBG">
        <!-- Our Services Section Start -->

        <div id="serviceSec">
            <div class="container">

                <div class="text-center py-5">
                    <h1 class="font-weight-bolder"><?php echo lang("services_we_offer"); ?></h1>
                </div>

                <div class="row">
                    <!-- Service Item -->
                    <div class="col-lg-4 col-md-4 col-12 mb-4">
                        <div class="card border-0 shadow service-item">
                            <div class="card-body">
                                <div class="text-center">
                                    <i class="far fa-clock fa-6x mb-3"></i>
                                    <h3 class="mb-3">Fast Delivery</h3>
                                    <p><?php echo lang("youll_see_results_immediately_likes_will_be_dropping_in_as_soon_as_you_place_an_order"); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Service Item -->
                    <div class="col-lg-4 col-md-4 col-12 mb-4">
                
                        <div class="card border-0 shadow service-item">
                            <div class="card-body">
                                <div class="text-center">
                                    <i class="fas fa-phone-volume fa-3x mb-3"></i>
                                    <h3 class="mb-3">24/7 Support</h3>
                                    <p><?php echo lang("technical_support_for_all_our_services_247_to_help_you_if_you_have_some_query_drop_an_email_to_our_support_team_we_are_delighted_to_assist_you"); ?></p>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <!-- Service Item -->
                    <div class="col-lg-4 col-md-4 col-12 mb-4">
                        <div class="card border-0 shadow service-item">
                            <div class="card-body">
                                <div class="text-center">
                                    <i class="far fa-star fa-3x mb-3"></i>
                                    <h3 class="mb-3">High Quality Services</h3>
                                    <p><?php echo lang("get_the_best_high_quality_services_and_in_less_time_here_satisfaction_of_our_customers_is_most_important_to_us_gain_desired_outputs_by_choosing_our_services_available_at_an_affordable_prices"); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Service Item -->
                    <div class="col-lg-4 col-md-4 col-12 mb-4">
                        <div class="card border-0 shadow service-item">
                            <div class="card-body">
                                <div class="text-center">
                                    <i class="far fa-save fa-3x mb-3"></i>
                                    <h3 class="mb-3">Privacy & Safety</h3>
                                    <p><?php echo lang("we_never_ask_your_password_or_any_private_information_we_recommend_you_to_protect_your_password_and_dont_give_it_to_anybody_for_your_safety"); ?></p>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Service Item -->
                    <div class="col-lg-4 col-md-4 col-12 mb-4">
                        <div class="card border-0 shadow service-item">
                            <div class="card-body">
                                <div class="text-center">
                                    <img src="https://img.icons8.com/dotty/50/000000/warranty.png" class="mb-3"/>
                                    <h3 class="mb-3">Our Guarantee</h3>
                                    <p><?php echo lang("satisfaction_is_our_number_one_priority_if_you_are_not_happy_you_will_receive_a_100_money_back_this_is_why_we_stand_high_and_remain_the_best_place_to_buy_all_our_serivces"); ?></p>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Service Item -->
                    <div class="col-lg-4 col-md-4 col-12 mb-4">
                        <div class="card border-0 shadow service-item">
                            <div class="card-body">
                                <div class="text-center">
                                    <i class="far fa-credit-card fa-3x mb-3"></i>
                                    <h3 class="mb-3">Secure Payments</h3>
                                    <p><?php echo lang("we_have_a_popular_methods_as_paypal_and_many_more_can_be_enabled_upon_request"); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Our Services Section End -->

        <!-- Contact Us Section Start -->

        <div id="contactSec" class="mb-5">
            <div class="container">
                <div class="text-center py-5">
                    <h1 class="font-weight-bolder">Contact us</h1>
                </div>

                <form action="">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-sm-0 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control rounded-0 form-input-box" id="name" placeholder="NAME*">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-sm-0 mb-3">
                            <div class="form-group">
                                <input type="text" class="form-control rounded-0 form-input-box" id="mobile" placeholder="MOBILE NO*"> 
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-sm-0 mb-3">
                            <div class="form-group">
                                <input type="email" class="form-control rounded-0 form-input-box" id="email" placeholder="EMAIL*">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">
                            <div class="form-group">
                                <textarea id="message" class="form-control rounded-0 form-input-box" rows="5" placeholder="MESSAGE"></textarea>
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
    </div>


    <!-- Buy Package Instruction Section Start -->

    <div id="buyInstructionSec" class="py-5">
        <div class="container">
            <div class="text-center text-white">
                <h1 class="font-weight-bolder mb-4"><?php echo lang("how_to_buy_a_package"); ?></h1>
                <p id="buyP" class="mb-5"><?php echo lang("buying_social_media_packages_from_our_servies_is_simple_and_fast_just_follow_these_steps"); ?></p>
            </div>

            <div class="row">

                <!-- Instruction Item -->
                <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-5">
                    <div class="card border-0 shadow instruction-item instruction-item-1">
                        <div class="card-body">
                            <div class="text-center">
                                <h3><?php echo lang("choose_package"); ?></h3>
                                <p><?php echo lang("its_easy_to_get_started_with_us_choose_from_our_wide_range_of_packages_that_cater_your_requirements"); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Instruction Item -->
                <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-5">
                    <div class="card border-0 shadow instruction-item instruction-item-2">
                        <div class="card-body">
                            <div class="text-center">
                                <h3><?php echo lang("enter_details"); ?></h3>
                                <p><?php echo lang("provide_us_details_about_what_you_need_to_boost_now_we_dont_require_your_password"); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Instruction Item -->
                <div class="col-lg-4 col-md-4 col-12 mb-lg-0 mb-md-0 mb-5">
                    <div class="card border-0 shadow instruction-item instruction-item-3">
                        <div class="card-body">
                            <div class="text-center">
                                <h3><?php echo lang("wait_for_results"); ?></h3>
                                <p><?php echo lang("you_can_pay_via_card_or_any_other_available_method_we_will_create_and_proceed_with_an_order_and_inform_you_once_done"); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Buy Package Instruction Section End -->

    


    <div id="pacSayFooBG">
        <!-- Package Section Start -->
        <div id="packageSec" class="py-5">
            <div class="container">
                <div class="row">
                    
                    <!-- Package Item -->
                    <div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-3">
                        <div class="card border-warning shadow rounded-15 pt-5 pb-3 popular-tag pricing-pack">
                            <div class="card-body">
                                <div class="text-center">
                                    <h6 class="font-weight-bold">500 Instagram Likes</h6>
                                    <h1 class="package-price-badge">$ 5.59</h1>
                                </div>
                                <ul class="nav flex-column package-nav mb-3">
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>High Quality</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>No Password Needed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Drop Protection</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Safe and Easy</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Instant Delivery Guaranteed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>24/7 Support</span>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Secure Payments</span>
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="/buy-instagram-likes"><button type="button" class="btn btn-yellow-grad btn-sm px-2 py-2 rounded-15">View More Plans</button></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Package Item -->
                    <div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-3">
                        <div class="card border-white shadow rounded-15 pt-5 pb-3 popular-tag pricing-pack">
                            <div class="card-body">
                                <div class="text-center">
                                    <h6 class="font-weight-bold">250 Instagram Followers</h6>
                                    <h1 class="package-price-badge">$ 4.50</h1>
                                </div>
                                <ul class="nav flex-column package-nav mb-3">
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>High Quality</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>No Password Needed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Drop Protection</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Safe and Easy</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Instant Delivery Guaranteed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>24/7 Support</span>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Secure Payments</span>
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="/buy-instagram-followers"><button type="button" class="btn btn-yellow-grad btn-sm px-2 py-2 rounded-15">View More Plans</button></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Package Item -->
                    <div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-3">
                        <div class="card border-warning shadow rounded-15 pt-5 pb-3 popular-tag pricing-pack">
                            <div class="card-body">
                                <div class="text-center">
                                    <h6 class="font-weight-bold">500 Instagram Views</h6>
                                    <h1 class="package-price-badge">$ 5.59</h1>
                                </div>
                                <ul class="nav flex-column package-nav mb-3">
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>High Quality</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>No Password Needed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Drop Protection</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Safe and Easy</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Instant Delivery Guaranteed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>24/7 Support</span>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Secure Payments</span>
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="/buy-instagram-views"><button type="button" class="btn btn-yellow-grad btn-sm px-2 py-2 rounded-15">View More Plans</button></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Package Item -->
                    <div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-3">
                        <div class="card border-warning shadow rounded-15 pt-5 pb-3 popular-tag pricing-pack">
                            <div class="card-body">
                                <div class="text-center">
                                    <h6 class="font-weight-bold">100 Instagram Auto Likes</h6>
                                    <h1 class="package-price-badge">$ 5.59</h1>
                                </div>
                                <ul class="nav flex-column package-nav mb-3">
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>High Quality</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>No Password Needed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Drop Protection</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Safe and Easy</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Instant Delivery Guaranteed</span>
                                    </li>

                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>24/7 Support</span>
                                    </li>
                                    
                                    <li class="nav-item">
                                        <img src="<?php echo BASE; ?>themes/pergo/assets/images/tick.png" class="img-fluid"/>
                                        <span>Secure Payments</span>
                                    </li>
                                </ul>

                                <div class="text-center">
                                    <a href="/buy-instagram-auto-likes"><button type="button" class="btn btn-yellow-grad btn-sm px-2 py-2 rounded-15">View More Plans</button></a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Package Section End -->


        <!-- People Say Section Start -->

        <div id="peopleSaySec" class="py-5" style="padding-top:1rem !important;">
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
                                            <img src="<?php echo BASE; ?>themes/pergo/assets/images/Group 89.png" class="img-fluid"/>
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

        <!-- People Say Section End -->


        <!-- Footer Section Start -->
<?php echo Modules::run(get_theme()."/footer"); ?>

    <!-- Footer Section End -->
    </div>
<?php } ?>
    


    



    <!-- <script src="./assets/js/jquery-3.5.0.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="<?php echo BASE; ?>themes/pergo/assets/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/f395748b55.js" crossorigin="anonymous"></script>
    <script src="<?php echo BASE; ?>themes/pergo/assets/js/app.js"></script>
</body>
</html>