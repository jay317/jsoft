<?php if($previousItems){?>
<div class="p20"><button type="button" class="btn btn-success btn-order" onclick="makeOrder()">Make a Order</button>
</div>
<br/>

<table class="table table-bordered">
	<tbody>
		<tr>
			<th style="width: 10px">#</th>
			<th style="width:130px">Name</th>
			<th style="width:130px">Quantity</th>
			<th style="width:80px">Remove</th>
		</tr>
                <?php
                $i=1;
                foreach ($previousItems as $key => $val) {
                    ;
                    ?>
                <tr>
			<td><?php echo $i++;?></td>
			<td><?php echo substr($val['item_name'],0,15);?></td>

			<td>
				<div class="input-group col-md-6">
					<div class="input-group-btn">
						<button id="remove_item" type="
							button" class="btn btn-success" onclick="reitem(<?php echo $val['item_id'];?>)">
							<i class="fa fa-minus"></i>
						</button>
					</div>
					<input class="form-control" placeholder="Type message..."
						name="item_quantity" id="item_quantity<?php echo $val['item_id'];?>"
						value=" <?php echo $val['item_qty'];?>" style="width: 50px;">

					<div class="input-group-btn">
						<button type="button" class="btn btn-success"
							onclick="additem(<?php echo $val['item_id'];?>)">
							<i class="fa fa-plus"> </i>
						</button>
					</div>
				</div> <span onclick="removeFun(<?php echo $val['item_id'];?>)"
				class=" badgebg-red"></span>
			</td>
			<td><button onclick="removeFun(<?php echo $val['item_id'];?>)"
					type="
							button" class="btn btn-danger">X</button></td>
		</tr>
                <?php }?>
              </tbody>
	<tfoot>
		
	</tfoot>
</table>
<?php } ?>
