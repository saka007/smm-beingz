<!-- get Header top menu -->
<?php
  $data_link = (object)array(
    'link'  => cn($module),
    'name'  => lang('Contact')
  );
?>
<?php echo Modules::run("blocks/user_header_top", $data_link); ?>

<section class="contact" style="background: url('http://boostinstagramfollowers.com/themes/pergo/assets/images/boost_gram_banner.jpg') no-repeat center center;background-size: cover;">
  <div class="container">
    <div class="row justify-content-md-center">

      <div class="col-md-8">
        <div class="contact-header text-white">
          <div class="title">
            <h1 class="title-name"><?php echo lang("contact_us"); ?></h1>
          </div>
          <span><?php echo lang("get_in_touch_with_us_today_wed_love_to_hear_from_you"); ?></span>
        </div>
      </div>

      <div class="col-md-8">
        <div class="card contact_form">
          <div class="card-body">
            <form class="form actionFormWithoutToast" action="<?php echo cn($module."/send_message"); ?>" data-redirect="<?php echo cn($module); ?>" method="POST">
              <div class="form-body" id="contact-form">
                <div class="row justify-content-md-center">
                  <div class="col-md-12">
                    <div id="alert-message"></div>
                  </div>
                  <div class="col-12 col-sm-12 col-md-6">
                    <div class="form-group">
                      <label><?php echo lang('Name'); ?> <span class="form-required">*</span></label>
                      <input class="form-control square" type="text" name="name" required>
                    </div>

                    <div class="form-group">
                      <label><?php echo lang('Email'); ?> <span class="form-required">*</span></label>
                      <input class="form-control square" type="email" name="email" required>
                    </div>

                    <div class="form-group">
                      <label><?php echo lang("Subject"); ?> <span class="form-required">*</span></label>
                      <select name="subject" class="form-control square ajaxChangeContactSubject">
                        <option value="subject_general"><?php echo lang('General'); ?></option>
                        <option value="subject_order"><?php echo lang("Order"); ?></option>
                        <option value="subject_payment"><?php echo lang("Payment"); ?></option>
                      </select>
                    </div>
                    <div class="form-group subject-order">
                      <label><?php echo lang("order_id"); ?></label>
                      <input class="form-control square" type="number" name="order_id" placeholder="">
                    </div>
 
                    <div class="form-group subject-payment d-none">
                      <label><?php echo lang("Transaction_ID"); ?></label>
                      <input class="form-control square" type="text" name="transaction_id" placeholder="<?php echo lang("enter_the_transaction_id"); ?>">
                      </select>
                    </div>
                  </div> 
                  <div class="col-12 col-sm-12 col-md-6">
                    <div class="form-group">
                      <label><?php echo lang('Message'); ?> <span class="form-required">*</span></label>
                      <textarea rows="12" id="editor" class="form-control square" name="message" required></textarea>
                      <?php
                        $replace_text = '<a href="https://imgbb.com/" class="text-info" rel="nofollow" target="_blank"> <strong>'.lang('Click_here').'</strong></a>';
                      ?>
                      <p class="fs-13"> 
                      <?php echo sprintf(lang('if_you_have_any_related_image_then_please_X_to_upload_it_on_the_site_and_give_us_the_embed_code_in_a_message_box_to_solve_your_issue'), $replace_text); ?> 
                      </p>
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12 text-center m-t-10">
                    <button type="submit" class="btn  btn-pill btn-submit btn-gradient"><?php echo lang("send_your_message"); ?></button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</section>

<script src="<?php echo BASE; ?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
  CKEDITOR.replace( 'editor', {
    height: 270
  });
</script>

<script type="text/javascript">
  /*----------  ajaxChangeContactSubject  ----------*/
  "use strict";
  $(document).on("change", ".ajaxChangeContactSubject", function(){
      event.preventDefault();
      var _that   = $(this),
          _type    = _that.val();
      switch(_type) {
        case "subject_order":
          $("#contact-form .subject-order").removeClass("d-none");
          $("#contact-form .subject-payment").addClass("d-none");
          break;  
        case "subject_payment":
          $("#contact-form .subject-order").addClass("d-none");
          $("#contact-form .subject-payment").removeClass("d-none");
          break;

        default:
          $("#contact-form .subject-order").removeClass("d-none");
          $("#contact-form .subject-payment").addClass("d-none");
          break;
      }
  })

</script>