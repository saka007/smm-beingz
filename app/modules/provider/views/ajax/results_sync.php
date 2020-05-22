
<div class="col-md-12">
  <div class="title text-center text-info">
    <h3><?php echo lang("synchronization_results"); ?> <?php echo "- ".$api_name?> </h3>
  </div>
</div>
<?php if(!empty($services_new) || !empty($services_disabled)){
?>
<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?php echo lang("lists"); ?></h3>
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
            <th><?php echo lang("service_id"); ?></th>
            <th><?php echo lang("Name"); ?></th>
            <th><?php echo lang("Status"); ?></th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $i = 0;
            if (!empty($services_new)) {
              foreach ($services_new as $key => $row_new) {
                $i++;
          ?>
          <tr>
            <td  class="text-center"><?php echo strip_tags($i); ?></td>
            <td><?php echo strip_tags($row_new->service); ?></td>
            <td><div class="title"><?php echo strip_tags($row_new->name); ?></div></td>
            <td><span class="btn round btn-info btn-sm"><?php echo lang("New"); ?></span></td>
          </tr>
          <?php }}?>
          <?php 
            if (!empty($services_disabled)) {
              foreach ($services_disabled as $key => $row_disabled) {
                $i++;
          ?>
          <tr>
            <td  class="text-center"><?php echo strip_tags($i); ?></td>
            <td><?php echo strip_tags($row_disabled->service); ?></td>
            <td><div class="title"><?php echo strip_tags($row_disabled->name); ?></div></td>
            <td><span class="btn round btn-warning btn-sm"><?php echo lang("Disabled"); ?></span></td>
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