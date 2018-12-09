
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Category</a></li>
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
			  <a href="<?php echo site_url('Category/productSubCat');?>" class="btn btn-default btn-js"><i class="fa fa-arrow-left" aria-hidden="true" align="left"></i></a>
			  &nbsp;&nbsp;&nbsp;
			  <?php if($getPsubcatById!=''){ echo "Edit";}else { echo "Add";}?> Product Sub Category</h2></div>			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if($getPsubcatById!=''){?>
            <form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('Category/addProductsubCat');?>?a=update">
            <input type="hidden" name="hidden_id" value="<?php echo $getPsubcatById->icw_sci0317; ?>">
             <?php }else{?>
             <form class="form-horizontal" id="addForm" method="post" action="<?php echo site_url('Category/addProductsubCat');?>">
             <?php }?>
              <div class="box-body">
				<div class="form-group">
                  <label for="categoryName" class="col-sm-2 control-label">Category Name*</label>

                  <div class="col-sm-8">
                    <select class="form-control" name="categoryName" id="categoryName" required="required">
					<option value="">Select Category</option>
				<?php	foreach ($getPcat->result() as $row){ ?>
					<option value="<?php echo $row->icw_ci0317; ?>" <?php if($getPsubcatById){ if($getPsubcatById->icw_fk_ci0317==$row->icw_ci0317){echo " selected"; }}?>><?php echo $row->icw_cn0318; ?> </option>
				<?php } ?>
					</select>
                  </div>
                </div>
				
                <div class="form-group">
                  <label for="subcategoryName" class="col-sm-2 control-label">Sub Category Name</label>

                  <div class="col-sm-8">
                    <input type="text" value="<?php if($getPsubcatById){echo $getPsubcatById->icw_scn0318;} ?>" class="form-control" name="subcategoryName" id="subcategoryName" placeholder="Product Sub Category Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="categoryDescription" class="col-sm-2 control-label">Sub Category Description</label>

                  <div class="col-sm-8">
                    <textarea name="subcategoryDescription" class="form-control" id="subcategoryDescription" placeholder="Product Sub Category Description"> <?php if($getPsubcatById){echo $getPsubcatById->icw_scd0319;}?></textarea>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label for="categoryDescription" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-8">
					 <select name="isactive" class="form-control">					 
					  <option value="1" <?php if($getPsubcatById){ if($getPsubcatById->icw_isa0320==1){echo " selected"; }}?> >Active</option>
					  <option value="0" <?php if($getPsubcatById){if($getPsubcatById->icw_isa0320==0){echo " selected"; }}?> >InActive</option>
                     </select> 
				  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url('Category/productSubCat');?>" class="btn btn-default col-md-offset-4">Back</a>
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
    CKEDITOR.replace('categoryDescription')
    $('.textarea').wysihtml5()
  });
</script>