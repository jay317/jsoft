
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
            <div class="box-header with-border">
              <div></div>			  
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
				  <div class="col-md-6">
				  <h2 class="box-title">Backup</h2>
					<div class="form-group">
					<p>click on download button for backup of database and it will save in downloads folder.</p>
					   <img src="<?php echo base_url();?>/assets/images/backup.jpg" style="width:250px; height:250px;"/>
					</div>
					<div class="form-group">
					   <a href="<?php echo site_url('tool/backup');?>" style="font-size:30px;" class="btn btn-info">Take Backup &nbsp;
					   <i class="fa fa-download" aria-hidden="true"></i></a>
				    </div>
                  </div>
                  <div class="col-md-4">
                  	<h2 class="box-title">Restore</h2>	
                  	<form action="<?php echo site_url('tool/restore');?>" method="post" name="restore" enctype="multipart/form-data">
	                  	<div class="form-group">
		                  <input type="file" name="sql_file" class="form-control">
		                </div>
		                <?php if(!empty($this->session->flashdata('msg_flash'))){echo $this->session->flashdata('msg_flash');}?>
		                <div class="form-group">
		                  <button type="submit" name="submit" class="btn btn-primary" style="font-size:30px;">Upload &nbsp;<i class="fa fa-upload" aria-hidden="true"></i></button>
		                </div>
	                </form>
				  </div>             
              </div>
          </div>
		  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
