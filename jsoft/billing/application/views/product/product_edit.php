
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Product</a></li>
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
			  <a href="<?php echo site_url('product/index');?>" class="btn btn-default btn-js"><i class="fa fa-arrow-left" aria-hidden="true" align="left"></i></a>
			  &nbsp;&nbsp;&nbsp;
			  Edit Product</h2></div>
			  <?php if ($this->session->flashdata('message_error')) { ?>
				<div class="alert alert-danger col-md-4 col-md-offset-4"> <?= $this->session->flashdata('message_error') ?> </div>
			<?php } ?>
			<?php if ($this->session->flashdata('message_success')) { ?>
				<div class="alert alert-info col-md-4 col-md-offset-4"> <?= $this->session->flashdata('message_success') ?> </div>
			<?php } ?>
			<?php if ($this->session->flashdata('message_empty')) { ?>
				<div class="alert alert-danger col-md-4 col-md-offset-4"> <?= $this->session->flashdata('message_empty') ?> </div>
			<?php } ?>
            </div>
            <!-- /.box-header -->
            <!-- form start --><?php   //print_r($getProById);?>
            <?php 
            $proDtl=$getProById['detail_query'];
            $imgDtl=$getProById['image_query'];
            //$catDtl=$getPcat['getPcat']; 
            ?>
            <form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('product/editProduct');?>" enctype="multipart/form-data">
              <div class="box-body">
				<div class="form-group">
                  <label for="categoryName" class="col-sm-2 control-label">Product Category</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="categoryName" id="categoryName">
					<option value="">Select Category</option>
				<?php foreach ($getPcat->result() as $catrow){ ?>
					<option value="<?php echo $catrow->icw_ci0317; ?>" <?php if($catrow->icw_ci0317 == $proDtl->icw_cid0317){echo " selected"; }?>><?php echo $catrow->icw_cn0318; ?> </option>
				<?php } ?>
					</select>
                  </div>
                </div>
				<div class="form-group">
                  <label for="categoryName" class="col-sm-2 control-label">Product Sub Category</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="subcategoryName" id="subcategoryName"  required="required">
						<?php foreach($getSubcatss as $row){ ?>		
						<option value="<?php echo $row->icw_sci0317;?>" <?php if($row->icw_sci0317 == $proDtl->icw_scid0317){echo " selected"; }?>><?php echo $row->icw_scn0318;?></option>";
						<?php }?>
					</select>
                  </div>
                </div>
				<div class="form-group">
					<input type="hidden" name="hidden_id" value="<?php echo $proDtl->icw_pi0317; ?>">
                  <label for="productName" class="col-sm-2 control-label">Product Name*</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="productName" id="categoryName" value="<?php echo $proDtl->icw_pn0317;?>" placeholder="Product Name" required>
                  </div>
                </div>
				<div class="form-group">
                  <label for="productCode" class="col-sm-2 control-label">Product Code*</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="productCode" id="productCode" value="<?php echo $proDtl->icw_pcod0317;?>" placeholder="Product Code">
                  </div>
                </div>
				<div class="form-group">
                  <label for="productBarCode" class="col-sm-2 control-label">Product Bar-code*</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="productBarCode" id="productBarCode" value="<?php echo $proDtl->icw_pbcod0317;?>" placeholder="Product Bar Code">
                  </div>
                </div>
				<div class="form-group">
                  <label for="productBarCode" class="col-sm-2 control-label">Product HSN</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="productHsn" id="productHsn" placeholder="Product HSN" value="<?php echo $proDtl->icw_phsn0317;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="productPrice" class="col-sm-2 control-label">Product Price*</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="productPrice" id="productPrice" value="<?php echo $proDtl->icw_prs0317;?>" placeholder="product Price" required>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="productBatchNo" class="col-sm-2 control-label">Product Batch No.*</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="productBatchNo" id="productBatchNo" placeholder="batch no" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="productMfgDate" class="col-sm-2 control-label">Product Mfg Date*</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="productMfgDate" id="productMfgDate" placeholder="product mfg date" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="productExpireDate" class="col-sm-2 control-label">Product Expire Date*</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="productExpireDate" id="productExpireDate" placeholder="product expire date" required>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label for="proName" class="col-sm-2 control-label">Product Tax</label>
                  <div class="col-sm-3">         
					  <select name="pTax" id="pTax" style="width:100%;">
					<option></option>
				<?php	foreach ($getPtax->result() as $row){ ?>
					<option value="<?php echo $row->icw_id0317; ?>" <?php if($proDtl !=''){if($row->icw_id0317==$proDtl->icw_ptax0317){echo " selected";}}?>><?php echo $row->icw_taxName0317; ?> </option>
				<?php } ?>
					</select>
                  </div>
				</div>
                <div class="form-group">
                  <label for="productDescription" class="col-sm-2 control-label">Product Description</label>
                  <div class="col-sm-6">
                    <textarea name="productDescription" class="form-control" id="productDescription" placeholder="Product Description"><?php echo $proDtl->icw_pd0317;?></textarea>
                  </div>
                </div>
                	 <div class="form-group">
                  <label for="proActive" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-6">
					 <select name="isactive" class="form-control">					 
					  <option value="1" <?php if($proDtl->icw_pisa0317==1){echo "  selected"; }?>>Active</option>
					  <option value="0" <?php if($proDtl->icw_pisa0317==0){echo "  selected"; }?>>InActive</option>
                     </select> 
				  </div>
                </div>
				<div class="form-group">
                  <label for="productDescription" class="col-sm-2 control-label">Upload Image</label>
                  <div class="col-sm-6">
                  	
                  	 <input type="hidden" name="hidden_image" value="<?php if($imgDtl !=''){echo $imgDtl->icw_imgname0317; }?>">
                     <input type="file" name="images" id="images">
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url('product/index');?>" class="btn btn-default col-md-offset-5" id="frmRest">Back</a>
                <button type="submit" class="btn btn-info">Update Product</button>
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
    $('#categoryName').select2({
    	allowClear: true,
    	placeholder:"Select Product",
        width: "100%"
    });
    $('#pTax').select2({
    	allowClear: true,
    	placeholder:"Select Product Tax",
        width: "100%"
    });
});
</script>


