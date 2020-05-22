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
            <h4 class="modal-title"><i class="fa fa-edit"></i> <?php echo lang("edit_category"); ?></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            </button>
          </div>
          <div class="modal-body" id="edit_category">
            <div class="form-body">
              <div class="row justify-content-md-center">

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?php echo lang('Name'); ?></label>
                    <input type="text" class="form-control square"  name="name" value="<?php echo (!empty($category->name)) ? strip_tags($category->name) : ''; ?>" placeholder="Instagram Followers (Must be be greater than 2 words)">
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label ><?php echo lang("name_of_required_field"); ?></label>
                    <input type="text" class="form-control square"  name="required_field" value="<?php echo (!empty($category->required_field))? strip_tags($category->required_field) : 'link'?>">
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label><?php echo lang("social_network_service"); ?></label>
                    <select  name="social_network" class="form-control square">
                      <?php if(!empty($social_networks)){
                        foreach ($social_networks as $key => $social_network) {
                      ?>
                      <option value="<?php echo strip_tags($social_network->id); ?>" <?php if(!empty($category->ids) && $social_network->id == $category->sncate_id) echo 'selected'; echo ''; ?> ><?php echo strip_tags($social_network->name); ?></option>
                     <?php }}?>
                    </select>
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label for="eventRegInput1"><?php echo lang("Default_sorting_number"); ?></label>
                    <input type="number" class="form-control square" name="sort"  value="<?php if(!empty($category->sort)) echo strip_tags($category->sort); echo ''; ?>">
                  </div>
                </div>

                <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label><?php echo lang("Status"); ?></label>
                    <select name="status" class="form-control square">
                      <option value="1" <?php echo (!empty($category->status) && $category->status == 1) ? 'selected' : ''?>><?php echo lang("Active"); ?></option>
                      <option value="0" <?php echo (isset($category->status) && $category->status != 1) ? 'selected' : ''?>><?php echo lang("Deactive"); ?></option>
                    </select>
                  </div>
                </div> 

                <div class="col-md-12">
                  <h4 class="text-left"><i class="fe fe-link-2"></i> Page SEO informations</h4>
                </div>
                
                <?php
                  $url_slug = '';
                  if (!empty($category->url_slug)) {
                    $url_slug = $category->url_slug;
                  }
                ?>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>URL Slug</label>
                    <div class="input-group">
                      <span class="input-group-prepend" id="basic-addon3">
                        <span class="input-group-text text-muted"><?php echo BASE; ?></span>
                      </span>
                      <input type="text" name="url_slug" class="form-control" value="<?php echo strip_tags($url_slug); ?>" placeholder="buy-instagram-followers">
                    </div>
                    <small class="text-info">Ex: buy-instagram-followers, facebook-likes-buy etc</small>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label>Page Title</label>
                    <input  class="form-control square" type="text" name="page_title" value="<?php echo (!empty($category->page_title)) ? strip_tags($category->page_title) : ''; ?>">
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label>Meta Keywords</label>
                    <textarea rows="3" class="form-control square" name="meta_keywords"><?php echo (!empty($category->meta_keywords)) ? strip_tags($category->meta_keywords) : ''; ?></textarea>
                  </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label>Meta description</label>
                    <textarea rows="3" class="form-control square" name="meta_description"><?php echo (!empty($category->meta_description)) ? strip_tags($category->meta_description) : ''; ?></textarea>
                  </div>
                </div>
                
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="form-group">
                    <label>Page description</label>
                    <textarea id="editor" rows="2" class="form-control square" name="page_description" placeholder="Write conetnt in here"><?php echo (!empty($category->page_description)) ? html_entity_decode($category->page_description, ENT_QUOTES) : ''; ?></textarea>
                    <!--<textarea rows="20" class="form-control square" name="page_description"><?php // echo (!empty($category->page_description)) ? strip_tags($category->page_description) : ''; ?></textarea>-->
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

<script>

  //Convert to Url Slug
  $(document).on("keyup","input[type=text][name=name]", function(){
    _that  = $(this);
    _value = _that.val();
    _value = convertToSlug(_value);
    $("#edit_category input[name=url_slug]").val(_value);  
  });

  function convertToSlug(Text) {
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
  }

</script>

<script>
  "use strict";
  $(document).ready(function() {
    plugin_editor('#editor', {append_plugins: 'image  media', height: 500});
  });
</script>