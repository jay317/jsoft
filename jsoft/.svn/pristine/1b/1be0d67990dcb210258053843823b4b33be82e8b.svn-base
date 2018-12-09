
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Table</a></li>
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
			  <a href="<?php echo site_url('restaurant/tables');?>" class="btn btn-default btn-js"><i class="fa fa-arrow-left" aria-hidden="true" align="left"></i></a>
			  &nbsp;&nbsp;&nbsp;
			  <?php if($getTableById!=''){ echo "Edit";}else { echo "Add";}?> Table</h2></div>			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if($getTableById!=''){?>
            <form class="form-horizontal" enctype="multipart/form-data" id="addForm" method="post" action="<?php echo site_url('restaurant/tableAddDt');?>?a=update">
            <input type="hidden" name="hidden_id" value="<?php echo $getTableById->icw_restra_id_0317; ?>">
             <?php }else{?>
             <form class="form-horizontal" enctype="multipart/form-data" id="addForm" method="post" action="<?php echo site_url('restaurant/tableAddDt');?>">
             <?php }?>
              <div class="box-body">
                <div class="form-group">
                  <label for="categoryName" class="col-sm-2 control-label">Table No.</label>

                  <div class="col-sm-4">
                    <input type="text" value="<?php if($getTableById){echo $getTableById->icw_restra_tblNo_0317;} ?>" class="form-control" name="tableName" id="tableName" placeholder="Table Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="seats" class="col-sm-2 control-label">No. of seats</label>

                  <div class="col-sm-4">
                    <input type="number" name="seats" class="form-control" id="seats" placeholder="No. of seats" value="<?php if($getTableById){echo $getTableById->icw_restra_seats_0317;}?>">
                  </div>
                </div>
                
                 <div class="form-group">
                  <label for="productDescription" class="col-sm-2 control-label">Upload Image &nbsp;&nbsp;(optional)</label>
                  <div class="col-sm-6">
                     <input type="file" name="images" id="images">
					 <input type="hidden" name="hidden_images" value="<?php if($getTableById){echo $getTableById->icw_restra_img_0317;} ?>">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url('restaurant/tables');?>" class="btn btn-default col-md-offset-4">Back</a>
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
</script>