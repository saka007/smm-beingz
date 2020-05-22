  <?php if(!empty($order_logs)){
  ?>
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?php echo lang("Lists"); ?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered table-vcenter card-table">
          <thead>
            <tr>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?php echo strip_tags($row); ?></th>
              <?php }}?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($order_logs)) {
              $currency_symbol = get_option("currency_symbol", "$");
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
              foreach ($order_logs as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?php echo strip_tags($row->ids); ?>">
              <td class="text-center"><?php echo strip_tags($row->id); ?></td>

              <?php
                if (get_role("admin") || get_role("supporter")) {
              ?>
              <td class="text-center"><?php echo ($row->api_order_id == 0 || $row->api_order_id ==-1)? "" : $row->api_order_id?></td>
              <td><?php echo strip_tags($row->user_email); ?></td>
              <?php } ?>
              <td>
                <div class="title">
                  <h6><?php echo strip_tags($row->service_id." - ".$row->service_name)?></h6>
                </div>
                <div>
                  <small>
                    <ul>
                      <?php
                        if (get_role("admin")) {
                      ?>
                      <li><?php echo lang("Type"); ?>: <?php echo (!empty($row->api_service_id) && $row->api_service_id != "") ? lang("API")." (".strip_tags($row->api_name).")" : lang("Manual"); ?></li>
                      <?php }?>
                      <li><?php echo lang("Link"); ?>: <a href="<?php echo strip_tags($row->link); ?>" target="_blank"><?php echo truncate_string(strip_tags($row->link), 60); ?></a></li>
                      <li><?php echo lang("Quantity"); ?>: <?php echo strip_tags($row->quantity); ?></li>
                      <li><?php echo lang("Amount"); ?>: <?php echo $currency_symbol.currency_format($row->charge, $decimal_places, $decimalpoint, $separator); ?></li>
                      <li><?php echo lang("Start_counter"); ?>: <?php echo (!empty($row->start_counter)) ? $row->start_counter : ""; ?></li>
                      <li><?php echo lang("Remains"); ?>: <?php echo (!empty($row->remains)) ? $row->remains : ""; ?></li>
                    </ul>
                  </small>
                </div>
              </td>
              <td><?php echo convert_timezone($row->created, "user"); ?></td>
              <td>
                <?php
                  if ($row->status == "pending" || $row->status == "processing") {
                    $btn_background = "btn-info";
                  }elseif ($row->status == "inprogress") {
                    $btn_background = "btn-orange";
                  }elseif($row->status == "completed"){
                    $btn_background = "btn-blue";
                  }elseif($row->status == "awaiting"){
                    $btn_background = "btn-lime";
                  }else{
                    $btn_background = "btn-danger";
                  }
                ?>
                <span class="btn round btn-sm <?php echo strip_tags($btn_background) ;?>"><?php echo order_status_title($row->status); ?></span>
              </td>

              <?php
                if (get_role("admin") || get_role("supporter")) {
              ?>
              <td class="text-red"><?php echo (empty($row->note))? "" : strip_tags($row->note)?></td>
              <td class="text-center">
                <div class="btn-group">
                  <a href="<?php echo cn($module."/log_update/".$row->ids); ?>" class="btn btn-icon btn-outline-primary ajaxModal" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("Edit"); ?>"><i class="fe fe-edit"></i></a>
                  <a href="<?php echo cn("$module/ajax_log_delete_item/".$row->ids); ?>" class="btn btn-icon btn-outline-danger ajaxDeleteItem" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("Delete"); ?>"><i class="fe fe-trash-2"></i></a>
                </div>
              </td>
              <?php }?>

            </tr>  
            <?php }}?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php }else{
    Modules::run("blocks/empty_data");
  }?>