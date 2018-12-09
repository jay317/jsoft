<?php $settingDetails=$this->session->userdata('settingDetails');
	$shopType=$settingDetails->icw_shop_type0317;
?>
<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu" data-widget="tree">
			<li
				class="<?php if($this->uri->segment(2)=='dashboard'){echo "active";}?>">
				<a href="<?php echo site_url('mainController/dashboard');?>"><i
					class="fa fa-dashboard"></i><span>Dashboard</span></a>
			</li>
			<li
				class="treeview">
				<a href="#"> <i class="fa fa-gears"></i> <span>Settings</span> <span
					class="pull-right-container"> <i
						class="fa fa-angle-down pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" 
				style="display:<?php if($this->uri->uri_string()=='mainController/general_setting'
			 	|| $this->uri->uri_string()=='mainController/profile'
 				|| $this->uri->uri_string()=='mainController/user'
 				|| $this->uri->uri_string()=='mainController/template'
 				  ){echo "block";}?>">
							<?php if($_SESSION['usertype']=='admin'){?>
					<li><a href="<?php echo site_url('mainController/general_setting');?>" style="color:<?php if($this->uri->uri_string()=='mainController/general_setting'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>General Settings</a></li><?php }?>
					<li><a href="<?php echo site_url('mainController/profile');?>" style="color:<?php if($this->uri->uri_string()=='mainController/profile'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Profile Settings</a></li>
							<?php if($_SESSION['usertype']=='admin'){?>
					<li><a href="<?php echo site_url('mainController/user');?>" style="color:<?php if($this->uri->uri_string()=='mainController/user'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Admin Users</a></li><?php }?>
							<?php if($_SESSION['usertype']=='admin' && SHOP_TYPE==2 || SHOP_TYPE==3){?>
					<li><a href="<?php echo site_url('mainController/template');?>" style="color:<?php if($this->uri->uri_string()=='mainController/template'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Templates</a></li><?php }?>
				</ul>
			</li>
			
			
			<!---- General shop -->
			<?php 
 				//if(SHOP_TYPE ==1){
			     if($shopType==1){
			    ?> 
			<li
				class="treeview">
				<a href="#"> <i class="fa fa-cart-plus"></i> <span>Product</span> <span
					class="pull-right-container"> <i
						class="fa fa-angle-down pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" style="display:<?php if($this->uri->segment(1)=='Category' || $this->uri->segment(1)=='product'){echo "block";}?>">					
					<li><a href="<?php echo site_url('Category/index');?>" style="color:<?php if($this->uri->uri_string()=='Category/index'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Products Category list</a></li>
					<li><a href="<?php echo site_url('Category/productSubCat');?>" style="color:<?php if($this->uri->uri_string()=='Category/productSubCat'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Products Sub Category list</a></li>
					<li><a href="<?php echo site_url('product/index');?>" style="color:<?php if($this->uri->uri_string()=='product/index'){echo "black";}?>"><i
							class="fa fa-circle-o"></i> Products list</a></li>
					<li><a href="<?php echo site_url('product/proTax');?>" style="color:<?php if($this->uri->uri_string()=='product/proTax'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Products Tax</a></li>
				</ul>
			</li>
			<li
				class="<?php if($this->uri->uri_string()=='sale/index'){echo "active";}?> treeview">
				<a href="#"> <i class="fa fa-shopping-bag"></i> <span>Sale</span> <span
					class="pull-right-container"> <i
						class="fa fa-angle-down pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo site_url('pos/index');?>"><i
							class="fa fa-circle-o"></i>Generate Bill</a></li>
					<li><a href="<?php echo site_url('sale/invoiceGenerate');?>"><i
							class="fa fa-circle-o"></i>Generate Invoice</a></li>
				</ul>
			</li>
			<li
				class="treeview">
				<a href="#"> <i class="fa fa-group"></i> <span>Client</span> <span
					class="pull-right-container"> <i
						class="fa fa-angle-down pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" style="display:<?php if($this->uri->segment(1)=='client'){echo "block";}?>">
					<li><a href="<?php echo site_url('client/index');?>"><i
							class="fa fa-circle-o"></i>Clients</a></li>
				</ul>
			</li>
		<?php if($_SESSION['usertype']=='admin'){?>
         <li class="treeview"><a href="#"> <i class="fa fa fa-bar-chart"></i>
					<span>Report</span> <span class="pull-right-container"> <i
						class="fa fa-angle-down pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" style="display:<?php if($this->uri->segment(1)=='report'){echo "block";}?>">
					<li><a href="<?php echo site_url('report/invoice_report');?>" style="color:<?php if($this->uri->uri_string()=='report/invoice_report'){echo "black";}?>"><i
							class="fa fa-bar-chart"></i> Invoice</a></li>
					<li><a href="<?php echo site_url('report/reports');?>" style="color:<?php if($this->uri->uri_string()=='report/reports'){echo "black";}?>"><i
							class="fa fa-bar-chart"></i> Summary Report</a></li>
				</ul>
		 </li>			
		<?php } ?>
		<?php if($_SESSION['usertype']=='admin'){?>
         <li class="treeview"><a href="#"> <i class="fa fa fa-xing"></i>
					<span>Inventory</span> <span class="pull-right-container"> <i
						class="fa fa-angle-down pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" style="display:<?php if($this->uri->segment(1)=='inventory'){echo "block";}?>">
					<li><a href="<?php echo site_url('inventory/supplier');?>" style="color:<?php if($this->uri->uri_string()=='inventory/supplier'){echo "black";}?>"><i
							class="fa fa-bar-chart"></i>Supplier</a></li>
					<li><a href="<?php echo site_url('inventory/getStock');?>" style="color:<?php if($this->uri->uri_string()=='inventory/getStock'){echo "black";}?>"><i
							class="fa fa-bar-chart"></i> Stock</a></li>
					<!--  <li><a href="<?php echo site_url('inventory/getProStock');?>" style="color:<?php if($this->uri->uri_string()=='inventory/getProStock'){echo "black";}?>"><i
							class="fa fa-bar-chart"></i> Product2 Stock</a></li> -->
				</ul>
		 </li>			
		<?php } ?>
			<?php } ?>
			<!-- End General shop -->
			
			<!--- Optics shop -->
			<?php 
 				//if(SHOP_TYPE ==2){
			     if($shopType==2){
			    ?>  
			<li class="treeview">
				<a href="#"> <i class="fa fa-shopping-bag"></i> <span>Optics</span> <span
					class="pull-right-container"> <i
						class="fa fa-angle-down pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" style="display:<?php if($this->uri->segment(1)=='optics'){echo "block";}?>">
					<?php if($_SESSION['usertype']=='admin'){?>
					<li><a href="<?php echo site_url('optics/order');?>" style="color:<?php if($this->uri->uri_string()=='optics/order'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Make Order</a></li>
					<li><a href="<?php echo site_url('optics/orderList?list_type=shop');?>" style="color:<?php if($this->uri->uri_string()=='optics/orderList?list_type=shop'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Order List</a></li>
						<?php } ?>
					<li><a href="<?php echo site_url('optics/orderList?list_type=lab');?>" style="color:<?php if($this->uri->uri_string()=='optics/orderList?list_type=lab'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Order Lab List</a></li>
					<li><a href="<?php echo site_url('optics/invoice_list');?>" style="color:<?php if($this->uri->uri_string()=='optics/invoice_list'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Invoice</a></li>
				</ul>
			</li>
			<?php } ?>
			<!-- End Optics shop -->
			
			<!-- Start Optics shop -->
			<?php 
 				//if(SHOP_TYPE ==3){
			     if($shopType==3){
			    ?>  
			<li class="treeview">
				<a href="#"> <i class="fa fa-shopping-bag"></i> <span>Tailor</span> <span
					class="pull-right-container"> <i
						class="fa fa-angle-down pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" style="display:<?php if($this->uri->segment(1)=='tailor'){echo "block";}?>">
				<?php if($_SESSION['usertype']=='admin'){?>
					<li><a href="<?php echo site_url('tailor/order');?>" style="color:<?php if($this->uri->uri_string()=='tailor/order'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Make Order</a></li>
					<li><a href="<?php echo site_url('tailor/orderList?list_type=shop');?>" style="color:<?php if($this->uri->uri_string()=='tailor/order'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Order List</a></li>
				<?php } ?>
					<li><a href="<?php echo site_url('tailor/orderList?list_type=lab');?>" style="color:<?php if($this->uri->uri_string()=='tailor/order'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Order Lab List</a></li>
					<li><a href="<?php echo site_url('tailor/invoice_list');?>" style="color:<?php if($this->uri->uri_string()=='tailor/order'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Invoice</a></li>
				</ul>
			</li>
			<?php } ?>
			<!-- End -->
			
			<!-- Start Restaurant shop -->
			<?php 
 				//if(SHOP_TYPE ==4){
			     if($shopType==4){
			    ?> 
			<li
				class="treeview">
				<a href="#"> <i class="fa fa-cart-plus"></i> <span>Product</span> <span
					class="pull-right-container"> <i
						class="fa fa-angle-down pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu">					
					<li><a href="<?php echo site_url('Category/index');?>"><i
							class="fa fa-circle-o"></i>Products Category list</a></li>
					<li><a href="<?php echo site_url('Category/productSubCat');?>"><i
							class="fa fa-circle-o"></i>Products Sub Category list</a></li>
					<li><a href="<?php echo site_url('product/index');?>"><i
							class="fa fa-circle-o"></i> Products list</a></li>
					<li><a href="<?php echo site_url('product/proTax');?>"><i
							class="fa fa-circle-o"></i>Products Tax</a></li>
				</ul>
			</li>
								
			<li
				class="treeview">
				<a href="#"> <i class="fa fa-glass"></i> <span>Restaurant</span> <span
					class="pull-right-container"> <i
						class="fa fa-angle-down pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" style="display:<?php if($this->uri->segment(1)=='restaurant'){echo "block";}?>">
					<li><a href="<?php echo site_url('restaurant/');?>" style="color:<?php if($this->uri->uri_string()=='restaurant/'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Make Order</a></li>
					<li><a href="<?php echo site_url('restaurant/tables');?>" style="color:<?php if($this->uri->uri_string()=='restaurant/tables'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Table</a></li>
					<li><a href="<?php echo site_url('restaurant/orderList?list_type=kit');?>" style="color:<?php if($this->uri->uri_string()=='restaurant/orderList?list_type=kit'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Kitchen View</a></li>
					<li><a href="<?php echo site_url('restaurant/report');?>" style="color:<?php if($this->uri->uri_string()=='restaurant/report'){echo "black";}?>"><i
							class="fa fa-circle-o"></i>Report</a></li>
				</ul>
			</li>
			<?php } ?>
			<!-- End -->
			
			
		<li class="treeview">
				<a href="#"> <i class="fa fa-cog"></i> <span>Tool</span> <span
					class="pull-right-container"> <i
						class="fa fa-angle-down pull-right"></i>
				</span>
			</a>
				<ul class="treeview-menu" style="display:<?php if($this->uri->segment(1)=='tool'){echo "block";}?>">
					<li><a href="<?php echo site_url('tool/license');?>" target="_blank"><i
							class="fa fa-circle-o"></i>License</a></li>
					<li><a href="<?php echo site_url('tool/backup_restore');?>" style="display:<?php if($this->uri->uri_string()=='tool/backup_restore'){echo "block";}?>"><i
							class="fa fa-circle-o"></i>Backup & Restore</a></li>
				</ul>
			</li>
      </ul>
	</section>
	<!-- /.sidebar -->
</aside>