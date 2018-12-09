<?php 
$fltr=$filter['result'];
$typ=$filter['typ'];
$id=$filter['id'];

?>
		
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header"
			style="background-color: green; color: #ffffff;">
			<center>
				<h4>
					<strong>
					<?php
    					if($typ=='t'){
    					    echo "Table no-" .$id;
        					}elseif($typ=='s'){
        					    echo "Servitor no-" .$id;       					   
        					}elseif($typ=='p'){
        					    echo "Parcel no-" .$id;
        					}
        			?>
					
					</strong>
				</h4>
			</center>
			<button type="button" class="close" data-dismiss="modal"
				aria-hidden="true">
				<i class="fa fa-times" aria-hidden="true"></i>
			</button>
		</div>
		<div class="modal-body">
		<?php if($fltr){ ?>
			<table class="table">
				<tr>
					<th>Date</th>
					<th>Invoice No.</th>
					<th>
					<?php 
    					if($typ=='t'){
    					    echo "Servitor no.";
        					}elseif($typ=='s'){
        					    echo "Table/Parcel no.";       					   
        					}
        			?>
    				</th>
					<th>Amount</th>
				</tr>
				<?php foreach($fltr as $fil){?>
				<tr>
					<td><?php echo $fil->date;?></td>
					<td><?php echo $fil->invono;?></td>
					<td>
					<?php 
    					if($typ=='t'){
    					    echo $fil->servno;
    					}elseif($typ=='s'){
    					    echo $fil->tblno;
    					}					
					?>
					</td>
					<td><?php echo $fil->payamt;?></td>
				</tr>
				<?php } ?>
			</table>
		<?php } else{ echo "No record available.";}?>
</div>
	</div>
	<!-- /.modal-dialog -->
</div>