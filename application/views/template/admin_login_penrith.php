<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
	<?php define('ADMIN_ASSETS', base_url('assets').'/'); ?>
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>css/main.css">
    <link rel="stylesheet" href="<?php echo ADMIN_ASSETS; ?>lib/magic/magic.css">
    
	
  </head>
  <body class="login">
    <div class="container">
      <div class="text-center">
        <!--<img src="<?php // echo base_url(); ?>assets/img/logo.png" alt="Metis Logo">-->
      </div>
      <div class="tab-content">
        <div id="login" class="tab-pane active">
          <form action="<?php echo site_url('login/login/log')?>" method="post" class="form-signin">
            <p class="text-muted text-center">
              Enter your username and password
            </p>
			  <?php if($message): ?>
			  <div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<?php echo $message; ?>
				</div>			  
			  <?php endif; ?>
            <input type="text" name="identity" placeholder="Username" class="form-control">
            <input type="password" name="password" placeholder="Password" class="form-control">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          </form>
        </div>
        <div id="forgot" class="tab-pane">
          <form action="<?php echo site_url('admin/login/')?>" class="form-signin">
            <p class="text-muted text-center">Enter your valid e-mail</p>
            <input type="email" placeholder="Email" required="required" class="form-control">
            <br>
            <button class="btn btn-lg btn-danger btn-block" type="submit">Recover Password</button>
          </form>
        </div>
        <div id="signup" class="tab-pane">
          <form action="index.html" class="form-signin">
            <input type="text" placeholder="username" class="form-control">
            <input type="email" placeholder="mail@domain.com" class="form-control">
            <input type="password" placeholder="password" class="form-control">
            <button class="btn btn-lg btn-success btn-block" type="submit">Register</button>
          </form>
        </div>
      </div>
      <div class="text-center">
        <ul class="list-inline">
          <li> <a class="text-muted" href="#login" data-toggle="tab">Login</a>  </li>
          <!--<li> <a class="text-muted" href="#forgot" data-toggle="tab">Forgot Password</a>  </li>-->		  
        </ul>
      </div>
    </div><!-- /container -->
    <script src="<?php echo base_url(); ?>assets/lib/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/bootstrap/js/bootstrap.js"></script>
    <script>
      $('.list-inline li > a').click(function() {
        var activeForm = $(this).attr('href') + ' > form';
        //console.log(activeForm);
        $(activeForm).addClass('magictime swap');
        //set timer to 1 seconds, after that, unload the magic animation
        setTimeout(function() {
          $(activeForm).removeClass('magictime swap');
        }, 1000);
      });
    </script>
  </body>
</html>