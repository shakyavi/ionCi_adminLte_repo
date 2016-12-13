<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open("login/login/log");?>

  <p>
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </p>
  
   
 
  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

  <br>
  <input type="button" value="Register" onclick="location.href='<?php echo base_url();?>index.php/register/register'">
<!--  <br><br><br>
  <a href ="<?php //echo site_url('register')?>">Register (site_url)</a>
  <br><br><br>
  <a href="<?php //echo base_url();?>index.php/register">Register (base_url)</a>-->
  <br><br><br>
  
<?php echo form_close();?>

  <p><a href="<?php echo base_url();?>index.php/login/login/forgot_password">  <?php echo lang('login_forgot_password');?> </a></p>