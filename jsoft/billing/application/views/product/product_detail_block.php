<?php 
$detail_query=$qry['detail_query'];
$image_query=$qry['image_query'];
?>
<div class="">
	<div class="row">
		<div class="col-md-12">
			<h1 style="text-align: center; margin-top: -10px;">
			<?php echo ucfirst($detail_query->icw_pn0317);?>
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-7">
			<table class="prd-div table table-responsive">
				<tr>
					<td width="10%"><strong>Category</strong></td>
					<td><?php echo ucfirst($detail_query->icw_cn0318);?></td>
				</tr>
				<tr>
					<td><strong>SubCategory</strong></td>
					<td><?php echo ucfirst($detail_query->icw_scn0318);?></td>
				</tr>
				<tr>
					<td><strong>Product Code</strong></td>
					<td><?php echo ucfirst($detail_query->icw_pcod0317);?></td>
				</tr>
				<tr>
					<td><strong>Product Bar-Code</strong></td>
					<td><?php echo ucfirst($detail_query->icw_pbcod0317);?></td>
				</tr>
				<tr>
					<td><strong>Product HSN</strong></td>
					<td><?php echo ucfirst($detail_query->icw_phsn0317);?></td>
				</tr>
				<tr>
					<td><strong>Product Price</strong></td>
					<td><?php echo ucfirst($detail_query->icw_prs0317);?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-4">
			<?php if($image_query !='' && $image_query->icw_imgname0317 !=''){?>
				<img width="200px;"
				height="200px;"
				src="<?php echo base_url();?>uploads/product-images/<?php echo $image_query->icw_imgname0317;?>" />
				<figcaption> <?php echo $image_query->icw_imgname0317;?></figcaption>
				<?php }else{?>
				<img width="200px;"
				height="200px;"
				src="<?php echo base_url();?>assets/images/no-image.gif" />
				<?php }?>
			
		</div>
	</div>
	<div class="row">
	<div class="col-md-12">
	<strong>Description:-</strong>
	<p><?php echo ucfirst($detail_query->icw_pd0317);?></p>
	</div>
	</div>	
	</div>
</div>
