
    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-dollar-sign"></i> <?php echo lang("currency_setting"); ?></h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?php echo cn("$module/ajax_general_settings"); ?>" method="POST" data-redirect="<?php echo get_current_url(); ?>">
          <div class="row">
            <div class="col-md-12 col-lg-12">

              <h5 class="text-info"><i class="fe fe-link"></i> <?php echo lang("currency_setting"); ?></h5>
              <div class="form-group">
                <label class="form-label"><?php echo lang("currency_code"); ?></label>
                <small><?php echo lang("the_paypal_payments_only_supports_these_currencies"); ?></small>
                <select  name="currency_code" class="form-control square">
                  <?php 
                    $currency_codes = currency_codes();
                    if(!empty($currency_codes)){
                      foreach ($currency_codes as $key => $row) {
                  ?>
                  <option value="<?php echo strip_tags($key)?>" <?php echo (get_option("currency_code", "USD") == $key) ? 'selected' : ''; ?>> <?php echo strip_tags($key)." - ".strip_tags($row)?></option>
                  <?php }}else{?>
                  <option value="USD" selected> USD - United States dollar</option>
                  <?php }?>
                </select>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                    <label><?php echo lang("currency_symbol"); ?></label>
                    <input class="form-control" name="currency_symbol" value="<?php echo get_option('currency_symbol',"$"); ?>">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label><?php echo lang("thousand_separator"); ?></label>
                    <select  name="currency_thousand_separator" class="form-control square">
                      <option value="dot" <?php echo (get_option('currency_thousand_separator', 'comma') == 'dot') ? 'selected' : ''; ?>> <?php echo lang("Dot"); ?></option>
                      <option value="comma" <?php echo (get_option('currency_thousand_separator', 'comma') == 'comma') ? 'selected' : ''; ?>> <?php echo lang("Comma"); ?></option>
                      <option value="space" <?php echo (get_option('currency_thousand_separator', 'comma') == 'space') ? 'selected' : ''; ?>> <?php echo lang("Space"); ?></option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label><?php echo lang("decimal_separator"); ?></label>
                    <select  name="currency_decimal_separator" class="form-control square">
                      <option value="dot" <?php echo (get_option('currency_decimal_separator', 'dot') == 'dot') ? 'selected' : ''; ?>> <?php echo lang("Dot"); ?></option>
                      <option value="comma" <?php echo (get_option('currency_decimal_separator', 'dot') == 'comma') ? 'selected' : ''; ?>> <?php echo lang("Comma"); ?></option>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label><?php echo lang("currency_decimal_places"); ?></label>
                    <select  name="currency_decimal" class="form-control square">
                      <option value="0" <?php echo (get_option('currency_decimal', 2) == 0) ? 'selected' : ''; ?>> 0</option>
                      <option value="1" <?php echo (get_option('currency_decimal', 2) == 1) ? 'selected' : ''; ?>> 0.0</option>
                      <option value="2" <?php echo (get_option('currency_decimal', 2) == 2) ? 'selected' : ''; ?>> 0.00</option>
                      <option value="3" <?php echo (get_option('currency_decimal', 2) == 3) ? 'selected' : ''; ?>> 0.000</option>
                      <option value="4" <?php echo (get_option('currency_decimal', 2) == 4) ? 'selected' : ''; ?>> 0.0000</option>
                    </select>
                  </div>
                </div>

              </div>
              
              <h5 class="text-info"><i class="fe fe-link"></i> <?php echo lang("auto_currency_converter"); ?></h5>

              <div class="row d-none">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="custom-switch">
                      <input type="hidden" name="is_auto_currency_convert" value="0">
                      <input type="checkbox" name="is_auto_currency_convert" class="custom-switch-input" <?php echo (get_option("is_auto_currency_convert", 0) == 1) ? "checked"  : "" ; ?> value="1">
                      <span class="custom-switch-indicator"></span>
                      <span class="custom-switch-description"><?php echo lang("Active"); ?></span>
                    </label>
                  </div>
                  <div class="form-group">
                    <label class="form-label"><?php echo lang("currency_rate"); ?>
                      <small><?php echo lang("applying_when_you_fetch_sync_all_services_from_smm_providers"); ?></small></span>
                    </label>
                    <div class="input-group">
                      <span class="input-group-prepend">
                        <span class="input-group-text"><?php echo lang("1_original_currency"); ?> =</span>
                      </span>
                      <input type="text" class="form-control text-right" name="new_currecry_rate" value="<?php echo get_option('new_currecry_rate', 1); ?>">
                      <span class="input-group-append">
                        <span class="input-group-text"><?php echo lang("new_currency"); ?></span>
                      </span>
                    </div>
                    <small class="text-muted"><span class="text-danger">*</span> <?php echo lang("if_you_dont_want_to_change_currency_rate_then_leave_this_currency_rate_field_to_1"); ?></small>
                  </div>
                </div>
              </div>
              
            </div> 
            <div class="col-md-8">
              <div class="form-footer">
                <button class="btn btn-primary btn-min-width btn-lg text-uppercase"><?php echo lang("Save"); ?></button>
              </div>
            </div>

          </div>
        </form>
      </div>
    </div>
