<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <?php
          $ids = (!empty($category->ids))? $category->ids: '';
          if ($ids != "") {
            $url = cn($module."/ajax_update/$ids");
          }else{
            $url = cn($module."/ajax_update");
          }
        ?>
        <form class="form actionForm" action="<?php echo strip_tags($url); ?>" data-redirect="<?php echo cn($module); ?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fa fa-edit"></i> <?php echo lang("Edit"); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <div class="form-body">
              <div class="row justify-content-md-center">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?php echo lang('Name'); ?></label>
                    <input type="text" class="form-control square"  name="name" value="<?php echo (!empty($category->name)) ? $category->name : '' ?>">
                  </div>
                </div> 
                
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label for="eventRegInput1"><?php echo lang("Default_sorting_number"); ?></label>
                    <input type="number" class="form-control square" name="sort"  value="<?php echo (!empty($category->sort)) ? $category->sort : ''; ?>">
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?php echo lang("Status"); ?></label>
                    <select name="status" class="form-control square">
                      <option value="1" <?php echo (!empty($category->status) && $category->status == 1) ? 'selected' : '' ?>><?php echo lang("Active"); ?></option>
                      <option value="0" <?php echo (isset($category->status) && $category->status != 1) ? 'selected': ''?>><?php echo lang("Deactive"); ?></option>
                    </select>
                  </div>
                </div> 

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?php echo lang("Description"); ?></label>
                    <textarea rows="3" id="editor" class="form-control square" name="desc" placeholder="About Project"><?php echo (!empty($category->desc)) ? html_entity_decode($category->desc, ENT_QUOTES) : ''; ?></textarea>
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
