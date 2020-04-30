<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<title>404 Error </title>
		<!--favicon-->
		<link rel="icon" href="<?php echo config_item('base_url') ?>/assets/images/favicon.png">
		<!-- Vector CSS -->
		<link href="<?php echo config_item('base_url') ?>/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
		<!-- simplebar CSS-->
		<link href="<?php echo config_item('base_url') ?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
		<!-- Bootstrap core CSS-->
		<link href="<?php echo config_item('base_url') ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
		<!-- animate CSS-->
		<link href="<?php echo config_item('base_url') ?>/assets/css/animate.css" rel="stylesheet" type="text/css" />
		<!-- Icons CSS-->
		<link href="<?php echo config_item('base_url') ?>/assets/css/icons.css" rel="stylesheet" type="text/css" />
		<!-- Font Awsome CSS-->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- Sidebar CSS-->
		<link href="<?php echo config_item('base_url') ?>/assets/css/sidebar-menu.css" rel="stylesheet" />
		<!-- Custom Style-->
		<link href="<?php echo config_item('base_url') ?>/assets/css/app-style.css" rel="stylesheet" />
	</head>

	<body class="bg-error">

		<!-- Start wrapper-->
		<div id="wrapper">

			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="text-center error-pages">
							<h1 class="error-title text-primary">404</h1>
							<h2 class="error-sub-title text-dark"><?php echo $heading; ?></h2>

							<p class="error-message text-dark text-uppercase"><?php echo $message; ?> </p>

							<div class="mt-4">
								<a href="<?php echo config_item('base_url'); ?>/Dashboard" class="btn btn-primary btn-round shadow-primary m-1">Dashboard </a>
								<a href="<?php echo config_item('base_url'); ?>/welcom/logout" class="btn btn-outline-primary btn-round m-1">Log Out</a>
							</div>

							<div class="mt-4">
								<p class="text-dark">Copyright © 2018 <span class="text-primary">Infiniverse </span>| All rights reserved.</p>
							</div>
							<hr class="w-50">
							<div class="mt-2">
								<a href="javascript:void()" class="btn-social btn-social-circle btn-facebook waves-effect waves-light m-1"><i class="fa fa-facebook"></i></a>
								<a href="javascript:void()" class="btn-social btn-social-circle btn-google-plus waves-effect waves-light m-1"><i class="fa fa-google-plus"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!--wrapper-->


		<!-- Bootstrap core JavaScript-->
		<script src="<?php echo config_item('base_url') ?>/assets/js/jquery.min.js"></script>
		<script src="<?php echo config_item('base_url') ?>/assets/js/popper.min.js"></script>
		<script src="<?php echo config_item('base_url') ?>/assets/js/bootstrap.min.js"></script>

		<!-- simplebar js -->
		<script src="<?php echo config_item('base_url') ?>/assets/plugins/simplebar/js/simplebar.js"></script>
		<!-- waves effect js -->
		<script src="<?php echo config_item('base_url') ?>/assets/js/waves.js"></script>
		<!-- sidebar-menu js -->
		<script src="<?php echo config_item('base_url') ?>/assets/js/sidebar-menu.js"></script>
		<!-- Custom scripts -->
		<script src="<?php echo config_item('base_url') ?>/assets/js/app-script.js"></script>

	</body>

</html>