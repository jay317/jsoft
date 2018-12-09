
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Client</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border bg-success">
              <div><h2 class="box-title">
			  <a href="<?php echo site_url('client/index');?>" class="btn btn-default btn-js"><i class="fa fa-arrow-left" aria-hidden="true" align="left"></i></a>
			  &nbsp;&nbsp;&nbsp;
			  <?php if($getClientById!=''){echo "Edit";}else{echo "Add";}?> Client</h2></div>
			  <?php if ($this->session->flashdata('message_error')) { ?>
				<div class="alert alert-danger col-md-6 col-md-offset-4"> <?= $this->session->flashdata('message_error') ?> </div>
			<?php } ?>
			<?php if ($this->session->flashdata('message_success')) { ?>
				<div class="alert alert-info col-md-6 col-md-offset-4"> <?= $this->session->flashdata('message_success') ?> </div>
			<?php } ?>
			<?php if ($this->session->flashdata('message_empty')) { ?>
				<div class="alert alert-danger col-md-6 col-md-offset-4"> <?= $this->session->flashdata('message_empty') ?> </div>
			<?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php if($getClientById!=''){?>
            <form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('client/addClient');?>?updt=update" enctype="multipart/form-data">
             <input type="hidden" name="hidden_id" value="<?php echo $getClientById->icw_clientId0317; ?>">
			 <?php }else{?>
			<form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('client/addClient');?>" enctype="multipart/form-data">
			 <?php } ?>
			 <div class="box-body">
				<div class="form-group">
                  <label for="cName" class="col-sm-2 control-label">Full Name*</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="cName" id="cName" value="<?php if($getClientById){echo $getClientById->icw_clientName0317;} ?>" placeholder="Full Name" required="required">			
				  </div>				  
                </div>
				<div class="form-group">
                  <label for="cMobile" class="col-sm-2 control-label">Mobile*</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" maxlength="10" minlength="10" name="cMobile" id="cMobile" value="<?php if($getClientById){echo $getClientById->icw_clientMobile0317;} ?>" placeholder="Mobile No.">
                  </div>
                </div>
				<div class="form-group">
                  <label for="cEmail" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="cEmail" id="cEmail" value="<?php if($getClientById){echo $getClientById->icw_clientEmail0317;} ?>" placeholder="Email Id">
                  </div>
                </div>
				<div class="form-group">
                  <label for="cBusinessTitle" class="col-sm-2 control-label">Business Title</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="cBusinessTitle" id="cBusinessTitle" value="<?php if($getClientById){echo $getClientById->icw_clientBtitle0317;} ?>" placeholder="Business Title">
                  </div>
                </div>
				<div class="form-group">
                  <label for="cGrn" class="col-sm-2 control-label">GRN</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="cGrn" id="cGrn" value="<?php if($getClientById){echo $getClientById->icw_clientGrn0317;} ?>" placeholder="GRN">
                  </div>
                </div>
                <div class="form-group">
                  <label for="cAddress1" class="col-sm-2 control-label">Address Line 1</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="cAddress1" id="cAddress1" value="<?php if($getClientById){echo $getClientById->icw_clientAddr10317;} ?>" placeholder="Street address, P.O. box, company name, c/o">
                  </div>
                </div>
				<div class="form-group">
                  <label for="cAddress2" class="col-sm-2 control-label">Address Line 2</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="cAddress2" id="cAddress2" value="<?php if($getClientById){echo $getClientById->icw_clientAddr20317;} ?>" placeholder="Apartment, suite , unit, building, floor, etc.">
                  </div>
                </div>
				<div class="form-group">
                  <label for="city" class="col-sm-2 control-label">City / Town</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="city" id="city" value="<?php if($getClientById){echo $getClientById->icw_clientCity0317;} ?>" placeholder="City">
                  </div>
                </div>
				<div class="form-group">
                  <label for="state" class="col-sm-2 control-label">State / Province / Region</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="state" id="state" value="<?php if($getClientById){echo $getClientById->icw_clientState0317;} ?>" placeholder="State/Province/Region">
                  </div>
                </div>
				<div class="form-group">
                  <label for="postalCode" class="col-sm-2 control-label">Zip / Postal Code</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" name="postalCode" id="postalCode" value="<?php if($getClientById){echo $getClientById->icw_clientZipCode0317;} ?>" placeholder="Zip/Postal Code">
                  </div>
                </div>
				<div class="form-group">
                  <label for="country" class="col-sm-2 control-label">Country</label>
                  <div class="col-sm-3">
                    <select name="country" id="CountrySelect" value="<?php if($getClientById){echo $getClientById->icw_clientCountry0317;} ?>">
				<?php	foreach ($getCountry->result() as $row){ ?>
					<option value="<?php echo $row->country_name; ?>" <?php if($getClientById){ if($row->id == $getClientById->icw_clientCountry0317){echo ' selected';}}?> ><?php echo $row->country_name; ?></option>
				<?php } ?>
					</select>					
                  </div>
                </div>
            
				<div class="form-group">
                  <label for="productDescription" class="col-sm-2 control-label">Upload Image</label>
                  <div class="col-sm-6">
                     <input type="file" name="image" id="image">
                     <input type="hidden" name="hidden_image" value="<?php if($getClientById){echo $getClientById->icw_clientImg0317;} ?>">
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url('client/index');?>" class="btn btn-default col-md-offset-5" id="frmRest">Back</a>
                <button type="submit" class="btn btn-info">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
		  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!--- /scripts --->

<script>
$(document).ready(function() {
    $('#CountrySelect').select2({
    	allowClear: true,
        width: "300px;"
    });	
});
</script>
