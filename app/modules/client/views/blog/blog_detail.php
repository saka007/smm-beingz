<!-- get Header top menu -->
<?php
  $data_link = (object)array(
    'link'  => cn($module),
    'name'  => lang('Blog')
  );
?>
<?php echo Modules::run("blocks/user_header_top", $data_link); ?>

<section class="blog-single">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-9">
            <div class="blog-content">
              <div class="image-thumbnail text-center">  
                <img src="<?php echo strip_tags($blog->image)?>" alt="<?php echo strip_tags($blog->title)?>">
              </div>
              <h1 class="title"><?php echo strip_tags($blog->title)?></h1>
              <div class="post-info">
                <p>
                  <span><i class="fa fa-user"></i> <a href="javascript:void(0)" title="<?php echo get_option('website_name'); ?>" rel="author"><?php echo get_option('website_name'); ?></a></span>
                  <span><i class="fa fa-calendar"></i> <?php echo date("F jS, Y", strtotime($blog->created)); ?></span>
                  <span><i class="fa fa-tag"></i> <a href="<?php echo cn('blog/category/'.$blog->category); ?>"><?php echo strip_tags($blog->category)?></a></span>
                </p>
              </div>
              <div class="details">
                <?php echo html_entity_decode($blog->content, ENT_QUOTES); ?>
              </div>
            </div>
            <div class="blog-back">
              <a href="<?php echo cn('blog'); ?>" class="btn btn-pill btn-gradient btn-back-blog btn-min-width mr-1 mb-1"><span><i class="fe fe-arrow-left"></i></span> <?php echo lang('Back_to_Blog'); ?></a>
            </div>
          </div>
          <?php 
            if (!empty($categories) || !empty($related_posts)) {
          ?>
          <div class="col-lg-3 mb-4 side-bar">

            <?php 
              if (!empty($categories)) {
            ?>
            <div class="widget">
            <h3 class="title"><?php echo lang('Post_Category'); ?></h3>
              <div class="widget-category">
                <?php 
                  foreach ($categories as $key => $row) {
                ?>
                <a href="<?php echo cn($module.'/category/'.strip_tags($row->name)); ?>"><?php echo strip_tags($row->name); ?><span>(<?php echo strip_tags($row->count)?>)</span></a>
                <?php }?>
              </div>
            </div>
            <?php }?>

            <?php 
              if (!empty($related_posts)) {
            ?>
            <div class="widget">
              <h3 class="title"><?php echo lang('related_posts'); ?></h3>
              <?php
                $website_name = get_option('website_name'); 
                foreach ($related_posts as $key => $row) {
              ?>
              <div class="widget-post">
                <div class="box-image">
                  <a href="<?php echo cn('blog/'.strip_tags($row->url_slug)); ?>">
                    <img src="<?php echo strip_tags($row->image); ?>" alt="<?php echo strip_tags($row->url_slug); ?>"> 
                  </a>
                </div>

                <div class="post-holder">
                  <div class="title">
                    <a href="<?php echo cn('blog/'.strip_tags($row->url_slug)); ?>"><?php echo strip_tags($row->title); ?></a>
                  </div>
                  <div class="blog-meta">
                    <?php echo lang('by'); ?> <?php echo strip_tags($website_name)?> - <?php echo date("F jS, Y", strtotime($row->created)); ?>
                  </div>
                </div>

              </div>
              <?php }?>
            </div>
            <?php }?>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
</section>
