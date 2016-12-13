    <div class="header">
      <h2>Login</h2>
    </div>
    <?php if($this->session->flashdata('message')) : ?>
    <div id="login_info" class="alert_error">
      <p><img src="<?php echo base_url(); ?>assets/admin/images/icon_error.png" alt="success" class="middle"/> <?php echo $message;?> </p>
    </div>
    <?php endif; ?>	
    
    <?php echo form_open('login/login/log'); ?>	
    <ul>
      <li>
          <!--changed username to identity-->
        <input type="text" class="text login" name="identity" value="<?php echo $username ? $username : 'Username'; ?>" />
      </li>
      <li>
        <input type="password" class="text login" name="password" value="<?php echo $password ? $password : ''; ?>" />
      </li>
      <li>
        <input type="submit" name="submit" class="signIn" value="SIGN IN" />
      </li>
    </ul>
    <?php echo form_close(); ?>