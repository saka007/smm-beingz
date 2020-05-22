<?php
  $ids = (!empty($lang->ids))? $lang->ids: '';
  if ($ids != "") {
    $url = cn($module."/ajax_update/$ids");
  }else{
    $url = cn($module."/ajax_update");
  }
?>

<div class="row">
  <div class="col-md-12">
    <form class="form actionForm" action="<?php echo strip_tags($url); ?>" data-redirect="<?php echo cn("$module"); ?>" method="POST">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo lang("Language"); ?></h3>
                <div class="card-options">
                  <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                  <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="form-body">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=""><?php echo lang("language_code"); ?></label>
                          <select name="language_code" class="form-control">
                            <option value="0"><?php echo lang("choose_a_language_code"); ?></option>
                            <?php 
                              $data_languageCodes = language_codes();
                              if (is_array($data_languageCodes)) {
                                foreach ($data_languageCodes as $key => $value) {
                            ?>
                            <option value="<?php echo strip_tags($key)?>" <?php if(isset($lang->code)&&$lang->code == $key) echo 'Selected'; else echo '';?>><?php echo strip_tags($key)?> - <?php echo strip_tags($value); ?></option>
                            <?php }} ?>
                          </select>
                        </div>
                      </div>
                        
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=""><?php echo lang("Location"); ?></label>
                          <input type="hidden" name="ids" value="<?php if(isset($lang->ids)) echo strip_tags($lang->ids); else echo ""; ?>">
                          <select name="country_code" class="form-control">
                            <option value="0"><?php echo lang("choose_your_country"); ?></option>
                            <?php 
                              $data_countryCodes = country_codes();
                              if (is_array($data_countryCodes)) {
                                foreach ($data_countryCodes as $key => $value) {
                            ?>
                            <option value="<?php echo strip_tags($key)?>" <?php if(isset($lang->country_code)&&$lang->country_code == $key) echo 'Selected'; else echo ''; ?>> <?php echo strip_tags($value)?></option>
                            <?php }} ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=""><?php echo lang("Status"); ?></label>
                          <select name="status" class="form-control">
                            <option value="1" <?php if(isset($lang->status)&&$lang->status==1) echo 'Selected'; else echo '';?>><?php echo lang("Active"); ?></option>
                            <option value="0" <?php if(isset($lang->status)&&$lang->status==0) echo 'Selected'; else echo '';?>><?php echo lang("Deactive"); ?></option>
                          </select>
                        </div>
                      </div>   

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class=""><?php echo lang("Default"); ?></label>
                          <select name="default" class="form-control">
                            <option value="0" <?php if(isset($lang->is_default)&&$lang->is_default==0) echo 'Selected'; else echo '';?>><?php echo lang("No"); ?></option>
                            <option value="1" <?php if(isset($lang->is_default)&&$lang->is_default==1) echo 'Selected'; else echo '';?>><?php echo lang("Yes"); ?></option>
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="title">
                                <h3 class="card-title mb-3"><?php echo lang("translation_editor"); ?></h3>
                            </div>
                            <table class="table table-hover table-bordered table-vcenter text-nowrap card-table">
                                <thead>
                                  <tr>
                                    <th class="table-plus datatable-nosort"><?php echo lang("Key"); ?></th>
                                    <th class="datatable-nosort"><?php echo lang("Value"); ?></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                    if(!empty($default_lang)){
                                      foreach ($default_lang as $key => $row) {
                                  ?>
                                  <tr>
                                    <td class="table-plus w-40">
                                      <?php echo (strlen($row->slug) >= 20) ? truncate_string(strip_tags($row->slug), 20) : $row->slug; ?></td>
                                    <td class="w-60">
                                      <?php if(strlen($row->value) >= 64){?>
                                      <div class="form-group">
                                        <textarea class="form-control" name='lang[<?php echo strip_tags($row->slug)?>]' row="3" ><?php echo (isset($lang_db[$row->slug])) ? strip_tags($lang_db[$row->slug], '') : $row->value;?>
                                        </textarea>
                                      </div>
                                      <?php }else{?>
                                        <div class="form-group">
                                          <input class="form-control" type="text" name='lang[<?php echo strip_tags($row->slug); ?>]' value="<?php echo (isset($lang_db[$row->slug])) ? $lang_db[$row->slug] : $row->value;?>">
                                        </div>
                                      <?php }?>
                                    </td>
                                  </tr>
                                  <?php }} ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 m-t-20">
                            <button type="submit" class="btn btn-primary btn-min-width mr-1 mb-1"><?php echo lang("Save"); ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
  </div> 
</div>
  
