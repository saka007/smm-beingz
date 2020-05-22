<div id="main-modal-content">
  <div class="modal-right">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <form class="form actionForm" action="<?php echo cn($module."/ajax_send_email"); ?>" data-redirect="<?php echo cn($module); ?>" method="POST">
          <div class="modal-header bg-pantone">
            <h4 class="modal-title"><i class="fe fe-edit"></i> <?php echo lang('send_mail'); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body">
            <div class="form-body">
              <div class="row justify-content-md-center">
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?php echo lang('To'); ?></label>
                    <input type="text" class="form-control square" name="email_to" value="<?php echo (!empty($user->email) && $user->email != "") ? $user->email : ''?>">
                  </div>
                </div>     

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?php echo lang('Subject'); ?></label>
                    <input type="text" class="form-control square" name="subject">
                  </div>
                </div>  

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?php echo lang('Message'); ?></label>
                    <textarea rows="3" id="editor" class="form-control square" name="email_content"></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?php echo lang('Submit'); ?></button>
            <button type="button" class="btn round btn-default btn-min-width mr-1 mb-1" data-dismiss="modal"><?php echo lang('Cancel'); ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo BASE; ?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
  CKEDITOR.replace( 'editor', {
    height: 150
  });
</script>