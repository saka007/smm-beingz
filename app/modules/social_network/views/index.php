<form class="actionForm"  method="POST">
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
    <a  class="ajaxModal" href="<?php echo cn("$module/update"); ?>">
      <span class="add-new" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php echo lang("add_new"); ?>"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span>
    </a>
    <?php echo lang("social_networks"); ?>
  </h1>
  <?php }?>
  <div class="page-options d-flex">
    <?php
      if (get_role("admin")) {
    ?>
    <div class="d-flex">
      <div class="item-action dropdown action-options">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
           <i class="fe fe-menu mr-2"></i> <?php echo lang("Action"); ?>
        </button>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item ajaxActionOptions" href="<?php echo cn($module.'/ajax_actions_option'); ?>" data-type="delete"><i class="fe fe-trash-2 text-danger mr-2"></i> <?php echo lang("Delete"); ?></a>
          <a class="dropdown-item ajaxActionOptions" href="<?php echo cn($module.'/ajax_actions_option'); ?>" data-type="all_deactive"><i class="fe fe-trash-2 text-danger mr-2"></i> <?php echo lang("all_deactivated_categories"); ?></a>
          <a class="dropdown-item ajaxActionOptions" href="<?php echo cn($module.'/ajax_actions_option'); ?>" data-type="deactive"><i class="fe fe-x-square text-danger mr-2"></i> <?php echo lang('Deactive'); ?></a>   
          <a class="dropdown-item ajaxActionOptions" href="<?php echo cn($module.'/ajax_actions_option'); ?>" data-type="active"><i class="fe fe-check-square text-success mr-2"></i> <?php echo lang('Active'); ?></a>
        </div>
      </div>
    </div>
    <?php }?>
  </div>
</div>  

<div class="row" id="result_ajaxSearch">
  <?php if(!empty($categories)){
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
        <table class="table table-hover table-bordered table-vcenter card-table">
          <thead>
            <tr>
              <?php
                if (get_role("admin")) {
              ?>
              <th class="text-center">
                <label class="form-check">
                  <input class="form-check-input  check-all" type="checkbox" data-name="chk_1">
                  <span class="form-check-label"></span>
                </label>
              </th>
              <?php }?>
              <th class="text-center w-1"><?php echo lang("No_"); ?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?php echo strip_tags($row); ?></th>
              <?php }}?>
              
              <?php
                if (get_role("admin")  || get_role("supporter")) {
              ?>
              <th class="text-center"><?php echo lang("Action"); ?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($categories)) {
              $i = $from;
              foreach ($categories as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?php echo strip_tags($row->ids); ?>">
              <?php
                if (get_role("admin")) {
              ?>
              <th class="text-center w-1">
                <label class="form-check">
                  <input class="form-check-input  chk_1" type="checkbox" name="ids[]" value="<?php echo strip_tags($row->ids); ?>">
                  <span class="form-check-label"></span>
                </label>
              </th>
              <?php }?>
              <td  class="text-center"><?php echo strip_tags($i); ?></td>
              <td>
                <div class="title"><?php echo strip_tags($row->name); ?></div>
              </td>
              <td><?php echo html_entity_decode($row->desc, ENT_QUOTES); ?></td>
              <td><?php echo strip_tags($row->sort); ?></td>
              <td class="w-8">
                <?php if(!empty($row->status) && $row->status == 1){?>
                  <span class="badge badge-info"><?php echo lang("Active"); ?></span>
                  <?php }else{?>
                  <span class="badge badge-warning"><?php echo lang("Deactive"); ?></span>
                <?php }?>
              </td>

              <?php
                if (get_role("admin") || get_role("supporter")) {
              ?>
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
      </div>
    </div>
  </div>
  <!-- Get Pagination -->
  <div class="col-md-12">
    <div class="float-right">
      <?php echo $pagination; ?>
    </div>
  </div>
  <?php }else{?>
    <?php echo Modules::run("blocks/empty_data"); ?>
  <?php } ?>
</div>
</form>