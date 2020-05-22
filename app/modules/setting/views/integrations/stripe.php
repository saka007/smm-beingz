
    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-credit-card"></i> Striper Integration</h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?php echo cn("$module/ajax_general_settings"); ?>" method="POST" data-redirect="<?php echo get_current_url(); ?>">
          <div class="row">

            <div class="col-md-12 col-lg-12">

              <h5 class="text-info"><i class="fe fe-link"></i> <?php echo lang("Status"); ?></h5>
              <div class="form-group">
                <label class="custom-switch">
                  <input type="hidden" name="is_active_stripe" value="0">
                  <input type="checkbox" name="is_active_stripe" class="custom-switch-input" <?php if(get_option("is_active_stripe", 0) == 1) echo "checked"; else echo ""; ?> value="1">
                  <span class="custom-switch-indicator"></span>
                  <span class="custom-switch-description"><?php echo lang("Active"); ?></span>
                </label>
              </div>
              
              <div class="form-group">
                <label class="form-label"><?=lang("Environment")?></label>
                <select  name="stripe_payment_environment" class="form-control square">
                  <option value="sandbox" <?php if(get_option("stripe_payment_environment", "sandbox") == 'sandbox') echo 'selected'; else echo ''; ?>><?php echo lang("sandbox_test"); ?></option>
                  <option value="live" <?php if(get_option("stripe_payment_environment", "sandbox") == 'live') echo 'selected'; else echo ''; ?>><?php echo lang("Live"); ?></option>
                </select>
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("publishable_key")?></label>
                <input class="form-control" name="stripe_publishable_key" value="<?=get_option('stripe_publishable_key',"")?>">
              </div>

              <div class="form-group">
                <label class="form-label"><?=lang("secret_key")?></label>
                <input class="form-control" name="stripe_secret_key" value="<?=get_option('stripe_secret_key',"")?>">
              </div>

            </div> 
            <div class="col-md-12 col-lg-12">
              <div class="form-footer">
                <button class="btn btn-primary btn-min-width btn-lg text-uppercase"><?php echo lang("Save"); ?></button>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
