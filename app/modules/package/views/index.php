    <!-- get Header top menu -->
    <?php
      $data_link = (object)array(
        'link'  => cn(strip_tags($category->url_slug)),
        'name'  => strip_tags($category->name)
      );
    ?>
    <?php echo Modules::run("blocks/user_header_top", $data_link); ?>    
    

<!-- Package Section Start -->
        <div id="packageSec" class="py-5">
            <div class="container">
                <div class="text-center">
                    
                    <h1 class="font-weight-bolder mb-5"><?php echo $category->page_title ;?></h1>
                </div>
                
                
                <div class="custom_content">
                     <?php
                     $html = $category->page_description;
                     echo htmlspecialchars_decode($html);
                     ?>
                </div>
                
                <div class="row mb-5 justify-content-center">
                    <?php
                    $setting_number  = get_setting_number_format();
                    $currency_symbol = get_option('currency_symbol', '$');
                    if (!empty($services)) {
                    foreach ($services as $key => $row) {
                  ?>
                   <!-- Package Item -->
                    <div class="col-lg-3 col-md-3 col-12 mb-lg-0 mb-md-0 mb-3">
                        <form action="<?php echo cn('checkout'); ?>" method="POST">
                        <div class="card border-warning shadow rounded-15 pt-5 pb-3 popular-tag">
                            <div class="card-body">
                                <div class="text-center">
                                    <h6 class="font-weight-bold"><?php echo strip_tags($row->quantity); ?> <?php echo strip_tags($row->name); ?></h6>
                                    <h1 class="package-price-badge"><?php echo strip_tags($currency_symbol); ?> <?php echo currency_format($row->price, $setting_number->decimal_places, $setting_number->decimal_separator, $setting_number->thousand_separator); ?></h1>
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
                                    <input type="hidden" name="<?php echo strip_tags($this->security->get_csrf_token_name());?>" value="<?php echo strip_tags($this->security->get_csrf_hash());?>">
                        <input type="hidden" name="item_id" value="<?php echo strip_tags($row->id); ?>">
                                    <?php 
                                      if ($row->status) {
                                    ?> 
                                     <button type="submit" class="btn btn-yellow-grad btn-sm px-2 py-2 rounded-15"> <?php echo lang('order_now'); ?></button>
                                    <?php }else{ ?>
                                      <button type="submit" class="btn btn-yellow-grad btn-sm px-2 py-2 rounded-15"> <?php echo lang('Disabled'); ?></button>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                  <?php } } ?>
                </div>
                
                
            </div>
        </div>
        </div>
        <!-- Package Section End -->
<style>
.owl-carousel {
    display: block !important;
}
h2 {
    margin-top: 30px;
    margin-bottom: 30px;
}
h6.font-weight-bold {
    word-spacing: 5px;
}
</style>