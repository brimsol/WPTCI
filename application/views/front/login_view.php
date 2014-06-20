<!DOCTYPE html>
<html lang="en">
	

<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sentir, Responsive admin and dashboard UI kits template">
		<meta name="keywords" content="admin,bootstrap,template,responsive admin,dashboard template,web apps template">
		<meta name="author" content="Ari Rusmanto, Isoh Design Studio, Warung Themes">
		<title>Web Page Test Login</title>
 
		<!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
		<link href="<?php echo base_url('/assets/front'); ?>/css/bootstrap.min.css" rel="stylesheet">
		
		<!-- MAIN CSS (REQUIRED ALL PAGE)-->
		<link href="<?php echo base_url('/assets/front'); ?>/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?php echo base_url('/assets/front'); ?>/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url('/assets/front'); ?>/css/style-responsive.css" rel="stylesheet">
 
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
 
	<body class="login tooltips">
		
		
	
		
		
		
		<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->

		<div class="login_wrapper">
			
			<form role="form" method="post">
			
				<img src="<?php echo base_url('/assets/front'); ?>/img/logo_nobg.png" id="login_logo">
				
				 <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?><?php echo $this -> ci_alerts -> display('error_front'); ?>
				
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="text" name="username" value="<?php echo set_value('username');?>" class="form-control no-border input-lg rounded" placeholder="Enter username" autofocus>
				  <span class="fa fa-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback lg left-feedback no-label">
				  <input type="password" name="password" class="form-control no-border input-lg rounded" placeholder="Enter password">
				  <span class="fa fa-unlock-alt form-control-feedback"></span>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-info btn-lg btn-perspective btn-block">LOGIN</button>
				</div>
			</form>
			
		</div><!-- /.login-wrapper -->
		<!--
		===========================================================
		END PAGE
		===========================================================
		-->
		
		<!--
		===========================================================
		Placed at the end of the document so the pages load faster
		===========================================================
		-->
		<!-- MAIN JAVASRCIPT (REQUIRED ALL PAGE)-->
		<script src="<?php echo base_url('/assets/front'); ?>/js/jquery.min.js"></script>
		<script src="<?php echo base_url('/assets/front'); ?>/js/bootstrap.min.js"></script>
		
	</body>

</html>
