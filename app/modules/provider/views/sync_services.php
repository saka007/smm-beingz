
<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
          $ids = (!empty($api->ids))? $api->ids: '';
        ?>
        <form class="form actionSyncApiServices" action="<?php echo cn($module."/ajax_sync_services/$ids"); ?>" data-redirect="<?php echo cn($module); ?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fe fe-refresh-cw"></i> <?php echo lang("sync_services"); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <div class="form-body">
              <div class="row justify-content-md-center">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?php echo lang("api_provider_name"); ?></label>
                    <input type="text" class="form-control square" name="name" value="<?php if(!empty($api->name)) echo strip_tags($api->name); else echo ''; ?>" disabled>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?php echo lang("api_url"); ?></label>
                    <input type="text" class="form-control square" name="api_url" value="<?php if(!empty($api->url)) echo strip_tags($api->url); else echo ''; ?>" disabled>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?php echo lang("api_key"); ?></label>
                    <input type="text" class="form-control square" name="api_key" value="<?php if(!empty($api->key)) echo strip_tags($api->key); else echo ''; ?>" disabled>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?php echo lang("synchronous_request"); ?></label>
                    <select name="request" class="form-control square">
                      <option value="0"><?php echo lang("current_service"); ?> (Sync status with provider)</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?php echo lang("Submit"); ?></button>
            <button type="button" class="btn round btn-secondary btn-min-width mr-1 mb-1" data-dismiss="modal"><?php echo lang("Cancel"); ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
