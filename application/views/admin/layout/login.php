<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<title>AdminLTE | Log in</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- bootstrap 3.0.2 -->
	<?= link_tag('assets/css/bootstrap.min.css') ?>
	<!-- font Awesome -->
	<?= link_tag('assets/css/font-awesome.min.css') ?>
	<!-- Theme style -->
	<?= link_tag('assets/css/AdminLTE.css') ?>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->
      </head>
      <body class="bg-black">

      	<div class="form-box" id="login-box">
      		<div class="header">Sign In</div>

      		<?= form_open(base_url('admin/login')) ?>

	      		<div class="body bg-gray">
	      			<?= validation_errors() ?>
	      			<? if($this->session->flashdata('login_failed') !== null) : ?>
					<a class="text-danger"><?= $this->session->flashdata('login_failed') ?></a>
	      			<? endif ?>
	      			<div class="form-group">
	      				<input type="text" name="username" class="form-control" placeholder="User ID"/>
	      			</div>
	      			<div class="form-group">
	      				<input type="password" name="password" class="form-control" placeholder="Password"/>
	      			</div>          
	      			<div class="form-group">
	      				<input type="checkbox" name="remember_me"/> Remember me
	      			</div>
	      		</div>
	      		<div class="footer">                       
	      			<input type="submit" name="login" class="btn bg-olive btn-block" value="Sign me in">                                

	      			<p><a href="#">I forgot my password</a></p>

	      			<a href="register.html" class="text-center">Register a new membership</a>
	      		</div>

      		<?= form_close() ?>

      		<div class="margin text-center">
      			<span>Sign in using social networks</span>
      			<br/>
      			<button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
      			<button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
      			<button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

      		</div>
      	</div>


      	<!-- jQuery 2.0.2 -->
      	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
      	<!-- Bootstrap -->
      	<?= script_tag('assets/js/bootstrap.min.js') ?>

      </body>
      </html>