    <div class="sidebar">
        <div class="item mt-2">
          <div class="title"><?php echo lang("general_settings"); ?></div>
          <ul class="list-unstyled list-group list-group-transparent mb-0">
            <li><a href="<?php echo cn($module."/website_setting"); ?>" class="list-group-item list-group-item-action <?php echo (segment(2) == 'website_setting') ? 'active' : ''?>"><?php echo lang("website_setting"); ?></a></li>

            <li><a href="<?php echo cn($module."/website_logo"); ?>" class="list-group-item list-group-item-action <?php echo (segment(2) == 'website_logo') ? 'active' : ''?>"><?php echo lang("Logo"); ?></a></li>

            <li><a href="<?php echo cn($module."/terms_policy"); ?>" class="list-group-item list-group-item-action <?php echo (segment(2) == 'terms_policy') ? 'active' : ''?>"><?php echo lang("terms__policy_page"); ?></a></li>

            <li><a href="<?php echo cn($module."/default_setting"); ?>" class="list-group-item list-group-item-action <?php echo (segment(2) == 'default_setting') ? 'active' : ''?>"><?php echo lang("default_setting"); ?></a></li>
            
            <li><a href="<?php echo cn($module."/currency"); ?>" class="list-group-item list-group-item-action <?php echo (segment(2) == 'currency') ? 'active' : ''?>"><?php echo lang("currency_setting"); ?></a></li>

            <li><a href="<?php echo cn($module."/other"); ?>" class="list-group-item list-group-item-action <?php echo (segment(2) == 'other') ? 'active' : ''?>"><?php echo lang("Other"); ?></a></li>

          </ul>
        </div>

        <div class="item mt-2">
          <div class="title"><?php echo lang("Email"); ?></div>
          <ul class="list-unstyled list-group list-group-transparent mb-0">
            <li><a href="<?php echo cn($module."/email_setting"); ?>" class="list-group-item list-group-item-action <?php echo (segment(2) == 'email_setting') ? 'active' : ''?>"><?php echo lang("email_setting"); ?></a></li>
            <li><a href="<?php echo cn($module."/email_template"); ?>"  class="list-group-item list-group-item-action <?php echo (segment(2) == 'email_template') ? 'active' : ''?>"><?php echo lang("email_template"); ?></a></li>
          </ul>
        </div>

        <div class="item mt-2">
          <div class="title"><?php echo lang("integrations"); ?></div>
          <ul class="list-unstyled list-group list-group-transparent mb-0">

            <li><a href="<?php echo cn($module."/payment"); ?>" class="list-group-item list-group-item-action <?php echo (segment(2) == 'payment') ? 'active' : ''?>"><?php echo lang("Payment"); ?></a></li>

            <?php
              $payments_method = get_payments_method();
              if (!empty($payments_method) && is_array($payments_method)) {
                foreach ($payments_method as $payment) {
                  if (payment_method_exists($payment)) {
            ?>
            <li><a href="<?php echo cn($module."/".$payment); ?>" class="list-group-item list-group-item-action text-capitalize  <?php echo (segment(2) == $payment) ? 'active' : ''?>"><?php echo strip_tags($payment)?></a></li>
            <?php }}} ?>

          </ul>
        </div>
    </div>