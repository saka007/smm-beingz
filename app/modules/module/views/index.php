
<div class="page-header">
  <?php 
  if(get_role("admin")) {
  ?>
  <h1 class="page-title d-none d-lg-block">
    <span data-toggle="modal" data-target="#install-module">
      <span class="add-new"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i>
      </span>
    </span> 
    <?php echo lang("add_new"); ?>
  </h1>

  <h1 class="page-title d-md-none">
    <a href="<?php echo cn("$module/add"); ?>">
      <span class="add-new" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php echo lang("add_new"); ?>"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span>
    </a>
    <?php echo lang("Modules"); ?>
  </h1>
  <?php }?>
</div>

<div class="row m-t-10 modules-lists" id="result_ajaxSearch">
  <?php
    if (isset($_GET["error"]) && $_GET["error"] != "") {
  ?>
  <div class="col-md-8">
    <div class="payment-errors alert alert-icon alert-danger alert-dismissible">
      <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
      <span class="payment-errors-message"><?php echo base64_decode($_GET["error"]); ?></span>
    </div>
  </div>
  <?php }?>


  <?php 
    if (!empty($scripts)) {

  ?>
  <div class="col-md-12">
    <div class="row row-cards">
      <?php
        foreach ($scripts as $key => $row) {
          $version = $row->version;
          $purchase_exist = false;
          $check_upgrade  = false;

          foreach ($purchase_code_lists as $key => $purchase_code_item) {
            if ($row->app_id == $purchase_code_item->pid) {
              $purchase_exist = true;
              $version = $purchase_code_item->version;
              if (version_compare($row->version, $purchase_code_item->version, '>')) {
                $check_upgrade = true;
                $purchase_code = $purchase_code_item->purchase_code;
              }
            }
          }
      ?>
      <div class="col-sm-6 col-lg-4 module-item">
        <div class="card p-3">
          <a target="_blank" href="<?php echo strip_tags($row->link); ?>" class="mb-3">
            <img src="<?php echo strip_tags($row->thumbnail)?>" alt="<?php echo strip_tags($row->name); ?>" class="rounded">
          </a>
          <div class="d-flex align-items-center px-2">
            <div>
              <div class="product-name">
                <a href="<?php echo strip_tags($row->link); ?>" target="_blank">
                  <?php echo strip_tags($row->name); ?>
                </a>
              </div>
            </div>
            <div class="ml-auto text-muted">
              <small>ver<?php echo strip_tags($version); ?></small>
            </div>
          </div>
          <div class="d-flex align-items-center px-2 m-t-5">
            <div>
              <div class="product-price">
                $<?php echo strip_tags($row->price); ?>
              </div>
            </div>
            <div class="ml-auto text-muted">
              <?php
                if (!$purchase_exist) {
                  echo '<a href="'.strip_tags($row->link).'" target="_blank" class="btn btn-pill btn-info btn-sm">'.lang('Buy_now').'</a>';
                }else{
                  if ($check_upgrade) {
                    $url = cn($module."/ajax_upgrade_module/".$purchase_code);
                    echo '<a href="'.$url.'" class="btn btn-pill btn-primary btn-sm ajaxUpgradeVersion"><i class="fe fe-arrow-up"></i>'.lang('Upgrade_version').$row->version.'</a>';
                  }else{
                    echo '<span class="btn btn-pill btn-gray btn-sm">'.lang('Purchased').'</span>';
                  }
                }
              ?>
            </div>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
  <?php }else{?>
  <div class="col-md-12 data-empty text-center">
    <div class="content">
      <img class="img mb-1" src="<?php echo BASE; ?>assets/images/ofm-nofiles.png" alt="empty">
      <div class="title"><?php echo lang("look_like_there_are_no_results_in_here"); ?></div>
    </div>
  </div>
  <?php }?>
</div>
<!-- Note: You can use your License code (Purchase code) for one domain only. -->


<div class="modal-install-module">
  <div class="modal" id="install-module">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="actionForm" action="<?php echo cn($module."/ajax_install_module"); ?>" method="POST">
          <div class="modal-header">
            <h4 class="modal-title"><i class="fe fe-plus-circle"></i> Install Module</h4>
            <button type="button" class="close" data-dismiss="modal"></button>
          </div>

          <div class="modal-body">
            <div class="form-group">
              <label>Your purchase code</label>
              <input class="form-control square" type="text" name="purchase_code">
            </div>
          </div>

          <div class="modal-footer">
            <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?php echo lang("Submit"); ?></button>
            <button type="button" class="btn round btn-default btn-min-width mr-1 mb-1" data-dismiss="modal"><?php echo lang("Cancel"); ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>