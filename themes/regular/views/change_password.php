<?php echo Modules::run(get_theme()."/header", false); ?>

<div class="login-bg-image"></div>
<div class="page auth-login-form">
  <div class="container h-100">
    <div class="row">
      <div class="col-md-6 col-login mx-auto auth-form">
        <form class="card actionForm" action="<?php echo cn("auth/ajax_reset_password/".$reset_key); ?>" data-redirect="<?php echo cn("auth/login"); ?>" method="POST">
          <div class="card-body p-t-10">
            <div class="card-title text-center">
              <div class="site-logo mb-2">
                <a href="<?php echo cn(); ?>">
                  <img src="<?php echo get_option('website_logo', BASE."assets/images/logo.png"); ?>" alt="website-logo">
                </a>
              </div>
              <h5><?php echo lang("new_password"); ?></h5>
            </div>
            <div class="form-group">
                    
              <div class="input-icon mb-5">
                <span class="input-icon-addon">
                  <i class="fa fa-key"></i>
                </span>
                <input type="password" class="form-control" name="password" placeholder="<?php echo lang("new_password"); ?>" required>
              </div>    

              <div class="input-icon mb-5">
                <span class="input-icon-addon">
                  <i class="fa fa-key"></i>
                </span>
                <input type="password" class="form-control" name="re_password" placeholder="<?php echo lang("Confirm_password"); ?>" required>
              </div>

            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary btn-block"><?php echo lang("Submit"); ?></button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>

<?php echo Modules::run(get_theme()."/footer", false); ?>


