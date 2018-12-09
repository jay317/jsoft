
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
<?php echo $page_title;?>
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i>General Setting</a></li>
	<li class="active">Dashboard</li>
</ol>
</section>

<!-- Main content -->
<section class="content"> <!-- Small boxes (Stat box) -->
<div class="row">
	<div class="col-md-12">
		<!-- Horizontal Form -->
		<div class="box box-info">
			<div class="box-header with-border bg-success">
				<div>
					<h2 class="box-title">
						<a href="<?php echo site_url('mainController/dashboard');?>"
							class="btn btn-default btn-js"><i class="fa fa-arrow-left"
							aria-hidden="true" align="left"></i> </a>
						&nbsp;&nbsp;&nbsp;Setting
					</h2>
				</div>
			</div>
			<?php if ($this->session->flashdata('user_msg_error')) { ?>
			<div class="alert alert-danger col-md-4 col-md-offset-4">
			<?= $this->session->flashdata('user_msg_error') ?>
			</div>
			<?php } ?>
			<?php if ($this->session->flashdata('user_msg_success')) { ?>
			<div class="alert alert-info col-md-4 col-md-offset-4">
			<?= $this->session->flashdata('user_msg_success') ?>
			</div>
			<?php } ?>
			<!-- /.box-header -->
			<!-- form start -->
			<?php $settingDetails=isset($settingDetails)?$settingDetails:'' ;?>
			<div class="col-md-12">
				<div class="box-body">
					<form id="updtSettingForm" method="post"
						action="<?php echo site_url('mainController/settingUpdate');?>"
						enctype="multipart/form-data">
						<div class="col-md-3 panel panel-default box-body">
						<h6 class="" style="font-style:italic;">upload an image for shop here</h6>
							<div class="row form-group" style="height: 100px;">
								<center>
									<span class="fig" style="margin: 10px;"><i
										class="fa fa-spinner" aria-hidden="true"
										style="display: none;"></i> <?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_bLogo_0317 !=''){ ?>
										<img class="scaled img-circle"
										src="<?php echo base_url();?>uploads/shop-logo/<?php echo $settingDetails->icw_shop_bLogo_0317;?>"
										style="width: 100px; height: 100px; float: none;" /> <?php }}else{ ?>
										<img class="scaled img-circle"
										src="<?php echo base_url();?>assets/images/profile-icon.png"
										style="width: 100px; height: 100px;" /> <?php } ?> </span>
								</center>
							</div>
							<!-- update profile pic-->
							<input type="file" name="image" id="image" class="form-control" />
							<input type="hidden" name="hidden_image"
								value="<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_bLogo_0317!=''){echo $settingDetails->icw_shop_bLogo_0317;}}?>" />
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-3 ">
							<!-- update full name and username-->
							<input type="hidden"
								value="<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shopId0317!=''){echo $settingDetails->icw_shopId0317;}}?>"
								name="shopId">
							<!-- <div class="form-group">
								<label for="shopName" class="control-labe">Type Of Shop</label>
								<div class="input-group">
									<select name="shopType" id="shopType">
										<option value="1"
										<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_type0317 == 1){?>
											selected="selected" <?php }}?>>General Store</option>
										<option value="2"
										<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_type0317 == 2){?>
											selected="selected" <?php }}?>>Opticals Store</option>
										<option value="3"
										<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_type0317 == 3){?>
											selected="selected" <?php }}?>>Tailor Shop</option>
										<option value="4"
										<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_type0317 == 4){?>
											selected="selected" <?php }}?>>Restaurant</option>
									</select>
								</div>
							</div> -->
							<div class="form-group">
								<label for="shopName" class="control-labe">Shop Name</label>
								<div class="input-group">
									<span class="input-group-addon"> <span
										class="glyphicon glyphicon-record"></span> </span> <input
										type="text"
										value="<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_name0317!=''){echo $settingDetails->icw_shop_name0317;}}?>"
										class="form-control" name="shopName" id="shopName" required
										placeholder="Shop Name">
								</div>
							</div>
							<?php if(SHOP_TYPE ==1){?>							
							<div class="form-group">
								<label for="shopHSN" class="control-label">HSN Display</label>
								<div class="input-group">
									<select name="shopHSN" id="shopHSN">
										<option value="1"
										<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_hsn0317 == 1){?>
											selected="selected" <?php }}?>>Yes</option>
										<option value="0"
										<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_hsn0317 == 0){?>
											selected="selected" <?php }}?>>No</option>
									</select>
					
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for="shopMobile" class="control-labe">Mobile</label>
								<div class="input-group">
									<span class="input-group-addon"> <span
										class="glyphicon glyphicon-phone"></span> </span> <input
										type="text"
										value="<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_mobile0317!=''){echo $settingDetails->icw_shop_mobile0317;}}?>"
										class="form-control" name="shopMobile" id="shopMobile"
										required maxlength=10 placeholder="Mobile No.">
								</div>
							</div>
							<div class="form-group">
								<label for="shopPhone" class="control-labe">Phone</label>
								<div class="input-group">
									<span class="input-group-addon"> <span
										class="glyphicon glyphicon-phone-alt"></span> </span> <input
										type="text"
										value="<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_phone0317!=''){echo $settingDetails->icw_shop_phone0317;}}?>"
										class="form-control" name="shopPhone" id="shopPhone" required
										placeholder="Phone No.">
								</div>
							</div>
							<div class="form-group">
								<label for="shopGstin" class="control-label">GSTIN</label>
								<div class="input-group">
									<span class="input-group-addon"> <span
										class="glyphicon glyphicon-asterisk"></span> </span> <input
										type="text"
										value="<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_gstin0317!=''){echo $settingDetails->icw_shop_gstin0317;}}?>"
										class="form-control" name="shopGstin" id="shopGstin" required
										placeholder="GST Reg. no.">
								</div>
							</div>						
						</div>
				</div>
			</div>
			<?php if(SHOP_TYPE ==1){?>
			<div class="row ">				
				<div class="col-md-2 col-md-offset-3">
					<div class="form-group">
								<label for="shopMobile" class="control-labe">Tax Settings</label>
								<div class="input-group">
									<select name="tax_setting" id="tax_setting">
										<option value="1"
										<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_tax0317 == 1){?>
											selected="selected" <?php }}?>>Common Tax</option>
										<option value="2"
										<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_tax0317 == 2){?>
											selected="selected" <?php }}?>>Product Wise Tax</option>
									</select>
								</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
								<label for="shopMobile" class="control-labe">Printer Settings</label>
								<div class="input-group">
									<select name="printer_setting" id="printer_setting">
										<option value="1"
										<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_printer0317 == 1){?>
											selected="selected" <?php }}?>>Common printer</option>
										<option value="2"
										<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_printer0317 == 2){?>
											selected="selected" <?php }}?>>Bluetooth Printer</option>
									</select>
								</div>
					</div>
				</div>
				</div>
				<?php } ?>
				<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="form-group">
								<label for="smsGty" class="control-label">SMS Setting</label>
								<div class="input-group">
								<input name="smsGty" style="height:50px; width:300%;" value="<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_sms0317!=''){echo $settingDetails->icw_shop_sms0317;}}?>">
								
								</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-3">
					<div class="form-group">
								<label for="shopHSN" class="control-label">Address</label>
								<div class="input-group">

									<textarea id="editor1" name="shopAddress" rows="5" cols="50">
									<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_Address0317!=''){echo $settingDetails->icw_shop_Address0317;}}?>
									</textarea>
								</div>
							</div>	
				</div>
				<div class="col-md-4">
							<div class="form-group">
								<label for="shopTermCondition" class="control-label">Terms &
									Conditions</label>								
									<textarea id="editor2" name="shopTermCondition" rows="5"
										cols="100">
										<?php if($this->session->userdata('settingDetails')){if($settingDetails->icw_shop_TermCondition0317!=''){echo $settingDetails->icw_shop_TermCondition0317;}}?>
									</textarea>								
							</div>
				</div>
			</div>
			<div class="box-footer">
				<button type="submit" class="btn btn-primary pull-right" style="margin:5px;">Update</button>
			</div>			
		</div>
	</form>
</section>
<!-- /.content -->
</div>

<script>
    $(function () {
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
  });
  $(function () {
    CKEDITOR.replace('editor2')
    $('.textarea').wysihtml5()
  });
</script>
