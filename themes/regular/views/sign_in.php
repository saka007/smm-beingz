<?php echo Modules::run(get_theme()."/header", false); ?>

<div class="login-bg-image"></div>
<div class="page auth-login-form">
  <div class="container h-100">
    <div class="row h-100 align-items-center auth-form">
      <div class="col-md-6 col-login mx-auto ">
        <form class="card actionForm" action="<?php echo cn("auth/ajax_sign_in"); ?>" data-redirect="<?php echo cn('statistics'); ?>" method="POST">
          <div class="card-body ">
            <div class="card-title text-center">
              <div class="site-logo mb-2">
                <a href="<?php echo cn(); ?>">
                  <img src="<?php echo get_option('website_logo', BASE."assets/images/logo.png"); ?>" alt="website-logo">
                </a>
              </div>
              <h5><?php echo lang("login_to_your_account"); ?></h5>
            </div>
            <div class="form-group">
              <?php

                if (isset($_COOKIE["cookie_email"])) {
                  $cookie_email = encrypt_decode($_COOKIE["cookie_email"]);
                }

                if (isset($_COOKIE["cookie_pass"])) {
                  $cookie_pass = encrypt_decode($_COOKIE["cookie_pass"]);
                }

              ?>
              <div class="input-icon mb-5">
                <span class="input-icon-addon">
                  <i class="fe fe-mail"></i>
                </span>
                <input type="email" class="form-control" name="email" placeholder="<?php echo lang("Email"); ?>" value="<?php echo (isset($cookie_email) && $cookie_email != "") ? strip_tags($cookie_email) : ""; ?>" required>
              </div>    
                    
              <div class="input-icon mb-5">
                <span class="input-icon-addon">
                  <i class="fa fa-key"></i>
                </span>
                <input type="password" class="form-control" name="password" placeholder="<?php echo lang("Password"); ?>" value="<?php echo (isset($cookie_pass) && $cookie_pass != "") ? strip_tags($cookie_pass) : ""; ?>" required>
              </div>  
            </div>

            <div class="form-group">
              <label class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" <?php echo (isset($cookie_email) && $cookie_email != "") ? "checked" : ""?>>
                <span class="custom-control-label"><?php echo lang("remember_me"); ?></span>
                <a href="<?php echo cn("forgot_password"); ?>" class="float-right small"><?php echo lang("forgot_password"); ?></a>
              </label>
            </div>

            <div class="form-footer">
              <button type="submit" class="btn btn-primary btn-block"><?php echo lang("Login"); ?></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php echo Modules::run(get_theme()."/footer", false); ?>