<?php
if (! $this->session->userdata("username")) {
	redirect('welcome/index');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $page_title?></title>
<!-- Tell the browser to be responsive to screen width -->
<meta
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
	name="viewport">

<!-- Bootstrap 3.3.7  & jquery 3.2.1-->
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css"></link>
<script
	src="<?php echo base_url();?>assets/plugins/jQuery/jquery-3.2.1.min.js"></script>
<script
	src="<?php echo base_url();?>assets/plugins/jQueryUI/jquery-ui.min.js"></script>
<script
	src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/plugins/jQueryUI/jquery-ui.min.css"></link>
<script
	src="<?php echo base_url();?>assets/plugins/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
<!-- Font Awesome -->
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css"></link>
	
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css"></link>
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/plugins/billingCss/billingCss.css"></link>
<!-- barcode generator -->
<script
	src="<?php echo base_url();?>assets/plugins/barcode/jquery-barcode-generator.min.js"></script>
<!-- Theme style -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/dist/css/skins/_all-skins.min.css"></link>

<!-- Date Picker -->
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/plugins/datepicker/datepicker3.css"></link>
<script
	src="<?php echo base_url();?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap2-toggle -->
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/plugins/bootstrap-toggle/bootstrap-toggle.min.css"></link>
<script
	src="<?php echo base_url();?>assets/plugins/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<!-- Sweet alert -->	
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/plugins/sweet-alert/sweetalert2.css"></link>
<script
	src="<?php echo base_url();?>assets/plugins/sweet-alert/sweetalert2.js"></script>			
<!-- Daterange picker -->
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/plugins/daterangepicker/daterangepicker.css"></link>
<!-- <script src="<?php //echo base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- ckeditor -->
<script
	src="<?php echo base_url();?>assets/plugins/ckeditor/ckeditor.js"></script>

<link rel="stylesheet"
	href="<?php echo base_url();?>assets/plugins/datatables/dataTables.bootstrap.css"></link>

<link rel="stylesheet"
	href="<?php echo base_url();?>assets/plugins/select2/select2.min.css"></link>
<script
	src="<?php echo base_url();?>assets/plugins/select2/select2.min.js"></script>

<script
	src="<?php echo base_url();?>assets/plugins/chartjs/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/plugins/chartjs/data.js"></script>
<script
	src="<?php echo base_url();?>assets/plugins/chartjs/drilldown.js"></script>
<!-- Google Font -->
<!--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->

</head>
<body class="hold-transition skin-blue-light sidebar-mini
<?php

if($this->uri->uri_string()=='pos/pointofsale' || $this->uri->uri_string()=='restaurant/index'){?>
sidebar-collapse
<?php } echo("".$req_page_name);
?>">
	<div class="wrapper">

		<header class="main-header">
			<!-- Logo -->
			<a href="<?php echo site_url('mainController/dashboard');?>"
				class="logo"> <!-- mini logo for sidebar mini 50x50 pixels --> <span
				class="logo-mini"><b>j</b>Soft</span> <!-- logo for regular state and mobile devices -->
				<span class="logo-lg"><b>j</b>Soft</span> </a>
			<!-- Header Navbar: style can be found in header.less -->
			<nav class="navbar navbar-static-top">
				<!-- Sidebar toggle button-->
				<a href="#" class="sidebar-toggle" data-toggle="push-menu"
					role="button"> <span class="sr-only">Toggle navigation</span> </a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
					
						<?php //if(SHOP_TYPE==1){?>  
						<?php $settingDetails=$this->session->userdata('settingDetails');
								$shopType=$settingDetails->icw_shop_type0317;
								if($shopType==1){ ?> 
						<li class=""><a href="#" class="dropdown-toggle"
							data-toggle="dropdown"
							onclick="window.location='<?php echo site_url('pos/index');?>'">
								<i class="fa fa-inr"></i> Generate Bill </a></li>
								<?php } ?>
								
						<?php //if(SHOP_TYPE==4){?> 
						
						<?php $settingDetails=$this->session->userdata('settingDetails');
								$shopType=$settingDetails->icw_shop_type0317;
								if($shopType==4){ ?> 
						<li class=""><a href="#" class="dropdown-toggle"
							data-toggle="dropdown"
							onclick="window.location='<?php echo site_url('restaurant/index');?>'">
								<i class="fa fa-inr"></i> Generate Bill </a></li>
								<?php } ?>
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu"><a href="#"
							class="dropdown-toggle" data-toggle="dropdown"> <?php if($_SESSION['user_proImg']!='' && $_SESSION['user_id']!=''){?>
								<img
								src="<?php echo base_url();?>uploads/user-images/<?php echo $_SESSION['user_proImg'];?>"
								class="user-image" alt="User Image"> <?php }else{?> <img
								src="<?php echo base_url();?>assets/dist/img/avatar.png"
								class="user-image" alt="User Image"> <?php } ?> <span
								class="hidden-xs"><?php
								if ($_SESSION['username'] != '' && $_SESSION['user_id'] != '') {
									echo $_SESSION['username'];
								}
								?> </span> </a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header"><?php if($_SESSION['user_proImg']!='' && $_SESSION['user_id']!=''){?>
									<img
									src="<?php echo base_url();?>uploads/user-images/<?php echo $_SESSION['user_proImg'];?>"
									class="img-circle" alt="User Image"> <?php }else{?> <img
									src="<?php echo base_url();?>assets/dist/img/avatar.png"
									class="user-image" alt="User Image"> <?php } ?>
									<p>
									<?php if($_SESSION['userFname']!='' && $_SESSION['user_id']!=''){echo ucwords($_SESSION['userFname']);} else{}?>
										<small><?php if($_SESSION['usertype']!='' && $_SESSION['user_id']!=''){echo strtoupper($_SESSION['usertype']);} else{}?>
										</small>
									</p>
								</li>
								<li class="user-footer">
									<div class="pull-left">
										<a href="<?php echo site_url('mainController/profile');?>"
											class="btn btn-default btn-flat">Profile</a>
									</div>
									<div class="pull-right">
										<a href="<?php echo site_url('mainController/logout');?>"
											class="btn btn-default btn-flat">Sign out</a>
									</div>
								</li>
							</ul></li>
					</ul>
				</div>
			</nav>
		</header>