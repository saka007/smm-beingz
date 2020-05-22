
<?php
  if(!empty($blog->ids)) $ids = $blog->ids; else $ids = '' ;

  if ($ids != "") {
    $url = cn($module."/ajax_update/$ids");
  }else{
    $url = cn($module."/ajax_update");
  }
?>

<div class="row justify-content-md-center">
  <div class="col-md-10">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?php echo lang('editadd_article'); ?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        <form class="form actionForm" action="<?php echo strip_tags($url); ?>" data-redirect="<?php echo cn("$module/update/".$ids); ?>" method="POST">
          <div class="form-body">
            <div class="row">

              <div class="col-md-12">
                <div class="form-group">
                  <label for="projectinput5"><?php echo lang('article_title'); ?> <span class="form-required">*</span></label>
                  <input class="form-control square" name="title" type="text" value="<?php echo (!empty($blog->title)) ? strip_tags($blog->title) : '';?>">
                </div>
              </div>
              
              <?php 
                if (isset($blog->url_slug)) {
              ?>
              <div class="col-md-12">
                <div class="form-group">
                  <label>URL Slug <span class="form-required">*</span></label>
                  <div class="input-group">
                    <span class="input-group-prepend" id="basic-addon3">
                      <span class="input-group-text text-muted"><?php echo BASE; ?>blog/</span>
                    </span>
                    <input type="text" name="url_slug" class="form-control" value="<?php echo strip_tags($blog->url_slug); ?>">
                  </div>
                </div> 
              </div>
              <?php } ?>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="projectinput5"><?php echo lang('Image_thumbnail'); ?> <span class="form-required">(900 x 500px)*</span></label>
                  <div class="input-group">
                    <input type="text" name="image" class="form-control" value="<?php echo (!empty($blog->image)) ? strip_tags($blog->image) : ''; ?>">
                    <span class="input-group-append btn-elFinder">
                      <button class="btn btn-info" type="button">
                        <i class="fe fe-image">
                        </i>
                      </button>
                    </span>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label for="projectinput5"><?php echo lang('Post_Category'); ?> <span class="form-required">*</span></label>
                  <select name="category" class="form-control square">
                    <?php
                      foreach ($social_networks as $key => $social_network) {
                    ?>
                    <option value="<?php echo strip_tags($social_network->name); ?>" <?php echo (!empty($blog->category) && $blog->category == $social_network->name) ? 'selected' : ''; ?>><?php echo strip_tags($social_network->name); ?></option>
                    <?php } ?>
                    <option value="Other" <?php echo (!empty($blog->category) && $blog->category == 'Other') ? 'selected' : ''; ?>><?php echo lang('Other'); ?></option>

                  </select>
                </div>
              </div> 

              <div class="col-md-4">
                <div class="form-group">
                  <label><?php echo lang('Status'); ?> <span class="form-required">*</span></label>
                  <select name="status" class="form-control square">
                    <option value="1" <?php echo (!empty($blog->status) && $blog->status == 1) ? 'selected' : ''; ?>><?php echo lang('Active'); ?></option>
                    <option value="0" <?php echo (isset($blog->status) && $blog->status != 1) ? 'selected' : ''; ?>><?php echo lang('Deactive'); ?></option>
                  </select>
                </div>
              </div>
               
              <div class="col-md-4">
                <div class="form-group">
                  <label for="projectinput5"><?php echo lang('Sort'); ?> <span class="form-required">*</span></label>
                  <input class="form-control square" name="sort" type="number" value="<?php echo (!empty($blog->sort)) ? $blog->sort : ''; ?>">
                </div>
              </div>

              <div class="col-md-12">
                <h4 class="text-left"><i class="fe fe-link-2"></i> <?php echo lang('page_seo_informations'); ?></h4>
                <small class="text-danger"><?php echo lang('note_if_you_want_use_default_informations_in_settings_page_then_leave_these_informations_fields_empty'); ?></small>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label><?php echo lang('meta_keywords'); ?></label>
                  <textarea rows="3" class="form-control square" name="meta_keywords"><?php echo (!empty($blog->meta_keywords)) ? strip_tags($blog->meta_keywords) : ''; ?></textarea>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label><?php echo lang('meta_description'); ?></label>
                  <textarea rows="3" class="form-control square" name="meta_description"><?php echo (!empty($blog->meta_description)) ? strip_tags($blog->meta_description) : ''; ?></textarea>
                </div>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-group">
                  <label for="bloginput8"><?php echo lang('article_description'); ?> <span class="form-required">*</span></label>
                  <textarea id="editor" rows="2" class="form-control square" name="content" placeholder="Write conetnt in here"><?php echo (!empty($blog->content)) ? html_entity_decode($blog->content, ENT_QUOTES) : ''; ?></textarea>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12">
                <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1"><?php echo lang('Save'); ?></button>
              </div>
            </div>
          </div>
          <div class="">
          </div>
        </form>
      </div>
    </div>
  </div> 
</div>

<script>
  "use strict";
  $(document).ready(function() {
    plugin_editor('#editor', {append_plugins: 'image  media', height: 500});
    $(document).on('click','.btn-elFinder', function(){
      var _that = $(this);
      getPathMediaByelFinderBrowser(_that);
    });
  });
</script>
