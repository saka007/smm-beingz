
<div class="row">
  <div class="col col-login mx-auto p-t-200">
    <form class="card actionForm" action="<?php echo cn("maintenance/ajax_get_access"); ?>" data-redirect="<?php echo cn(); ?>" method="POST">
      <div class="card-body p-6">
        <div class="card-title text-center">
          <div class="site-logo mb-2">
            <a href="<?php echo cn(); ?>">
              <img src="<?php echo get_option('website_logo', BASE."assets/images/logo.png"); ?>" alt="website-logo">
            </a>
          </div>
          <h5><?php echo lang("login_to_maintenace_mode"); ?></h5>
          <small><?php echo lang("use_admin_account"); ?></small>
        </div>
        <div class="form-group">
          <div class="input-icon mb-5">
            <span class="input-icon-addon">
              <i class="fe fe-user"></i>
            </span>
            <input type="email" class="form-control" name="email" placeholder="Email" required>
          </div>    
                
          <div class="input-icon mb-5">
            <span class="input-icon-addon">
              <i class="fa fa-key"></i>
            </span>
            <input type="password" class="form-control" name="password" placeholder="<?php echo lang("Password"); ?>"required>
          </div>  
        </div>
        
        <div class="form-footer">
          <button type="submit" class="btn btn-primary btn-block"><?php echo lang("Login"); ?></button>
        </div>
      </div>
    </form>
  </div>
</div>
