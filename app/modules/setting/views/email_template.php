
    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-edit"></i> <?php echo lang("email_template"); ?></h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?php echo cn("$module/ajax_general_settings"); ?>" method="POST" data-redirect="<?php echo get_current_url(); ?>">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <h5 class="text-info">1. <?php echo lang('new_order_notifications_send_to_customer'); ?></h5 class="text-info">
              <div class="form-group">
                <label class="form-label"><?php echo lang("Subject"); ?></label>
                <input class="form-control" name="new_order_notification_send_to_customer_subject" value="<?php echo get_option('new_order_notification_send_to_customer_subject', getEmailTemplate("new_order_notification_send_to_customer")->subject); ?>">
              </div>    
              <div class="form-group">
                <label class="form-label"><?php echo lang("Content"); ?></label>
                <textarea rows="3" name="new_order_notification_send_to_customer_content"class="form-control textarea_editor"><?php echo get_option('new_order_notification_send_to_customer_content', getEmailTemplate("new_order_notification_send_to_customer")->content); ?>
                </textarea>
              </div>
              <div class="form-group">
                <div class="small">
                  <strong><?php echo lang("note"); ?></strong> <?php echo lang('available_merge_fields'); ?><br>
                  <ul>
                    <li><span class="text-blue">{{customer_email}}</span> - <?php echo lang('customer_email'); ?></li>
                    <li><span class="text-blue">{{order_id}}</span> - <?php echo lang('OrderID'); ?></li>
                    <li><span class="text-blue">{{package_name}}</span> - <?php echo lang('Package_name'); ?></li>
                    <li><span class="text-blue">{{amount}}</span> - <?php echo lang('Amount'); ?></li>
                    <li><span class="text-blue">{{website_name}}</span> - <?php echo lang('website_name'); ?></li>
                  </ul>
                </div>
              </div>

              <h5 class="text-info">2. <?php echo lang('new_order_notifications_send_to_admin'); ?></h5 class="text-info">
              <div class="form-group">
                <label class="form-label"><?php echo lang("Subject"); ?></label>
                <input class="form-control" name="new_order_notification_send_to_admin_subject" value="<?php echo get_option('new_order_notification_send_to_admin_subject', getEmailTemplate("new_order_notification_send_to_admin")->subject); ?>">
              </div>    
              <div class="form-group">
                <label class="form-label"><?php echo lang("Content"); ?></label>
                <textarea rows="3" name="new_order_notification_send_to_admin_content" class="form-control textarea_editor"><?php echo get_option('new_order_notification_send_to_admin_content', getEmailTemplate("new_order_notification_send_to_admin")->content); ?>
                </textarea>
              </div>
              <div class="form-group">
                <div class="small">
                  <strong><?php echo lang("note"); ?></strong> <?php echo lang('available_merge_fields'); ?><br>
                  <ul>
                    <li><span class="text-blue">{{customer_email}}</span> - <?php echo lang('customer_email'); ?></li>
                    <li><span class="text-blue">{{order_id}}</span> - <?php echo lang('OrderID'); ?></li>
                    <li><span class="text-blue">{{package_name}}</span> - <?php echo lang('Package_name'); ?></li>
                    <li><span class="text-blue">{{amount}}</span> - <?php echo lang('Amount'); ?></li>
                  </ul>
                </div>
              </div>

            </div>

            <div class="col-md-12">
              <div class="form-footer">
                <button class="btn btn-primary btn-min-width btn-lg text-uppercase"><?php echo lang("Save"); ?></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script>
      $(document).ready(function() {
        plugin_editor('.textarea_editor', {height: 200});
      });
    </script>