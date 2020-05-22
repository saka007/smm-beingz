<label><?php echo lang('list_of_api_services'); ?></label>
<select name="api_service_id" class="form-control square ajaxGetServiceDetail">
  <?php
    if (!empty($services)) {
      foreach ($services as $key => $row) {
  ?>
    <option value="<?php echo strip_tags($row->service); ?>" isred='1' data-rate="<?php echo strip_tags($row->rate); ?>" data-min="<?php echo strip_tags($row->min); ?>" data-max="<?php echo strip_tags($row->max); ?>" data-name="<?php echo strip_tags($row->name); ?>" data-type="<?php if(isset($row->type)) echo strtolower(strip_tags($row->type)); else echo 'default'; ?>"  <?php if(isset($api_service_id) && $api_service_id == $row->service) echo 'selected'; else echo ''; ?> > <?php echo strip_tags($row->service).' - '.truncate_string(strip_tags($row->name), 60); ?></option>
  <?php }} ?>
</select>

