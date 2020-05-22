
<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
          $ids = (!empty($api->ids))? $api->ids: '';
          if ($ids != "") {
            $url = cn($module."/ajax_update/$ids");
          }else{
            $url = cn($module."/ajax_update");
          }
        ?>
        <form class="form actionForm" action="<?php echo strip_tags($url); ?>" data-redirect="<?php echo cn($module); ?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fa fa-edit"></i> <?php echo lang("edit_api"); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <div class="form-body">
              <div class="row justify-content-md-center">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <small class="text-danger"><?php echo lang("add_edit_provider_note"); ?></small>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?php echo lang("Name"); ?></label>
                    <input type="text" class="form-control square" name="name" value="<?php if(!empty($api->name)) echo strip_tags($api->name); else echo ''; ?>">
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label >URL</label>
                    <input type="text" class="form-control square" name="api_url" value="<?php if(!empty($api->url)) echo strip_tags($api->url); else echo ''; ?>">
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?php echo lang("api_key"); ?></label>
                    <input type="text" class="form-control square" name="api_key" value="<?php if(!empty($api->key)) echo strip_tags($api->key); else echo ''; ?>">
                  </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?php echo lang("Status"); ?></label>
                    <select name="status" class="form-control square">
                      <option value="1" <?php echo (!empty($api->status) && $api->status == 1)? 'selected': ''?>><?php echo lang("Active"); ?></option>
                      <option value="0" <?php echo (isset($api->status) && $api->status != 1)? 'selected': ''?>><?php echo lang("Deactive"); ?></option>
                    </select>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?php echo lang("Description"); ?></label>
                    <textarea rows="3" id="editor" class="form-control square" name="description"><?php echo (!empty($api->description))? html_entity_decode($api->description, ENT_QUOTES) : ''?></textarea>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?php echo lang("Submit"); ?></button>
            <button type="button" class="btn round btn-default btn-min-width mr-1 mb-1" data-dismiss="modal"><?php echo lang("Cancel"); ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo BASE; ?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
  CKEDITOR.replace( 'editor', {
    height: 100
  });
</script>