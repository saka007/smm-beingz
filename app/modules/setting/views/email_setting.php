
    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-mail"></i> <?php echo lang("email_setting"); ?></h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?php echo cn("$module/ajax_general_settings"); ?>" method="POST" data-redirect="<?php echo get_current_url(); ?>">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="form-group">

                <div class="form-label"><?php echo lang("email_notifications"); ?></div>

                <div class="custom-controls-stacked">
                  <label class="custom-switch">
                    <input type="hidden" name="enable_new_order_notification_send_to_customer" value="0">
                    <input type="checkbox" name="enable_new_order_notification_send_to_customer" class="custom-switch-input" <?php if(get_option("enable_new_order_notification_send_to_customer", 0) == 1) echo "checked"; else echo ""; ?> value="1">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description"><?php echo lang('new_order_notifications_send_to_customer'); ?></span>
                  </label>
                </div>   

                <div class="custom-controls-stacked">
                  <label class="custom-switch">
                    <input type="hidden" name="enable_new_order_notification_send_to_admin" value="0">
                    <input type="checkbox" name="enable_new_order_notification_send_to_admin" class="custom-switch-input" <?php if(get_option("enable_new_order_notification_send_to_admin", 0) == 1) echo "checked"; else echo ""; ?> value="1">
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description"><?php echo lang('new_order_notifications_send_to_admin'); ?></span>
                  </label>
                </div>     
              </div>

              <div class="form-group">
                <label class="form-label"><?php echo lang("From"); ?></label>
                <input class="form-control" name="email_from" value="<?php echo get_option('email_from',""); ?>">
              </div>  

              <div class="form-group">
                <label class="form-label"><?php echo lang('From_name'); ?></label>
                <input class="form-control" name="email_name" value="<?php echo get_option('email_name',""); ?>">
              </div>
              
              <div class="form-group">
                <div class="form-label"><?php echo lang("email_protocol"); ?></div>
                <div class="custom-switches-stacked">
                  <label class="custom-switch">
                    <input type="radio" name="email_protocol_type" class="custom-switch-input" value="php_mail" <?php if(get_option('email_protocol_type',"php_mail") == 'php_mail') echo "checked"; else echo ''; ?>>
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description"><?php echo lang("php_mail_function"); ?></span>
                  </label>
                  <label class="custom-switch">
                    <input type="radio" name="email_protocol_type" value="smtp" class="custom-switch-input" <?php if(get_option('email_protocol_type',"php_mail") == 'smtp') echo "checked"; else echo ''; ?>> 
                    <span class="custom-switch-indicator"></span>
                    <span class="custom-switch-description"><?php echo lang("SMTP"); ?> <small><?php echo lang("recommended"); ?></small></span>
                  </label>
                  <small><strong><?php echo lang("note"); ?></strong> <?php echo lang("sometime_email_is_going_into__recipients_spam_folders_if_php_mail_function_is_enabled"); ?></small>
                </div>
              </div>  

              <div class="row smtp-configure <?php if(get_option('email_protocol_type',"") == 'smtp') echo ""; else echo 'd-none'; ?>">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="form-label"><?php echo lang("smtp_server"); ?></label>
                    <input class="form-control" name="smtp_server" value="<?php echo get_option('smtp_server',""); ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?php echo lang("smtp_port"); ?> <small>(25, 465, 587, 2525)</small></label>
                    <input class="form-control" name="smtp_port" value="<?php echo get_option('smtp_port',""); ?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?php echo lang("smtp_encryption"); ?></label>
                    <select  name="smtp_encryption" class="form-control square">
                      <option value="none" <?php if(get_option('smtp_encryption',"") == 'none') echo "selected"; else echo '';?>>None</option>
                      <option value="ssl" <?php if(get_option('smtp_encryption',"") == 'ssl') echo "selected"; else echo '';?> >SSL</option>
                      <option value="tls" <?php if(get_option('smtp_encryption',"") == 'tls') echo "selected"; else echo '';?> >TLS</option>
                  </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?php echo lang("smtp_username"); ?></label>
                    <input class="form-control" name="smtp_username" value="<?php echo get_option('smtp_username',""); ?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label"><?php echo lang("smtp_password"); ?></label>
                    <input class="form-control" name="smtp_password" value="<?php echo get_option('smtp_password',""); ?>">
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
