
<section class="checkout-result">   
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="checkout-header text-center">
              <div class="title">
                <strong><i class="fe fe-alert-triangle"></i> <?php echo lang("order_failure"); ?></strong>
              </div>
              <span class="text-muted"><?php echo lang("your_order_was_not_successful"); ?></span>
            </div>
            <div class="detail">
              <p><?php echo lang("for_some_reasons_your_order_could_not_be_processed_if_you_still_cannot_find_the_reason_please_click_contact_us_button_for_more_details"); ?></p> 
              <div class="text-center">

                <a href="<?php echo cn(); ?>" class="btn btn-pill btn-submit btn-gradient btn-min-width mr-1 mb-1">
                  <?php echo lang("continute"); ?>
                </a>
                
                <a href="javascript:void(0)" class="btn btn-pill btn-contact btn-gradient btn-min-width mr-1 mb-1">
                  <?php echo lang("contact_us"); ?>
                </a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

