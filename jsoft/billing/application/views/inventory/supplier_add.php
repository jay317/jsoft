
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Supplier</a></li>
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
			  <a href="<?php echo site_url('inventory/supplier');?>" class="btn btn-default btn-js"><i class="fa fa-arrow-left" aria-hidden="true" align="left"></i></a>
			  <?php if($getSupplierById!=''){echo "Edit";}else{echo "Add";}?> Supplier</h2></div>			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
			<?php if($getSupplierById!=''){?>
            <form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('inventory/addSupplierDt');?>?act=update" enctype="multipart/form-data">
             <input type="hidden" name="hidden_id" value="<?php echo $getSupplierById->icw_supplier_id0317; ?>">
			 <?php }else{?>
			<form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('inventory/addSupplierDt');?>" enctype="multipart/form-data">
			 <?php } ?>
			 <div class="box-body">
				<div class="form-group">
                  <label for="suppName" class="col-sm-2 control-label">Full Name*</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="suppName" id="suppName" value="<?php if($getSupplierById){echo $getSupplierById->icw_supplier_name0317;} ?>" placeholder="Full Name" required="required">			
				  </div>				  
                </div>
				<div class="form-group">
                  <label for="suppMobile" class="col-sm-2 control-label">Mobile*</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control" maxlength="10" minlength="10" name="suppMobile" id="suppMobile" value="<?php if($getSupplierById){echo $getSupplierById->icw_supplier_mobile0317;} ?>" placeholder="Mobile No.">
                  </div>
                </div>
				<div class="form-group">
                  <label for="suppEmail" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" name="suppEmail" id="suppEmail" value="<?php if($getSupplierById){echo $getSupplierById->icw_supplier_email0317;} ?>" placeholder="Email Id">
                  </div>
                </div>
				<div class="form-group">
                  <label for="suppCompany" class="col-sm-2 control-label">Company Name</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="suppCompany" id="suppCompany" value="<?php if($getSupplierById){echo $getSupplierById->icw_supplier_companyName0317;} ?>" placeholder="Business Title">
                  </div>
                </div>
				<div class="form-group">
                  <label for="suppAddress" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-6">                	      
                    <textarea id="editor1" name="suppAddress" rows="10" cols="72"></textarea>            
                  </div>
				</div>
				<div class="form-group">
                  <label for="shopTermCondition" class="col-sm-2 control-label">Status</label>
                  <div class="col-sm-6">        
                    <select name="isactive" class="form-control">					 
					  <option value="1" <?php if($getSupplierById){ if($getSupplierById->icw_supplier_isactive0317==1){echo " selected"; }}?> >Active</option>
					  <option value="0" <?php if($getSupplierById){if($getSupplierById->icw_supplier_isactive0317==0){echo " selected"; }}?> >InActive</option>
                    </select>             
                  </div>
				</div>
              </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url('inventory/supplier');?>" class="btn btn-default col-md-offset-5">Back</a>
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
  $(function () {
    CKEDITOR.replace('editor1')
    $('.textarea').wysihtml5()
  });
</script>
