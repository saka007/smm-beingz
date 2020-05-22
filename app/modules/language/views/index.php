<div class="page-header">
  <?php 
  if(get_role("admin")  || get_role("supporter")) {
  ?>
  <h1 class="page-title d-none d-lg-block">
    <a href="<?php echo cn("$module/update"); ?>">
      <span class="add-new"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span>
    </a>
    <?php echo lang("add_new"); ?>
  </h1>

  <h1 class="page-title d-md-none">
    <a href="<?php echo cn("$module/add"); ?>">
      <span class="add-new" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php echo lang("add_new"); ?>"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span>
    </a>
    <?php echo lang("Language"); ?>
  </h1>
  <?php }?>
</div>

<div class="row" id="result_ajaxSearch">
  <?php if(!empty($languages)){
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
        <table class="table table-hover table-bordered table-vcenter text-nowrap card-table">
          <thead>
            <tr>
              <th class="text-center w-1"><?php echo lang("No_"); ?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?php echo strip_tags($row); ?></th>
              <?php }}?>
              <th class="text-center"><?php echo lang("Action"); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($languages)) {
              $i = 0;
              foreach ($languages as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?php echo strip_tags($row->ids); ?>">
              <td><?php echo strip_tags($i); ?></td>
              <td>
                <div class="title"><h6><?php echo language_codes($row->code); ?></h6></div>
              </td>
              <td class="text-uppercase"><?php echo strip_tags($row->code)?></td>
              <td><span class="flag-icon flag-icon-<?php echo strtolower($row->country_code); ?>"></span></td>
              <td><?php if($row->is_default==1) echo lang('Yes'); else echo lang('No'); ?></td>
              <td><?php echo strip_tags($row->created); ?></td>
              <td>
                <?php if(!empty($row->status) && $row->status == 1){?>
                  <span class="btn round btn-info btn-sm"><?php echo lang("Active"); ?></span>
                  <?php }else{?>
                  <span class="btn round btn-warning btn-sm"><?php echo lang("Deactive"); ?></span>
                <?php }?>
              </td>
              <td class="text-center">
                <div class="btn-group">
                  <a href="<?php echo cn($module."/update/".$row->ids); ?>" class="btn btn-icon btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("Edit"); ?>"><i class="fe fe-edit"></i></a>
                  <a href="<?php echo cn("$module/ajax_delete_item/".$row->ids); ?>" class="btn btn-icon btn-outline-danger ajaxDeleteItem" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("Delete"); ?>"><i class="fe fe-trash-2"></i></a>
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
  <div class="col-md-12 data-empty text-center">
    <div class="content">
      <img class="img mb-1" src="<?php echo BASE; ?>assets/images/ofm-nofiles.png" alt="empty">
      <div class="title"><?php echo lang("look_like_there_are_no_results_in_here"); ?></div>
    </div>
  </div>
  <?php } ?>
</div>