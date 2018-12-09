<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>jSoft | Log in</title>
<!-- Tell the browser to be responsive to screen width -->
<meta
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
	name="viewport">
<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/dist/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet"
	href="../../bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet"
	href="<?php echo base_url();?>assets/plugins/iCheck/square/blue.css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

<!-- Google Font -->
<style>
.log-h{
	margin-bottom: 0px;
    padding: 12px;
}
</style>
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<?php if ($this->session->flashdata('message_name')) { ?>
		<div class="alert alert-danger">
		<?= $this->session->flashdata('message_name') ?>
		</div>
		<?php } ?>
		<h1 align="center" class="bg-green log-h ">
			j</b>Soft
		</h1>
		<!-- /.login-logo -->
		<div class="login-box-body rounded">
			<p class="login-box-msg" align="left"></p>

			<form method="post"
				action="<?php echo site_url('mainController/login');?>" role="login">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" placeholder="Username"
						name="uname"> <span class="fa fa-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" placeholder="Password"
						name="pass_"> <span
						class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<br />
					<div class="col-xs-12">
						<button type="submit" class="btn bg-green btn-block btn-flat">Sign
							In</button>
					</div>
					<div class="col-xs-12">
						<a class="btn-block" data-toggle="modal" data-target="#regModal" style="cursor: pointer">Register Shop</a>
					</div>
					<!-- /.col -->
				</div>
			</form>
		</div>
		<!-- /.login-box-body -->
	</div>
	
	<!-- Modal -->
		<div class="modal" id="regModal" tabindex="-1" role="dialog"
			aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header bg-green">
						<h4 class="h3Registration1" style="text-align: center">
							Shop Registration &nbsp;&nbsp;<i class="fa fa-check icnSuccess"
								aria-hidden="true" style="display: none;"></i> <i
								class="icon-remove-sign icnNotSuccess" aria-hidden="true"
								style="display: none;"></i>

							<button type="button" class="close" data-dismiss="modal"
								aria-label="Close">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>
						</h4>
					</div>
					<!-- form start -->
								<form class="form-horizontal" id="addForm"
									action="<?php echo site_url('mainController/shop_registration');?>"
									enctype="multipart/form-data">
					<div class="modal-body">
						<div class="row">
							<div class="col-md-12">
								<!-- Horizontal Form -->
								<!-- /.box-header -->
									<input type="hidden" name="hidden_ajax" value="ajaxData">
									<div class="col-md-12 box-body"
										style="height: 400px; overflow: auto;">
										<div class="form-group">
											<label for="userName" class="col-sm-4 control-label">Name*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="userName"
													id="userName" value="" placeholder="Full Name"
													required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="shopMobile" class="col-sm-4 control-label">Mobile*</label>
											<div class="col-sm-6">
												<input type="" class="form-control" maxlength="10"
													minlength="10" name="shopMobile" id="shopMobile" value=""
													placeholder="Mobile No."><span style="color:red;font-size:10px;">*Number only</span>
											</div>
										</div>
										<div class="form-group">
											<label for="userEmail" class="col-sm-4 control-label">Email*</label>
											<div class="col-sm-6">
												<input type="email" class="form-control" name="userEmail"
													id="userEmail" value="" placeholder="Email Id">
											</div>
										</div>
										<div class="form-group">
											<label for="userId" class="col-sm-4 control-label">User Name*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="userId"
													id="userId" value="" placeholder="Full Name"
													required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="userPwd" class="col-sm-4 control-label">Password*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="userPwd"
													id="userPwd" value="" placeholder="password"
													required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="userPwd" class="col-sm-4 control-label">Re-Password*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="userPwd"
													id="userPwd" value="" placeholder="password"
													required="required">
											</div>
										</div>
										<div class="form-group">
											<label for="cName" class="col-sm-4 control-label">Shop Name*</label>
											<div class="col-sm-6">
												<input type="text" class="form-control" name="shopName"
													id="shopName" value="" placeholder="Full Name"
													required="required">
											</div>
										</div>
										<div class="form-group">
										   <label for="shopType" class="col-sm-4 control-label">Shop Type*</label>
											<div class="col-sm-6">
											<select name="shopType" id="shopType" class="form-control">
												<option value="1">General Store</option>
												<option value="2">Opticals Store</option>
												<option value="3">Tailor Shop</option>
												<option value="4">Restaurant</option>
												<option value="5">Medical Shop</option>
											</select>
											</div>
										</div>

									</div>
									<!-- /.box-body -->
								
							</div>
						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-default close pull-left"
								data-dismiss="modal">Close</button>
						<button type="submit"
											class=" btn bg-green btn-flat frmSubmitJ ">Register</button>
							
						</div>
					</div>
					</form>
				</div>
			</div>

			<!-- /.content-wrapper -->

			<!-- Control Sidebar -->


			<!-- /.control-sidebar -->
			<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div>
	<!-- /.login-box -->

	<!-- jQuery 3 -->
	<link rel="stylesheet"
		href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css"></link>
	<script
		src="<?php echo base_url();?>assets/plugins/jQuery/jquery-3.2.1.min.js"></script>
	<script
		src="<?php echo base_url();?>assets/plugins/jQueryUI/jquery-ui.min.js"></script>
	<script
		src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
  $('#addForm').submit(function(evt) {
	    evt.preventDefault();
	    var formData = new FormData(this);
	    $.ajax({
	    type: 'POST',
	    url: $(this).attr('action'),
	    data:formData,
	    cache:false,
	    contentType: false,
	    processData: false,
	    success: function(data) {   	
	    	if(data == 1)
	    	{
	        	$(".icnSuccess").show();
	        	$(".icnSuccess").css("color","green").css("font-size","24px");
	        	$("#regModal").animate({ scrollTop: 0 }, "slow");
	        	location.reload();
	        	  //return false;
	        	  $('#addForm')[0].reset();
	        	}else{
	        	$(".icnNotSuccess").show();
	        	$(".icnNotSuccess").css("color","red");
	            	}
	    },
	    error: function(data) {
	        
	    }
	    });
	});

  $(function () {
      $("input[id*='shopMobile']").keydown(function (event) {

          if (event.shiftKey == true) {
              event.preventDefault();
          }

          if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

          } else {
              event.preventDefault();
          }
          
          if(event.keyCode == 190)
              event.preventDefault();

      });
  });
  
</script>


</body>
</html>
