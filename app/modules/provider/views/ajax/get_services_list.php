<?php if(!empty($services)){
?>
<?php
  $api_id   = (!empty($api_id))? $api_id: '';
  $api_ids  = (!empty($api_ids))? $api_ids: '';
?>
<div class="col-12">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"><?php echo lang("Lists"); ?></h3>
    </div>
    <div class="table-responsive">
      <table class="table table-hover table-bordered table-outline table-vcenter card-table services-list-datatable">
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
            <th><?php echo lang("Action"); ?></th>
            <?php }?>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($services)) {
            $i = 0;
            foreach ($services as $key => $row) {
              $i++;
          ?>
          <tr class="tr_<?php echo strip_tags($row->service); ?>">
            <td  class="text-center text-muted" ><?php echo strip_tags($i); ?></td>
            <td>
                <div class="title"><?php echo strip_tags($row->service); ?></div>
            </td>
            <td><span title="<?php echo strip_tags($row->name); ?>"><?php echo truncate_string(strip_tags($row->name), 60); ?></span></td>
            <td><span title="<?php echo strip_tags($row->name); ?>"><?php echo truncate_string($row->category, 30); ?></td>
            <td><?php echo strip_tags($row->rate); ?></td>
            <td><?php echo strip_tags($row->min); ?> / <?php echo strip_tags($row->max); ?></td>

            <td><?php if(isset($row->type)) echo strtolower($row->type); else echo 'default'; ?> </td>

            <td class="text-center">
              <div class="item-action dropdown">
                <a href="javascript:void(0)" data-toggle="dropdown" class="icon"><i class="fe fe-more-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="<?php echo cn("$module/add_service/"); ?>" data-serviceid="<?php echo strip_tags($row->service); ?>" data-category="<?php echo strip_tags($row->category); ?>" data-name="<?php echo strip_tags($row->name); ?>" data-min="<?php echo strip_tags($row->min); ?>" data-max="<?php echo strip_tags($row->max); ?>" data-rate="<?php echo strip_tags($row->rate); ?>" data-type="<?php if(isset($row->type)) echo strtolower(strip_tags($row->type)); else echo 'default'; ?>" data-api_provider_id="<?php echo strip_tags($api_id)?>" class="ajaxAddService dropdown-item"><i class="dropdown-icon fe fe-plus-square"></i> <?php echo lang("add_update_service"); ?></a>
                </div>
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
<?php }?>

<div id="modal-add-service" class="modal fade" tabindex="-1">
  <div id="main-modal-content">
    <div class="modal-right">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          
          <form class="form actionForm" action="<?php echo cn($module."/ajax_add_api_provider_service"); ?>" method="POST">
            <div class="modal-header bg-pantone">
              <h4 class="modal-title"><i class="fa fa-edit"></i><?php echo lang("add_update_service"); ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body">
              <div class="form-body">
                <div class="row justify-content-md-center">

                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class="form-label"><?php echo lang("Name"); ?></label>
                      <input type="text" class="form-control square" name="name">
                      <input type="hidden" class="form-control square" name="service_id">
                      <input type="hidden" class="form-control square" name="api_provider_id">
                      <input type="hidden" class="form-control square" name="dripfeed">
                      <input type="hidden" class="form-control square" name="type">
                    </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label class="form-label"><?php echo lang("choose_a_category"); ?></label>
                      <select  name="category" class="form-control square">
                        <?php if(!empty($categories_by_social_network)){
                        foreach ($categories_by_social_network as $key => $social_network) {
                        ?>
                        <optgroup label="<?php echo strip_tags($social_network->name); ?>"><?php echo strip_tags($social_network->name); ?>
                          <?php if(!empty($social_network->categories)){
                            foreach ($social_network->categories as $key => $category) {
                          ?>
                          <option value="<?php echo strip_tags($category->id); ?>" <?php if(!empty($service->ids) && $category->id == $service->cate_id) echo 'selected'; else echo '';?> ><?php echo strip_tags($category->name); ?></option>
                          <?php }}?>
                        </optgroup>
                        <?php }}?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label"><?php echo lang("Price"); ?></label>
                      <input type="text" class="form-control square" name="price" value="<?php echo (!empty($service->price))? $service->price: currency_format(get_option('default_price_per_1k',"0.80"),2); ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label"><?php echo lang("Quantity"); ?></label>
                      <input type="number" class="form-control square" name="quantity" value="<?php echo (!empty($service->quantity))? $service->quantity : 100?>">
                    </div>
                  </div>

                  <div class="col-md-12">
                    <fieldset class="form-fieldset">
                      <label class="form-label">API Service Details</label>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label><?php echo lang("rate_per_1000"); ?></label>
                            <input type="text" class="form-control square" name="original_price" disabled>
                            <input type="hidden" class="form-control square" name="original_price">
                          </div>
                        </div>
                        
                        <div class="col-md-4">
                          <div class="form-group">
                            <label><?php echo lang("minimum_amount"); ?></label>
                            <input type="number" class="form-control square" name="min" disabled>
                            <input type="hidden" class="form-control square" name="min">
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label><?php echo lang("maximum_amount"); ?></label>
                            <input type="number" class="form-control square" name="max" disabled>
                            <input type="hidden" class="form-control square" name="max">
                          </div>
                        </div>
                      </div>
                    </fieldset>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="form-group">
                      <label><?php echo lang("Description"); ?></label>
                      <textarea rows="3" id="editor" class="form-control square" name="desc"></textarea>
                    </div>
                  </div>
                </div>
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
</div>
<script src="<?php echo BASE; ?>assets/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script>
  CKEDITOR.replace( 'editor', {
    height: 100
  });
</script>

<!-- <?php if(segment('1') == 'api_provider'){  ?>
  <script src="<?php echo BASE; ?>assets/plugins/datatables/datatables.min.js"></script>
  <script>
    $(document).ready( function () {
      $('.services-list-datatable').DataTable({
        aLengthMenu: [
            [50, 100, 200, 500, -1],
            [50, 100, 200, 500, "All"]
        ],
        iDisplayLength: -1,
        "aoColumnDefs": [
          { "bSortable": false, "aTargets": [0, 5, 6,7] }, 
        ]
      });
   })
  </script>
<?php }?>
 -->