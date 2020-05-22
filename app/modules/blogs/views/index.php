<div class="page-header">
  <?php 
  if(get_role("admin")  || get_role("supporter")) {
  ?>
  <h1 class="page-title d-none d-lg-block">
    <a href="<?php echo cn("$module/update"); ?>" class="btn-add-new">
      <span class="add-new"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span>
      <?php echo lang("add_new"); ?>
    </a>
  </h1>

  <h1 class="page-title d-md-none">
    <a href="<?php echo cn("$module/update"); ?>">
      <span class="add-new" data-toggle="tooltip" data-placement="bottom" data-original-title="<?php echo lang("add_new"); ?>"><i class="fa fa-plus-square text-primary" aria-hidden="true"></i></span>
      <?php echo lang("Blogs"); ?>
    </a>
  </h1>
  <?php }?>
</div>


<div class="row" id="result_ajaxSearch">
  <?php if(!empty($blogs)){
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
              <th class="text-center w-1"><?php echo lang("No_"); ?></th>
              <?php if (!empty($columns)) {
                foreach ($columns as $key => $row) {
              ?>
              <th><?php echo strip_tags($row); ?></th>
              <?php }}?>
              
              <?php
                if (!get_role("user")) {
              ?>
              <th class="text-center"><?php echo lang('Action'); ?></th>
              <?php }?>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($blogs)) {
              $i = 0;
              foreach ($blogs as $key => $row) {
              $i++;
            ?>
            <tr class="tr_<?php echo strip_tags($row->ids); ?>">
              <td><?php echo strip_tags($i); ?></td>
              <td>
                <div class="title"><?php echo truncate_string(strip_tags($row->title), 30); ?></div>
              </td>
              <td class="w-20">
                <img class="blog-image-thumbnail" src="<?php echo strip_tags($row->image); ?>" alt="<?php echo strip_tags($row->title); ?>">
              </td>
              <td><?php echo strip_tags($row->category); ?></td>
              <td><?php echo convert_timezone($row->created, 'user'); ?></td>
              <td><?php echo strip_tags($row->sort); ?></td>
              <td class="w-5">
                <?php if(!empty($row->status) && $row->status == 1){?>
                  <span class="badge badge-info"><?php echo lang("Active"); ?></span>
                  <?php }else{?>
                  <span class="badge badge-warning"><?php echo lang("Deactive"); ?></span>
                <?php }?>
              </td> 
              <td class="text-center">
                <div class="btn-group">
                  <a href="<?php echo cn($module."/update/".$row->ids); ?>" class="btn btn-icon btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("Edit"); ?>"><i class="fe fe-edit"></i></a>
                  <a href="<?php echo cn('blog/'.$row->url_slug); ?>" target="_blank" class="btn btn-icon btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="<?php echo lang("View"); ?>"><i class="fe fe-link"></i></a>
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
