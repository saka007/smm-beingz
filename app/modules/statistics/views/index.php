
<?php
  $data_orders_log  = $data_log->data_orders;

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

?>
<div class="row justify-content-center row-card statistics">

  <div class="col-sm-12">
    <div class="row">
      <?php
        if (get_role("admin")) {
      ?>
      <div class="col-sm-6 col-md-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-success-gradient text-white mr-3">
              <i class="fe fe-users"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?php echo strip_tags($data_log->total_users); ?></h4>
                <small class="text-muted "><?php echo lang("total_users"); ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }else{ ?>
      <div class="col-sm-6 col-md-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-success-gradient text-white mr-3">
              <i class="fe fe-dollar-sign"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?php echo get_option('currency_symbol',"$"); ?>
                <?php echo (!empty($data_log->user_balance)) ? currency_format($data_log->user_balance, get_option('currency_decimal', 2), $decimalpoint, $separator) : 0
                ?>
                </h4>
                <small class="text-muted "><?php echo lang("your_balance"); ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

      <div class="col-sm-6 col-md-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-info-gradient text-white mr-3">
              <i class="fe fe-dollar-sign"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?php echo get_option('currency_symbol',"$"); ?><?php echo (!empty($data_log->total_spent_receive)) ? currency_format($data_log->total_spent_receive, get_option('currency_decimal', 2), $decimalpoint, $separator) : 0; ?></h4>
                <small class="text-muted ">
                  <?php
                    if (get_role("admin")) echo lang("total_amount_recieved"); else echo lang("total_amount_spent");
                  ?>
                </small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-warning-gradient text-white mr-3">
              <i class="fe fe-shopping-cart"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?php echo strip_tags($data_orders_log->total); ?></h4>
                <small class="text-muted "><?php echo lang("total_orders"); ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 item">
        <div class="card p-3">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md bg-danger-gradient text-white mr-3">
              <i class="fa fa-balance-scale"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?php echo get_option('currency_symbol',"$"); ?><?php echo (!empty($data_log->providers_balance)) ? currency_format($data_log->providers_balance, get_option('currency_decimal', 2), $decimalpoint, $separator) : 0?></h4>
                <small class="text-muted"><?php echo lang('Balance_providers'); ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="row">
      
      <!-- Order -->
      <div class="col-sm-12 charts">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?php echo lang("recent_orders"); ?></h3>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <div class="p-4 card">
                <div id="orders_chart_spline" class="h-18"></div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="p-4 card">
                <div id="orders_chart_pie" class="h-18"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-list"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?php echo strip_tags($data_orders_log->total); ?></h4>
                <small class="text-muted "><?php echo lang("total_orders"); ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-check"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 number"><?php echo strip_tags($data_orders_log->completed); ?></h4>
                <small class="text-muted"><?php echo lang("Completed"); ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-trending-up"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?php echo strip_tags($data_orders_log->processing); ?></h4>
                <small class="text-muted "><?php echo lang("Processing"); ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-loader"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?php echo strip_tags($data_orders_log->inprogress); ?></h4>
                <small class="text-muted "><?php echo lang("In_progress"); ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-pie-chart"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?php echo strip_tags($data_orders_log->pending); ?></h4>
                <small class="text-muted "><?php echo lang("Pending"); ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fa fa-hourglass-half"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?php echo strip_tags($data_orders_log->partial); ?></h4>
                <small class="text-muted "><?php echo lang("Partial"); ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>    

      <div class="col-sm-6 col-md-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-x-square"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?php echo strip_tags($data_orders_log->canceled); ?></h4>
                <small class="text-muted "><?php echo lang("Canceled"); ?></small>
              </div>
            </div>
          </div>
        </div>
      </div> 

      <div class="col-sm-6 col-md-3 item">
        <div class="card p-4">
          <div class="d-flex align-items-center">
            <span class="stamp stamp-md mr-3 text-info">
              <i class="fe fe-rotate-ccw"></i>
            </span>
            <div class="d-flex order-lg-2 ml-auto">
              <div class="ml-2 d-lg-block text-right">
                <h4 class="m-0 text-right number"><?php echo strip_tags($data_orders_log->refunded)?></h4>
                <small class="text-muted "><?php echo lang("Refunded"); ?></small>
              </div>
            </div>
          </div>
        </div>
      </div>    
      
    </div>
  </div>
</div>

<script>
  "use strict";
  $(document).ready(function(){
    Chart_template.chart_spline('#orders_chart_spline', <?php echo strip_tags($data_orders_log->data_orders_chart_spline); ?>);
    Chart_template.chart_pie('#orders_chart_pie', <?php echo strip_tags($data_orders_log->data_orders_chart_pie); ?>);
  });
</script>

