<!-- get Header top menu -->
<?php
  $data_link = (object)array(
    'link'  => cn($module),
    'name'  => lang('Blog')
  );
?>
<?php echo Modules::run("blocks/user_header_top", $data_link); ?>

<section class="blog">
  <div class="container">
    <div class="row row-cards justify-content-md-center">
      <div class="col-md-6">
        <div class="blog-header">
          <div class="title">
            <h1 class="title-name"><?php echo lang('Blog'); ?></h1>
          </div>
          <span class="text-muted"><?php echo lang('we_bring_you_the_best_stories_and_articles_youll_find_tips_on_all_social_networks_growth_and_general_social_media_advice_as_well_as_latest_updates_related_to_our_services'); ?></span>
        </div>
      </div>
      
      <?php
        if (!empty($blogs)) {
          $website_name = get_option('website_name');
          foreach ($blogs as $key => $blog) {
      ?>
      <div class="col-md-10">
        <div class="row blog-item">
          <div class="col-md-6 box-image">
            <a href="<?php echo cn('blog/'.strip_tags($blog->url_slug)); ?>"><img src="<?php echo strip_tags($blog->image)?>" alt="<?php echo strip_tags($blog->url_slug); ?>">
            </a>
          </div>
          <div class="col-md-6">
            <div class="content">
              <h4 class="title"><a href="<?php echo cn('blog/'.strip_tags($blog->url_slug)); ?>"><?php echo truncate_string(strip_tags($blog->title), 69); ?></a></h4>
              <div class="short-desc">
                <?php
                  $content = html_entity_decode($blog->content, ENT_QUOTES);
                  $content = strip_tag_css($content);
                ?>
                <?php echo truncate_string($content, 169); ?>
              </div>

              <div class="d-flex align-items-center mt-auto">
                <div>
                  <?php echo lang('by'); ?> <a href="javascript:void(0)" class="text-default"><?php echo strip_tags($website_name); ?></a>
                  <small class="d-block text-muted"><i class="fa fa-calendar"></i> <?php echo date("F jS, Y", strtotime($blog->created)); ?></small>
                </div>
                <div class="ml-auto text-muted">
                  <a class="icon ml-3">
                    <i class="fa fa-tag"></i> <a href="<?php echo cn('blog/category/'.$blog->category); ?>"> <?php echo strip_tags($blog->category); ?></a>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php }}else{?>

      <?php echo Modules::run("blocks/empty_data"); ?>  
      
      <?php }?>
    </div>
  </div>
</section>
