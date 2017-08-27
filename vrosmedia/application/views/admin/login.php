<?php

$FORM_ATTRIBUTE = array(
    'name' => 'loginForm',
    'id' => 'validateLogin',
    'class' => 'login-form'
);
$emails = array(
    'name' => 'email',
    'id' => 'username',   
    'class' => 'form-control form-control-solid placeholder-no-fix'
);

$PASSWORD = array(
    'name' => 'password',
    'id' => 'password',
    'class' => 'form-control'
);

$REMEMBER_ME = array(
    "id" => "keepLoged",
    "value" => "TRUE",
    "name" => "chkRemember",
);

$FORM_BUTTON = array(
    'id' => 'loginBtn',
    'value' => 'true',
    'type' => 'submit',
    'name' => 'loginbtn',
    'content' => $this->lang->line('BTN_LOGIN'),
    'class' => "btn waves-effect waves-light col s12"
);
?>

<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
       <?php echo form_open("admin/login", $FORM_ATTRIBUTE); ?>
        <div class="row">
          <div class="input-field col s12 center">
            <img src="<?php echo ADMIN_IMAGE_URL; ?>/login-logo.png" alt="" class="responsive-img valign profile-image-login">
            <p class="center login-form-text"> <?php $this->general_model->getAdminMessages(); ?></p>
         
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
             <?php echo form_input($emails); ?>
            <label for="username" class="center-align"><?php echo  $this->lang->line("EMAIL"); ?></label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
             <?php echo form_password($PASSWORD); ?>
            <label for="password"><?php echo  $this->lang->line("PASSWORD"); ?></label>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <?php echo form_button($FORM_BUTTON); ?>
          </div>
        </div>
        <div class="row">
         
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
          </div>          
        </div>

      </form>
    </div>
  </div>