<div class="page-header">
  <?php 
  if(get_role("admin")  || get_role("supporter")) {
  ?>
  <h1 class="page-title d-none d-lg-block">
    <a class="ajaxModal btn-add-new" href="<?php echo cn("$module/update"); ?>">
      <span class="add-new"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span>
      <?php echo lang("add_new"); ?>
    </a>
  </h1>

  <h1 class="page-title d-md-none">
    <a href="<?php echo cn("$module/add"); ?>">
      <span class="add-new" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php echo lang("add_new"); ?>"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span>
    </a>
    <?php echo lang("api_providers"); ?>
  </h1>
  <?php }?>
</div>
<div class="row" id="result_ajaxSearch">
  <?php if(!empty($api_lists)){
  ?>
  <div class="col-md-12 col-xl-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?php echo lang("Lists"); ?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered  table-vcenter card-table">
          <thead>
            <tr>
              <th class="text-center w-1"><?php echo lang("No_"); ?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?php echo strip_tags($row); ?></th>
              <?php }}?>
              
              <?php
                if (get_role("admin")) {
              ?>
              <th class="text-center"><?php echo lang("Action"); ?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($api_lists)) {
              $i = 0;
              foreach ($api_lists as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?php echo strip_tags($row->ids); ?>">
              <td  class="text-center"><?php echo strip_tags($i); ?></td>
              <td>
                <?php
                  $api_url_base = explode("/api", $row->url);
                ?>
                <div class="title"><a href="<?php echo strip_tags($api_url_base[0])?>" target="_blank"><?php echo strip_tags($row->name); ?></a></div>
              </td>
              <td class="w-15"><?php echo strip_tags($row->balance.$row->currency_code); ?></td>
                <td><?php echo html_entity_decode($row->description, ENT_QUOTES); ?></td>
              </td>
              <td class="w-10">
                <?php if(!empty($row->status) && $row->status == 1){?>
                  <span class="badge badge-info"><?php echo lang("Active"); ?></span>
                  <?php }else{?>
                  <span class="badge badge-warning"><?php echo lang("Deactive"); ?></span>
                <?php }?>
              </td>

              <?php
                if (get_role("admin")) {
              ?>
              <td class="text-center w-15">
                <div class="btn-group">
                  <a href="<?php echo cn("$module/update/".$row->ids); ?>" class="btn btn-icon btn-outline-info ajaxModal" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("edit_api"); ?>"><i class="fe fe-edit"></i></a>

                  <a href="<?php echo cn("$module/ajax_update_api_provider/".$row->ids); ?>" data-redirect="<?php echo cn($module); ?>"  class="btn btn-icon btn-outline-info ajaxUpdateApiProvider" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("update_balance"); ?>"><i class="fe fe-dollar-sign"></i></a>

                  <a href="<?php echo cn("$module/sync_services/".$row->ids); ?>" data-redirect="<?php echo cn($module); ?>"  class="btn btn-icon btn-outline-info ajaxModal" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("sync_services"); ?>"><i class="fe fe-refresh-cw"></i></a>

                  <a href="<?php echo cn("$module/services"); ?>" class="btn btn-icon btn-outline-info" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("services_list_via_api"); ?>"><i class="fe fe-list"></i></a>

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
  <?php }else{?>
    <?php echo Modules::run("blocks/empty_data"); ?>
  <?php } ?>
</div>

<div class="row m-t-30" id="result_notification">

</div>