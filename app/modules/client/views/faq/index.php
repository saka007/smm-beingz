
<?php
  $data_link = (object)array(
    'link'  => cn('faq'),
    'name'  => lang('FAQ')
  );
?>
<?php echo Modules::run("blocks/user_header_top", $data_link); ?>
<section class="faq">
  <div class="container">
    <div class="row" id="result_ajaxSearch">
      

      <div class="col-md-12">
        <div class="faq-header text-white">
          <div class="title">
            <h1 class="title-name"><?php echo lang("frequently_asked_questions"); ?></h1>
          </div>
          <span><?php echo lang("quickly_find_out_if_weve_already_addressed_your_query"); ?></span>
        </div>
      </div>

      <?php if(!empty($faqs)){
        foreach ($faqs as $key => $row) {
      ?>
      <div class="col-md-12 col-xl-12 tr_<?php echo strip_tags($row->ids); ?> faq-item">
        <div class="card card-collapsed">
          <div class="card-header">
            <h3 class="card-title" data-toggle="card-collapse">
              <span class="bg-question"><i class="fa fa-question-circle" aria-hidden="true"></i></span> <?php echo strip_tags($row->question); ?>
            </h3>
            <div class="card-options">
              <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
              <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
            </div>
          </div>
          <div class="card-body">
            <?php echo html_entity_decode($row->answer, ENT_QUOTES); ?>
          </div>
        </div>
      </div>
      <?php }}else{?>
        <?php echo Modules::run("blocks/empty_data"); ?>
      <?php } ?>
    </div>
  </div>
</section>

