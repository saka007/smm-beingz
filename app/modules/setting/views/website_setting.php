
    <div class="card content">
      <div class="card-header">
        <h3 class="card-title"><i class="fe fe-globe"></i> <?php echo lang("website_setting"); ?></h3>
      </div>
      <div class="card-body">
        <form class="actionForm" action="<?php echo cn("$module/ajax_general_settings"); ?>" method="POST" data-redirect="<?php echo get_current_url(); ?>">
          <div class="row">
            <div class="col-md-12 col-lg-12">
              <div class="form-group">
                <div class="form-label"><?php echo lang("Maintenance_mode"); ?></div>
                <label class="custom-switch">
                  <input type="hidden" name="is_maintenance_mode" value="0">
                  <input type="checkbox" name="is_maintenance_mode" class="custom-switch-input" <?php if(get_option("is_maintenance_mode", 0) == 1) echo "checked"; else echo ""; ?> value="1">
                  <span class="custom-switch-indicator"></span>
                  <span class="custom-switch-description"><?php echo lang("Active"); ?></span>
                </label>
                <br>
                <small class="text-danger"><strong><?php echo lang("note"); ?></strong> <?php echo lang("link_to_access_the_maintenance_mode"); ?></small> <br>
                <a href="<?php echo cn('maintenance/access'); ?>"><span class="text-link"><?php echo PATH; ?>maintenance/access</span></a>
              </div>
              
              <div class="form-group">
                <label class="form-label"><?php echo lang("website_name"); ?></label>
                <input class="form-control" name="website_name" value="<?php echo strip_tags(get_option('website_name', "SmartStore")); ?>">
              </div>  

              <div class="form-group">
                <label class="form-label"><?php echo lang("website_description"); ?></label>
                <textarea rows="8" name="website_desc" class="form-control"><?php echo strip_tags(get_option('website_desc', "SmartStore is the best option to get all social media services in website. Easy build Social Media Marketing Store with a unique design and business process automation")); ?>
                </textarea>
              </div>

              <div class="form-group">
                <label class="form-label"><?php echo lang("website_keywords"); ?></label>
                <textarea rows="8" name="website_keywords" class="form-control"><?php echo strip_tags(get_option('website_keywords', "SmartStore, smm reseller panel, smmpanel, panelsmm, create smm store, business smm, socialmedia, instagram reseller panel, create smm store, resell smm services, smm store, start smm business, cheap smm business, buy instagram followers, instagram likes, facebook followers, facebook likes, twitter likes, youtube views, soundclound")); ?>
                </textarea>
              </div>
              <div class="form-group">
                <label class="form-label"><?php echo lang("website_title"); ?></label>
                <input class="form-control" name="website_title" value="<?php echo get_option('website_title', "SmartStore - Social Media Marketing Store Script"); ?>">
              </div>
            </div>
            <div class="col-md-12">
              <div class="">
                <button class="btn btn-primary btn-min-width btn-lg text-uppercase"><?php echo lang("Save"); ?></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
