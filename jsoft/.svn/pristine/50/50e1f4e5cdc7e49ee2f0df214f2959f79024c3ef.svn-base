
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $page_title;?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Servitor</a></li>
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
			  <?php if($getServitorById!=''){ echo "Edit";}else { echo "Add";}?> Servitor</h2></div>			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if($getServitorById!=''){?>
            <form class="form-horizontal" enctype="multipart/form-data" id="addForm" method="post" action="<?php echo site_url('restaurant/servitorAddDt');?>?a=update">
            <input type="hidden" name="hidden_id" value="<?php echo $getServitorById->icw_restra_id_0317; ?>">
             <?php }else{?>
             <form class="form-horizontal" enctype="multipart/form-data" id="addForm" method="post" action="<?php echo site_url('restaurant/servitorAddDt');?>">
             <?php }?>
              <div class="box-body">
                <div class="form-group">
                  <label for="categoryName" class="col-sm-2 control-label">Servitor No.</label>

                  <div class="col-sm-4">
                    <input type="Number" value="<?php if($getServitorById){echo $getServitorById->icw_restra_serNo_0317;} ?>" class="form-control" name="sno" id="sno" placeholder="Servitor No." required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="sname" class="col-sm-2 control-label">Servitor Name</label>

                  <div class="col-sm-4">
                    <input type="text" name="sname" class="form-control" id="sname" placeholder="Servitor Name" value="<?php if($getServitorById){echo $getServitorById->icw_restra_serName_0317;}?>">
                  </div>
                </div>
                
                 <div class="form-group">
                  <label for="productDescription" class="col-sm-2 control-label">Upload Image &nbsp;&nbsp;(optional)</label>
                  <div class="col-sm-6">
                     <input type="file" name="images" id="images">
					 <input type="hidden" name="hidden_images" value="<?php if($getServitorById){echo $getServitorById->icw_restra_img_0317;} ?>">
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
$(function () {
    CKEDITOR.replace('categoryDescription')
    $('.textarea').wysihtml5()
  });
</script>