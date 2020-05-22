<?php echo Modules::run(get_theme()."/header", false); ?>
<div class="auth-login-form">
  <div class="form-login">
    <form class="actionForm" action="<?php echo cn("auth/ajax_reset_password/".$reset_key); ?>" data-redirect="<?php echo cn("auth/login"); ?>" method="POST">
      <div>
        <div class="card-title text-center">
          <div class="site-logo">
            <a href="<?php echo cn(); ?>">
              <img src="<?php echo get_option('website_logo', BASE."assets/images/logo.png"); ?>" alt="website-logo">
            </a>
          </div>
          <h4><?php echo lang("new_password"); ?></h4>
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
          <button type="submit" class="btn btn-pill btn-2 btn-block btn-submit btn-gradient"><?php echo lang("Submit"); ?></button>
        </div>
      </div>
    </form>
  </div>
</div>

<?php echo Modules::run(get_theme()."/footer", false); ?>
