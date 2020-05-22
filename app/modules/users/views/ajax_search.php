<?php if(!empty($users)){ ?>
<div class="col-md-12 col-xl-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?php echo lang('Lists'); ?></h3>
      <div class="card-options">
        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-hover table-bordered table-vcenter card-table">
        <thead>
          <tr>
            <th class="text-center w-1"><?php echo lang("No_"); ?></th>
            <?php if (!empty($columns)) {
              foreach ($columns as $key => $row) {
            ?>
            <th><?php echo strip_tags($row); ?></th>
            <?php }}?>
            
            <?php
              if (!get_role("user")) {
            ?>
            <th><?php echo lang('Action'); ?></th>
            <?php }?>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($users)) {
            $i = 0;
            $currency_symbol = get_option('currency_symbol', '$');
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
              
            foreach ($users as $key => $row) {
            $i++;
          ?>
          <tr class="tr_<?php echo strip_tags($row->ids); ?>">
            <td><?php echo strip_tags($i); ?></td>
            <td>
              <div class="title"><h6><?php echo strip_tags($row->email); ?></h6></div>
            </td>
            <td><?php echo strip_tags($row->total_orders)?></td>
            <td>
              <?php echo (!empty($row->total_spent)) ? $currency_symbol." ".currency_format($row->total_spent, get_option('currency_decimal', 2), $decimalpoint, $separator) : 0?>
            </td>
            <td class="text-muted"><?php echo strip_tags($row->history_ip)?></td>
            <td class="text-muted"><?php html_entity_decode($row->description, ENT_QUOTES); ?></td>
            <td><?php echo convert_timezone($row->changed, 'user'); ?></td>
            <td class="text-muted"><?php echo convert_timezone($row->created, 'user'); ?></td>
            <td class="text-center">
              <div class="btn-group">
                <a href="<?php echo cn($module."/update/".$row->ids); ?>" class="btn btn-icon btn-azure ajaxModal" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("Add_Note"); ?>"><i class="fe fe-edit"></i></a>
                <a href="<?php echo cn($module."/mail/".$row->ids); ?>" class="btn btn-icon btn-info ajaxModal" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("send_mail"); ?>"><i class="fe fe-mail"></i></a>
                <a href="<?php echo cn("$module/ajax_delete_item/".$row->ids); ?>" class="btn btn-icon btn-danger ajaxDeleteItem" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("Delete"); ?>"><i class="fe fe-trash-2"></i></a>
              </div>
            </td>
          </tr>
          <?php }}?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php }else{?>
  <?php echo Modules::run("blocks/empty_data"); ?>
<?php } ?>