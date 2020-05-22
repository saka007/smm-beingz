<div class="page-header">
  <h1 class="page-title">
    <span><i class="icon fe fe-user"></i></span> <?php echo lang('Your_account'); ?>
  </h1>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"><?php echo lang("basic_information"); ?></h3>
        <div class="card-options">
          <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="icon fe fe-chevron-up"></i></a>
          <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="icon fe fe-x"></i></a>
        </div>
      </div>
      <div class="card-body">
        <form class="form actionForm" action="<?php echo cn($module."/ajax_update"); ?>" data-redirect="<?php echo cn($module); ?>" method="POST">
          <div class="form-body">
            <div class="row">

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?php echo lang("first_name"); ?></label>
                  <input class="form-control square" name="first_name" type="text" value="<?php if(!empty($user->first_name)) echo strip_tags($user->first_name); else echo ''; ?>">
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label for="userinput5"><?php echo lang("last_name"); ?></label>
                    <input class="form-control square" name="last_name" type="text" value="<?php if(!empty($user->last_name)) echo strip_tags($user->last_name); else echo ''; ?>">
                  </div>
              </div> 

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?php echo lang('Email'); ?></label>
                  <input class="form-control square" name="email" type="email" value="<?php if(!empty($user->email)) echo strip_tags($user->email); else echo ''; ?>">
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?php echo lang('Timezone'); ?></label>
                  <select  name="timezone" class="form-control square">
                    <?php $time_zones = tz_list();
                      if (!empty($time_zones)) {
                        foreach ($time_zones as $key => $time_zone) {
                    ?>
                    <option value="<?php echo strip_tags($time_zone['zone'])?>" <?php if(!empty($user->timezone) && $user->timezone == $time_zone["zone"]) echo 'selected'; else echo '';?>><?php echo strip_tags($time_zone['time'])?></option>
                    <?php }}?>
                  </select>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?php echo lang('Password'); ?></label>
                  <input class="form-control square" name="password" type="password">
                  <small class="text-primary"><?php echo lang("note_if_you_dont_want_to_change_password_then_leave_these_password_fields_empty"); ?></small>
                </div>
              </div> 

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="projectinput5"><?php echo lang('Confirm_password'); ?></label>
                  <input class="form-control square" name="re_password" type="password">
                </div>
              </div>
              
              <div class="col-md-12 col-sm-12 col-xs-12 form-actions">
                <div class="p-l-10">
                  <button type="submit" class="btn round btn-primary btn-min-width mr-1 mb-1"><?php echo lang('Save'); ?></button>
                </div>
              </div>
            </div>
          </div>
          <div class="">
          </div>
        </form>
      </div>
    </div>
  </div> 
</div>

