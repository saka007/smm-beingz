<div class="page-header d-md-none">
  <h1 class="page-title">
    <i class="icon-fa fa fa-credit-card" aria-hidden="true"></i> <?php echo lang("Transaction_logs"); ?>
  </h1>
</div>
<div class="row" id="result_ajaxSearch">
  <?php if (!empty($transactions)) {
  ?>
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
        <table class="table table-hover table-bordered table-outline table-vcenter card-table">
          <thead>
            <tr>
              <th class="text-center w-1"><?php echo lang('No_'); ?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?php echo strip_tags($row); ?></th>
              <?php }}?>
              
              <?php
                if (get_role("admin")) {
              ?>
              <th class="text-center"><?php echo lang('Action'); ?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($transactions)) {
              $i = 0;
              foreach ($transactions as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?php echo strip_tags($row->ids); ?>">
              <td><?php echo strip_tags($i); ?></td>
              <td><?php echo strip_tags($row->order_id); ?></td>
              <td>
                <div class="title"><?php echo strip_tags($row->email); ?></div>
              </td>
              <td>
                <?php

                  switch ($row->transaction_id) {
                    case 'empty':
                      if ($row->type == 'manual') {
                        echo lang($row->transaction_id);
                      }else{
                        echo lang($row->transaction_id)." ".lang("transaction_id_was_sent_to_your_email");
                      }
                      break;

                    default:
                      echo strip_tags($row->transaction_id);
                      break;
                  }
                  
                ?>
              </td>
              <td>
                <img class="payment" src="<?php echo BASE; ?>/assets/images/payments/<?php echo strip_tags($row->type)?>.png" alt="<?php echo strip_tags($row->type)?> icon">
              </td>
              <td><?php echo get_option("currency_symbol", ''); ?><?php echo strip_tags($row->amount); ?> </td>
              <td><?php echo convert_timezone($row->created, 'user'); ?></td>

              <td>
                <?php
                  switch ($row->status) {
                    case 1:
                        echo '<span class="badge badge-default">'.lang('Paid').'</span>';
                      break;

                    case 0:
                        echo '<span class="badge badge-warning">'.lang("waiting_for_buyer_funds").'</span>';
                      break; 

                    case -1:
                        echo '<span class="badge badge-danger">'.lang('cancelled_timed_out').'</span>';
                      break;
                  }
                ?>
              </td>

              <?php
                if (get_role("admin")) {
              ?>
              <td class="text-center">
                <div class="btn-group">
                  <a href="<?php echo cn("$module/ajax_delete_item/".$row->ids); ?>" class="btn btn-icon btn-outline-danger ajaxDeleteItem" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("Delete"); ?>"><i class="fe fe-trash-2"></i></a>
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
  <div class="col-md-12">
    <div class="float-right">
      <?php echo $pagination; ?>
    </div>
  </div>
  <?php }else{?>
    <?php echo Modules::run("blocks/empty_data"); ?>
  <?php }?>
</div>
