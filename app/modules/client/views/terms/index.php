<?php
  if (!session('uid')) {
    $data_link = (object)array(
      'link'  => cn('terms'),
      'name'  => lang("Terms__Privacy_Policy")
    );
?>
  <?php echo Modules::run("blocks/user_header_top", $data_link); ?>
<?php }?>

<section class="blog">
  <div class="container">
    <div class="row row-cards justify-content-md-center">
      <div class="col-md-12">
        <div class="blog-header">
          <div class="title">
            <h1 class="title-name"><?php echo lang("Terms__Privacy_Policy"); ?></h1>
          </div>
        </div>
      </div>
      
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?php echo lang("Terms"); ?></h3>
          </div>
          <div class="card-body collapse show">
            <?php echo html_entity_decode(get_option("terms_content", ""), ENT_QUOTES); ?>
          </div>
        </div>
      </div> 

      <div class="col-md-10">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><?php echo lang("Privacy_Policy"); ?></h3>
          </div>
          <div class="card-body collapse show">
            <?php echo html_entity_decode(get_option("policy_content", ""), ENT_QUOTES); ?>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
