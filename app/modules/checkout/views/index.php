<style>
.active_post { border: 4px solid #ff710b !important; }
</style>

<section class="checkout-form">
  <div class="container">
    <div class="row justify-content-md-center justify-content-xl-center content  ">
      <div class="col-md-12 text-center">
        <div class="checkout-header">
          <div class="title">
            <h1 class="title-name"><?php echo lang("checkout_form"); ?></h1>
          </div>
          <span class="text-muted"><?php echo lang('please_review_the_order_summary_again_before_entering_checkout_information'); ?></span>
        </div>
      </div>
      <div class="col-md-10">
        <div class="row checkout-wrap">
          <div class="col-sm-7 col-xs-12 checkout-left" style="padding-bottom: 30px;">
            <div class="checkout-left-title">
              <?php echo lang("checkout_information"); ?>
            </div>
            <div class="checkout-left-content form-content">
                
                <center>
              <div class="part1_block1" style="margin-top: 50px; display: block;">
              <p style="font-size:20px; font-weight:bold;"><span id="packagePostTotal_first"><?php echo strip_tags($item->quantity)?></span> 
                
                  <?php 
                    $d1 = strip_tags($item->name);
                    $d = explode(" ",$d1);
                    echo $item->name;
                  ?>
                
              </p>
              <p style="font-size:16px;"><span id="packagePostTotal_price"><?php echo get_option('currency_symbol', '$').currency_format($item->price, $setting_number->decimal_places, $setting_number->decimal_separator, $setting_number->thousand_separator); ?></span></p>
              <div style="padding-top:10px; margin-left:30%; margin-right:30%;">
              <input style="padding:20px; text-align:center;" maxlength="100" type="text" required="required" class="form-control" id="instagram_username" placeholder="Instagram Username">
              <input class="form-control" onclick="submit_function();my_function();" id="submit_step1" style="margin-top:10px; text-align:center;" type="button" value="Continue">
              </div>
              </div>
        
              <div style="margin-top:50px; height:200px; width:350px;" class="loading_image">
              <img src="https://qzdevelopers.com/fiverrr-api/instagram/loading.gif"/>
              <input onclick="submit2_function()" style="margin-top:10px; text-align:center;" type="button" class="form-control" value="Cancel"/>
              </div>
              
              <div class="part1_block2" style="margin-top:50px;">
              <p style="font-size:20px; font-weight:bold;">Error</p>
              <p style="font-size:16px;">Profile ("<span class="username_span"></span>") not found on Instagram</p>
              <div style="padding-top:10px; margin-left:30%; margin-right:30%;">
              <p><i style="font-size:60px;" class="fa fa-exclamation-triangle" aria-hidden="true"></i></p>
              <input onclick="submit2_function()" style="margin-top:10px; text-align:center;" type="button" class="form-control" value="Try Again"/>
              </div>
              </div>
              
              <div style="margin-top:50px;" class="part1_block3">
              <p style="font-size:20px; font-weight:bold;" class="username_span"></p>
              <p style="font-size:16px;">Select Post(s) (max 5)</p>
              <p style="font-size:16px;">Selected : <span id="post_images_selected">0</span></p>
              <p style="font-size:16px;"><?= $d[1];?> Per Post : <span id="packagePostTotal"></span></p>
              <div style="padding-top:10px; margin-left:30%; margin-right:30%;">
              <input onclick="submit3_function()" style="margin-top:10px; text-align:center;" type="button" class="form-control" value="Continue"/>
              <input onclick="submit2_function()" style="margin-top:10px; text-align:center;" type="button" class="form-control" value="Back"/>
              </div>
              </div>
                
              <div class="post_images" style="margin:20px;">
              <style>
              * { box-sizing: border-box; }
              .row::after { content: ""; clear: both; display: table; }
              </style>
              <div class="row"><div class="row post_images"></div></div>
              </div>
                
                
              <div style="margin-top:50px;" class="part1_block4">
              <form class="actionCheckoutForm" method="POST" action>
                <fieldset class="form-fieldset m-t-20">
                  <!-- get alert html -->
                  <div id="alert-message"></div>
                  <div class="form-group" style="display:none">
                    <label class="form-label"><?php echo strip_tags($item->required_field)?></label>
                    <input type="text" name="link" value="https://mediabeingz.com/checkout" class="form-control" placeholder="<?php echo strip_tags($item->required_field); ?>">
                  </div>

                  <div class="form-group">
                    <label class="form-label"><?php echo lang("email_address"); ?> <span class="form-required">*</span></label>
                    <input type="email" name="email" class="form-control" placeholder="<?php echo lang('please_enter_your_email_address'); ?>" required>
                  </div>
                  <?php
                    $exists_payment_methods = get_payments_method();
                  ?>
                  <div class="form-group" style="visibility: hidden">
                    <label class="form-label"><?php echo lang('payment_methods'); ?></label>
                    <select name="payment_method" id="select-payments" class="form-control custom-select" >
                      <?php 
                        if (!empty($exists_payment_methods)) {
                          foreach ($exists_payment_methods as $key => $row) {
                            if (get_option("is_active_".$row)) {
                      ?>
                      <option value="<?php echo $row; ?>" data-data='{"image": "<?php echo BASE; ?>assets/images/payments/<?php echo $row; ?>.png"}'><?php echo lang($row); ?></option>
                      <?php }}}else{ ?>
                      <option value="empty" data-data='{"image": "<?php echo BASE; ?>assets/images/payments/empty.png"}'><?php echo lang('empty'); ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="agree">
                      <input type="hidden"  name="item_ids" value="<?php echo strip_tags($item->ids)?>">
                      <input type="hidden"  name="free_trial" value="<?php echo strip_tags($item->name)?>">
                      <span class="custom-control-label"><?php echo lang('by_clicking_next_you_agree_to_our_terms_of_services'); ?></span>
                    </label>
                  </div>

                </fieldset>
                <div class="card-footer text-left">
                  <button type="submit" class="btn btn-pill btn-submit btn-gradient btn-block mr-1 mb-1">
                    <?php echo lang("place_order"); ?>
                  </button>
                </div>
              </form>                                
              <div class="card-footer text-right">
                <div class="d-flex">
                  <p class=""><?php echo lang('total_vat_included'); ?></p>
                  <h3 class="ml-auto pricediv">
                    <?php
                    if($this->session->userdata('key1')) {
                       $foo = $this -> session -> userdata('key1');
                       $amount = $foo;
                     }
                   else {
                   $amount = get_option('currency_symbol', '$').currency_format($item->price, $setting_number->decimal_places, $setting_number->decimal_separator, $setting_number->thousand_separator);
                   } 
                   echo $amount;
                    ?>
                    </h3>
                </div>
              </div>                
              </div>  

              
              
              
              <div style="margin-top:50px;" class="part1_block5">
                <p style="font-size:20px; font-weight:bold;" class="username_span"></p>
                <p style="font-size:16px;" class="followers"></p>
                  <img src="" class="profile-pic" style="border-radius:50%;" width="150" height="150"/>
                <p style="font-size:16px;margin-top: 24px;margin-left: 75px;margin-right: 75px;">Do you want us to add <?php echo $item->discount_qty; ?> likes to your two most recent posts for only <?php echo get_option('currency_symbol', '$').currency_format($item->discount_price, $setting_number->decimal_places, $setting_number->decimal_separator, $setting_number->thousand_separator); ?> extra (<?php echo $item->discount_percent; ?>% discount)?</p>
                <div style="padding-top:10px; margin-left:30%; margin-right:30%;">

                  <input onclick="submit4_function(<?php echo $item->id; ?>)" style="margin-top:10px; text-align:center;" type="button" class="form-control" value="Yes Continue"/>
                  <input onclick="submit3_function(<?php echo $item->id; ?>)" style="margin-top:10px; text-align:center;" type="button" class="form-control" value="No Proceed without adding"/>
                </div>
              </div>
              </center>
              
              

              

               
              
              
              

            </div>
          </div>
          <div class="col-sm-5 col-xs-12 checkout-right">
            <div class="checkout-right-title"><?php echo lang("order_summary"); ?></div>
            <div class="checkout-right-content">
              <div class="card-body">
                <ul class="list-unstyled leading-loose">
                  <li><i class="fa fa-check-square-o text-icon mr-2" aria-hidden="true"></i> <?php echo lang("package_name"); ?> <strong id="packageNameId"><?php echo strip_tags($item->name)?></strong></li>
                  <li><i class="fa fa-check-square-o text-icon mr-2" aria-hidden="true"></i> <?php echo lang("amount"); ?> <strong><?php echo strip_tags($item->quantity)?></strong></li>
                  <li><i class="fa fa-check-square-o text-icon mr-2" aria-hidden="true"></i> <?php echo lang("high_quality"); ?></li>
                  <li><i class="fa fa-check-square-o text-icon mr-2" aria-hidden="true"></i> <?php echo lang("all_real__active"); ?></li>
                  <li><i class="fa fa-check-square-o text-icon mr-2" aria-hidden="true"></i> <?php echo lang("lifetime_guaranteed"); ?></li>
                  <li><i class="fa fa-check-square-o text-icon mr-2" aria-hidden="true"></i> <?php echo lang("100_safe"); ?></li>
                  <li><i class="fa fa-check-square-o text-icon mr-2" aria-hidden="true"></i> <?php echo lang("no_password_required"); ?></li>
                  <li><i class="fa fa-check-square-o text-icon mr-2" aria-hidden="true"></i> <?php echo lang("214_days_delivery"); ?></li>
                  <li><i class="fa fa-check-square-o text-icon mr-2" aria-hidden="true"></i> <?php echo lang("247_support"); ?></li>
                  <li><i class="fa fa-check-square-o text-icon mr-2" aria-hidden="true"></i> <?php echo lang("Profile_must_be_public"); ?></li>
                </ul>
              </div>
              <?php
                $setting_number = get_setting_number_format();
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
var canceBtnWork = 0;
$(".loading_image").hide();
$(".part1_block2").hide();
$(".part1_block3").hide();
$(".part1_block4").hide();
$(".part1_block5").hide();
var packagePostTotal = 0;

function submit2_function(){
  canceBtnWork = 1;
  $(".part1_block2").hide();
  $(".part1_block3").hide();
  $(".part1_block4").hide();
  $(".part1_block5").hide();
  $(".loading_image").hide();
  $(".part1_block1").show();
  $(".post_images").html("");    
}
// ------------------------------------
// ------ Instagram API Get Post ------ 
// ------------------------------------
function submit_function()
{
  canceBtnWork = 0;
  var packageName = $("#packageNameId").html();
 
  var workVal = 0;
  $(".part1_block1").hide();
  $(".loading_image").show();
      
  var username = $("#instagram_username").val();
  $(".username_span").html(""+username);

  var resposeData = 0;
  setTimeout(function(){
      if(resposeData == 0){ $(".loading_image").hide(); $(".part1_block1").hide(); $(".part1_block2").show(); }
    }, 5000);


   $.ajax({
  
    url:"https://www.instagram.com/"+username+"?__a=1",
    type:'get',
    success:function(response){
      resposeData = 1;
      if(canceBtnWork !== 1){
      console.log(response);
      posts = response.graphql.user.edge_owner_to_timeline_media.edges;
      posts_html = '';
      for(var i=0;i<posts.length;i++)
      {
        url = posts[i].node.display_url;
        videoType = posts[i].node.__typename;
        if(packageName == "Instagram Views")
        {
          if(videoType == "GraphVideo"){
              workVal = 1;
              posts_html += '<div style="float: left; width: 33.33%; padding: 5px;" class="column"><img onclick="funImage('+posts[i].node.id+', '+i+')" class="'+i+'" img id="'+posts[i].node.id+'" src="'+url+'" style="width:100%; height:160px;"></div>';
          }
        }
        else if(packageName == "Instagram Likes" || packageName == "Free Likes") {
          if(videoType !== "GraphVideo"){

              workVal = 1;
              posts_html += '<div style="float: left; width: 33.33%; padding: 5px;" class="column"><img onclick="funImage('+posts[i].node.id+', '+i+')" class="'+i+'" img id="'+posts[i].node.id+'" src="'+url+'" style="width:100%; height:160px;"></div>';
          }
        }
        else if(packageName == "Instagram Auto Likes") { 
            workVal = 3;
        }
        else {
          workVal = 2;
            $(".profile-pic").attr('src',response.graphql.user.profile_pic_url);
            $(".followers").html(response.graphql.user.edge_followed_by.count+" Followers");
        }
      }

    $(".loading_image").hide();
    if(workVal == 1){
      $(".post_images").html(posts_html);
      $(".part1_block1").hide();
      $(".part1_block3").show();
      $("#packagePostTotal_first").html($("#packagePostTotal_first").html()); 
      $("#packagePostTotal").html($("#packagePostTotal_first").html());
      packagePostTotal = $("#packagePostTotal_first").html();
    }
    else if(workVal == 2){
      $(".part1_block1").hide();
      $(".part1_block5").show();
    }
    else if (workVal == 3) {
        $(".part1_block1").hide();
        $(".part1_block2").hide();
        $(".part1_block3").hide();
        $(".post_images").html("");    
        $(".part1_block4").show();
        $(".part1_block5").hide();
    }    
    else { $(".part1_block1").hide(); $(".part1_block2").show(); }
    }
    }
  });   
}


function my_function()
{
 $.get("https://ipinfo.io", function(response) { 
            console.log(response.ip); 
  }, "json")

  var username = $("#instagram_username").val();
  gtag('event', 'click', { 'send_to': 'UA-162775657-1', 'event_category': 'Username', 'event_action': 'Click', 'event_label': username});
  console.log(username);
}



function funImage(id, idNo){
  var countSelected = $('.active_post').length;
  if($("."+idNo).hasClass("active_post")){ 
      $("."+idNo).removeClass("active_post");
    $("#post_images_selected").html(countSelected-1);
    $("#packagePostTotal").html(Math.round(packagePostTotal/(countSelected-1)));
  }
    else {
    if(countSelected < 5){
          $("."+idNo).addClass("active_post");
      $("#post_images_selected").html(countSelected+1);
      $("#packagePostTotal").html(Math.round(packagePostTotal/(countSelected+1)));
        }
    }    
}

function submit3_function(id){
  $.ajax({url: "https://instabeingz.com/checkout/ch_session?id="+id+"&type=default", success: function(result){
    //console.log(result);
    $(".pricediv").html(result);
  }});
  var countSelected = $('.active_post').length;
    if(countSelected > 0){
        $(".part1_block2").hide();
        $(".part1_block3").hide();
        $(".post_images").html("");    
        $(".part1_block4").show();
        $(".part1_block5").hide();
    }
    else if($("#packageNameId").html() == "Instagram Followers"){
        $(".part1_block2").hide();
        $(".part1_block3").hide();
        $(".post_images").html("");    
        $(".part1_block4").show();
        $(".part1_block5").hide();
    }
}

function submit4_function(id){
  $.ajax({url: "https://instabeingz.com/checkout/ch_session?id="+id, success: function(result){
    //console.log(result);
    $(".pricediv").html('$'+result);
  }});
  var countSelected = $('.active_post').length;
    if(countSelected > 0){
       
        $(".part1_block2").hide();
        $(".part1_block3").hide();
        $(".post_images").html("");    
        $(".part1_block4").show();
        $(".part1_block5").hide();
    }
    else if($("#packageNameId").html() == "Instagram Followers"){
        $(".part1_block2").hide();
        $(".part1_block3").hide();
        $(".post_images").html("");    
        $(".part1_block4").show();
        $(".part1_block5").hide();
    }
}

</script>
