<?php if (!empty($services)) {
?>
<table class="table table-hover table-bordered table-outline table-vcenter card-table">
  <thead>
    <tr>
      <?php
        if (get_role("admin")) {
      ?>
      <th class="text-center w-1">
        <label class="form-check">
          <input class="form-check-input  check-all" type="checkbox" data-name="chk_<?php echo strip_tags($cate_id); ?>">
          <span class="form-check-label"></span>
        </label>
      </th>
      <?php }?>
      <th class="text-center w-1">ID</th>
      <?php if (!empty($columns)) {
        foreach ($columns as $key => $row) {
      ?>
      <th><?php echo strip_tags($row); ?></th>
      <?php }}?>
      
      <?php
        if (get_role("admin") || get_role("supporter")) {
      ?>
      <th><?php echo lang("Action"); ?></th>
      <?php }?>
    </tr>
  </thead>
  <tbody>
    <?php if (!empty($services)) {
      $decimal_places = get_option('currency_decimal', 2);
      switch (get_option('currency_decimal_separator', 'dot')) {
        case 'dot':
          $decimalpoint = '.';
          break;
        case 'comma':
          $decimalpoint = ',';
          break;
        default:
          $decimalpoint = '';
          break;
      }

      switch (get_option('currency_thousand_separator', 'comma')) {
        case 'dot':
          $separator = '.';
          break;
        case 'comma':
          $separator = ',';
          break;
        case 'space':
          $separator = ' ';
          break;
        default:
          $separator = '';
          break;
      }

      $i = 0;
      foreach ($services as $key => $row) {
      $i++;
    ?>
    <tr class="tr_<?php echo strip_tags($row->ids); ?>">
      <?php
        if (get_role("admin")) {
      ?>
      <th class="text-center w-1">
        <label class="form-check">
          <input class="form-check-input  chk_<?php echo strip_tags($cate_id); ?>" type="checkbox" name="ids[]" value="<?php echo strip_tags($row->ids); ?>">
          <span class="form-check-label"></span>
        </label>
      </th>
      <?php }?>
      <td class="text-center text-muted"><?php echo strip_tags($row->id); ?></td>

      <td>
        <div class="title"><?php echo strip_tags($row->name); ?></div>
      </td> 

      <td class="w-8"><?php echo currency_format($row->price,$decimal_places, $decimalpoint, $separator); ?></td>
      <td class="w-8"><?php echo strip_tags($row->quantity); ?></td>

      <td class="text-muted w-8"><?php if(!empty($row->add_type) && $row->add_type == "api") echo lang("API"); else echo lang('Manual'); ?></td>
      <td class="text-muted w-8"><?php if(!empty($row->api_name)) echo truncate_string(strip_tags($row->api_name), 13); else echo ""; ?></td>
      <td class="text-muted w-8"><?php if(!empty($row->api_service_id)) echo strip_tags($row->api_service_id); else ""; ?></td>
      <td class="text-muted w-8">
        <?php echo currency_format($row->original_price, $decimal_places, $decimalpoint, $separator); ?>
      </td>

      <td class="text-muted w-8"><?php echo strip_tags($row->min); ?> / <?php echo strip_tags($row->max); ?></td>

      <?php
        if (get_role("admin") || get_role("supporter")) {
      ?>
      <td class="w-1" >
        <?php if(!empty($row->status) && $row->status == 1){?>
          <span class="badge badge-info"><?php echo lang("Active"); ?></span>
          <?php }else{?>
          <span class="badge badge-warning"><?php echo lang("Deactive"); ?></span>
        <?php }?>
      </td>  

      <td class="text-center w-10">
        <div class="btn-group">
          <a href="<?php echo cn($module."/update/".$row->ids); ?>" class="btn btn-icon btn-outline-primary ajaxModal" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("Edit"); ?>"><i class="fe fe-edit"></i></a>
          <a href="<?php echo cn("$module/ajax_delete_item/".$row->ids); ?>" class="btn btn-icon btn-outline-danger ajaxDeleteItem" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("Delete"); ?>"><i class="fe fe-trash-2"></i></a>
        </div>
      </td>
      <?php }?>

    </tr>
    <?php }}?>
    
  </tbody>
</table>
<?php } ?>
