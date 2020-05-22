    
    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-check"></i> <?php echo lang("default_setting"); ?></h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?php echo cn("$module/ajax_general_settings"); ?>" method="POST" data-redirect="<?php echo get_current_url(); ?>">
          <div class="row">

            <div class="col-md-12 col-lg-12">

              <h5 class="text-info"><i class="fe fe-link"></i> <?php echo lang('disable_home_page_langding_page'); ?></h5>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="custom-switch">
                      <input type="hidden" name="enable_disable_homepage" value="0">
                      <input type="checkbox" name="enable_disable_homepage" class="custom-switch-input" <?php echo (get_option("enable_disable_homepage", 0) == 1) ? "checked" : ""?> value="1">
                      <span class="custom-switch-indicator"></span>
                      <span class="custom-switch-description"><?php echo lang("Active"); ?></span>
                    </label>
                  </div> 
                </div>
              </div>

              <h5 class="text-info"><i class="fe fe-link"></i> <?php echo lang('Default_Homepage'); ?></h5>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <select  name="default_home_page" class="form-control square">
                      <option value="regular" <?php echo (get_option('default_home_page', 'pergo') == 'regular')? 'selected': ''?>> Regular</option>
                      <option value="pergo" <?php echo (get_option('default_home_page', 'pergo') == 'pergo')? 'selected': ''?>> Pergo</option>
                    </select>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  <h5 class="text-info"><i class="fe fe-link"></i> <?php echo lang("Pagination"); ?></h5>
                  <div class="form-group">
                    <label><?php echo lang("limit_the_maximum_number_of_rows_per_page"); ?></label>
                    <select name="default_limit_per_page" class="form-control square">
                      <?php
                        for ($i = 1; $i <= 100; $i++) {
                          if ($i%5 == 0) {
                      ?>
                      <option value="<?php echo strip_tags($i); ?>" <?php echo (get_option("default_limit_per_page", 10) == $i)? "selected" : ''?>><?php echo strip_tags($i); ?></option>
                      <?php }} ?>
                    </select>
                  </div>
                </div> 
              </div> 
              
              <h5 class="text-info"><i class="fe fe-link"></i> <?php echo lang("notification_popup_at_home_page"); ?></h5>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="custom-switch">
                      <input type="hidden" name="enable_notification_popup" value="0">
                      <input type="checkbox" name="enable_notification_popup" class="custom-switch-input" <?php echo (get_option("enable_notification_popup", 0) == 1) ? "checked" : ""?> value="1">
                      <span class="custom-switch-indicator"></span>
                      <span class="custom-switch-description"><?php echo lang("Active"); ?></span>
                    </label>
                  </div> 
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                  <label class="form-label"><?php echo lang("Content"); ?></label>
                  <?php
                    $notification_popup_content = get_option('notification_popup_content', "<p><strong>Lorem Ipsum</strong></p><p>Lorem ipsum dolor sit amet, in eam consetetur consectetuer. Vivendo eleifend postulant ut mei, vero maiestatis cu nam. Qui et facer mandamus, nullam regione lucilius eu has. Mei an vidisse facilis posidonium, eros minim deserunt per ne.</p><p>Duo quando tibique intellegam at. Nec error mucius in, ius in error legendos reformidans. Vidisse dolorum vulputate cu ius. Ei qui stet error consulatu.</p><p>Mei habeo prompta te. Ignota commodo nam ei. Te iudico definitionem sed, placerat oporteat tincidunt eu per, stet clita meliore usu ne. Facer debitis ponderum per no, agam corpora recteque at mel.</p>");
                  ?>
                  <textarea rows="3" name="notification_popup_content" class="form-control textarea-editor">
                    <?php echo html_entity_decode($notification_popup_content, ENT_QUOTES); ?>
                  </textarea>
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


    <script>
      $(document).ready(function() {
        plugin_editor('.textarea-editor', {height: 500});
      });
    </script>