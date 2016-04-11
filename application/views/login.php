<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title><?php echo $this->config->item('title').' | Login'; ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="" name="description" />
	<meta content="<?php echo $this->config->item('title'); ?>" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url('assets/css').'/bootstrap.min.css'; ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/css/theme').'/uniform.default.css'; ?>" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN THEME GLOBAL STYLES -->
	<link href="<?php echo base_url('assets/css/theme').'/components.min.css'; ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url('assets/css/theme').'/plugins.min.css'; ?>" rel="stylesheet" type="text/css" />
	<!-- END THEME GLOBAL STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?php echo base_url('assets/css/theme').'/login.min.css'; ?>" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="<?php echo base_url('assets/images').'/logo.png'; ?>" />
</head>
<!-- END HEAD -->

<body class=" login">
	<!-- BEGIN LOGO -->
	<div class="logo">
		<a href="<?php echo base_url(); ?>">
			<img src="<?php echo base_url('assets/images').'/logo.png'; ?>" alt="" />
		</a>
	</div>
	<!-- END LOGO -->
	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		<form class="form-signin" action="<?php echo $this->config->item('link_login'); ?>" method="post">
			<h3 class="form-title font-green">Sign In</h3>
			<?php if (validation_errors() != '') { ?>
			<div class="alert alert-danger">
				<button class="close" data-close="alert"></button>
				<span><?php echo validation_errors(); ?></span>
			</div>
			<?php } ?>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">Username</label>
				<input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" required autofocus /> </div>
			<div class="form-group">
				<label class="control-label visible-ie8 visible-ie9">Password</label>
				<input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" required /> </div>
			<div class="form-actions">
				<button type="submit" name="submit" value="submit" class="btn green uppercase">Login</button>
				<label class="rememberme check">
					<input type="checkbox" name="logged" value="remember-me" />Remember
				</label>
			</div>
		</form>
		<!-- END LOGIN FORM -->
	</div>
	<div class="copyright"><?php echo date('Y').' © '.$this->config->item('title'); ?></div>
	<!-- BEGIN CORE PLUGINS -->
	<script src="<?php echo base_url('assets/js').'/jquery.min.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js').'/bootstrap.min.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/theme').'/js.cookie.min.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/theme').'/jquery.blockui.min.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/theme').'/jquery.uniform.min.js'; ?>" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL PLUGINS -->
	<script src="<?php echo base_url('assets/js').'/jquery.validate.js'; ?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/theme').'/additional-methods.min.js'; ?>" type="text/javascript"></script>
	<!-- END PAGE LEVEL PLUGINS -->
	<!-- BEGIN THEME GLOBAL SCRIPTS -->
	<script src="<?php echo base_url('assets/js/theme').'/app.min.js'; ?>" type="text/javascript"></script>
	<!-- END THEME GLOBAL SCRIPTS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url('assets/js/theme').'/login.min.js'; ?>" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS -->
</body>
</html>