
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> User</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->          
            <div class=" box box-info">
              <div class="box-header with-border bg-success">
              <h2 class="box-title">
			  <a href="<?php echo site_url('mainController/user');?>" class="btn btn-default btn-js"><i class="fa fa-arrow-left" aria-hidden="true" align="left"></i></a>
			  &nbsp;&nbsp;&nbsp;New User</h2>
              </div>
			
            <!-- /.box-header -->
            <!-- form start -->			
            <form class="form-horizontal" name="userForm" id="userForm" method="post" action="<?php echo site_url('mainController/addNewUser');?>?a=update">
			 <div class="row">
			  <div class="col-md-3 user-div">
                <div class="form-group">
                  <label for="userFullName" class="control-label">Full Name</label>
                  <div class="input-group">              
                  <span class="input-group-addon">
					<span class="glyphicon glyphicon-record"></span>
				  </span>
					<input type="text" value="" class="form-control" name="userFullName" id="userFullName" placeholder="Full Name">
				  </div>
                </div>
                <div class="form-group">
                  <label for="userFullName" class="control-label">Mobile</label>
                  <div class="input-group">              
                  <span class="input-group-addon">
					<span class="glyphicon glyphicon-record"></span>
				  </span>
					<input type="text" value="" class="form-control" name="userMobile" id="userMobile" maxlength=10 placeholder="Mobile">
				  </div>
                </div>
                <div class="form-group">
                  <label for="userFullName" class="control-label">Email</label>
                  <div class="input-group">              
                  <span class="input-group-addon">
					<span class="glyphicon glyphicon-record"></span>
				  </span>
					<input type="text" value="" class="form-control" name="userEmail" id="userEmail" placeholder="Email">
				  </div>
                </div>
				
			  
		   </div>
		   <div class="col-md-3 user-div">
				<div class="form-group">
                  <label for="userName" class="control-label">User Name</label>
                  <div class="input-group">              
                  <span class="input-group-addon">
					<span class="glyphicon glyphicon-user"></span>
				  </span>
					<input type="text" value="" class="form-control" name="userName" id="userName" placeholder="User Name">
				  </div>
                </div>
				<div class="form-group">
                  <label for="uPwd" class="control-label">Password</label>
                  <div class="input-group">
				  <span class="input-group-addon">
					<span class="glyphicon glyphicon-lock"></span>
				  </span>
                    <input type="password" style="-webkit-text-security: circle;" class="form-control" name="uPwd" id="uPwd" placeholder="Password">
                  </div>
                </div>
				<div class="form-group">
                  <label for="urPwd" class="control-label">Re-Password</label>
                  <div class="input-group">
				  <span class="input-group-addon">
					<span class="glyphicon glyphicon-th"></span>
				  </span>
                    <input type="text" value="" class="form-control" name="urPwd" id="urPwd" placeholder="Password">
                  </div>
                </div>
				<div class="form-group">
                  <label for="userType" class="control-label">Role</label>
				  <div class="input-group">
					 <select name="userType" class="form-control">					  
					  <option value="user">User</option>
					  <option value="admin">Admin</option>					  
                     </select> 
				  </div>
			  </div>
			  <div class="form-group">
                  <label for="shop" class="control-label">Shop</label>
				  <div class="input-group">
					 <select name="shop" class="form-control">
					 <?php foreach($getShop as $shop){?>					  
					  <option value="<?php echo $shop->shopid;?>"><?php echo $shop->shopname;?></option>
					 	<?php }?>				  
                     </select> 
				  </div>
			  </div>
		   </div>
              <!-- /.box-body -->
			   <div class="col-md-6 user-div">
				  	<?php if ($this->session->flashdata('user_msg_error')) { ?>
					<div class="alert alert-danger col-md-4">&nbsp;&nbsp;&nbsp;<strong class="text-danger"><i><?= $this->session->flashdata('user_msg_error') ?></i></strong><img src="<?php echo base_url();?>assets/images/successfully2.png" width="200px;" height="200px;"></div>
					<?php } ?>
					<?php if ($this->session->flashdata('user_msg_success')) { ?>
						<div class="alert alert-info1 col-md-4">&nbsp;&nbsp;&nbsp;<strong class="text-success"><i> <?= $this->session->flashdata('user_msg_success') ?></i></strong><img src="<?php echo base_url();?>assets/images/successfully.gif" width="200px;" height="200px;"></div>
					<?php } ?>
				</div>
		  </div>
				<div class="box-footer">
					<button type="submit" class="btn btn-info pull-right">Submit</button>
				</div>
		  
		  </div>		  			
		</div>	
	</div>
	
    </section>
    <!-- /.content -->
  </div>
 </form> 
       <!-- /.form  --> 
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--- /scripts --->
<style>
  .error {
   color: #ff0000;
   font-size:10px;
  }
</style>
<script>
setTimeout(function() {
$('.alert-danger').fadeOut('fast');
}, 10000);	

 $.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg !== value;
 }, "Value must not equal arg.");
$(function() {
  $("form[name='userForm']").validate({   
    rules: {
      userFullName: "required",
      userName: "required",
	  userType: { valueNotEquals: "default" },
      uPwd: {
        required: true,
        minlength: 5
      },	      
    urPwd: {
      equalTo: "#uPwd"
    }
	},
    messages: {
      userFullName: "Please enter full name",
      userName: "Please enter user name",
	  userType: { valueNotEquals: "Please assign a role!" },
      urPwd: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
}); 
</script>