<?php

$settingDetails=$this->session->userdata('settingDetails');
$shopType=$settingDetails->icw_shop_type0317;
//$shopType=SHOP_TYPE;
// print_r($optDashboardDataDetails); die;// Genaral Pos dashboardDataDetails
$queryWeekData = $dashboardDataDetails['queryWeekData'];
$userqueryWeekData = $dashboardDataDetails['userqueryWeekData'];
$queryMonthData = $dashboardDataDetails['queryMonthData'];
$userqueryMonthData = $dashboardDataDetails['userqueryMonthData'];
$queryTotalSales = $dashboardDataDetails['queryTotalSales'];
$TotalRegistration = $dashboardDataDetails['TotalRegistration'];
$totalAmtDt = $dashboardDataDetails['totalAmtDt'];
$usertotalAmtDt = $dashboardDataDetails['usertotalAmtDt'];
$todaycashtotalAmtDt = $dashboardDataDetails['todaycashtotalAmtDt'];

// Opt dashboard details
$optqueryWeekData = $optDashboardDataDetails['queryWeekData'];
$optqueryMonthData = $optDashboardDataDetails['queryMonthData'];
$optTotalAmtDt = $optDashboardDataDetails['totalAmtDt'];
$optTotalAdvAmtDt = $optDashboardDataDetails['totalAdvAmtDt'];
$optTotalBalAmtDt = $optDashboardDataDetails['totalBalAmtDt'];

// Tailor dashboard details
$taiqueryWeekData = $taiDashboardDataDetails['queryWeekData'];
$taiqueryMonthData = $taiDashboardDataDetails['queryMonthData'];
$taiTotalAmtDt = $taiDashboardDataDetails['totalAmtDt'];
$taiTotalAdvAmtDt = $taiDashboardDataDetails['totalAdvAmtDt'];
$taiTotalBalAmtDt = $taiDashboardDataDetails['totalBalAmtDt'];

// Tailor dashboard details
$resqueryWeekData = $resDashboardDataDetails['queryWeekData'];
$resqueryMonthData = $resDashboardDataDetails['queryMonthData'];
$resgrandTotalAmtDt = $resDashboardDataDetails['grandTotAmtDt'];
$restodaygrandTotalAmtDt = $resDashboardDataDetails['todaygrandTotAmtDt'];
$restodayTotalOrder = $resDashboardDataDetails['todayTotalOrder'];
$restodayTotalParcel = $resDashboardDataDetails['todayTotalParcel'];

?>

	<section class="content-header">
	<h1>
	<?php echo $page_title?>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
	</section>

	<!-- Main content -->
	<section class="content"> <!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>
						<i class="fa fa-inr"></i>
						<?php 
						if($shopType){
						    switch ($shopType){
						        
						        case 1:
						                if($this->session->userdata("usertype")=='user'){
						                    if($usertotalAmtDt){
						                        echo round($usertotalAmtDt->icw_amtWithTax0317);
						                    }
						                }else{
						                    if($totalAmtDt){
						                        echo round($totalAmtDt->icw_amtWithTax0317);
						                    }else{
						                        echo 0;
						                    }
						                }
								    break;
						        case 2:
						                if($this->session->userdata("usertype")=='user'){
						                    echo 0;
						                }else{
						                    if($optTotalAmtDt){
						                        echo round($optTotalAmtDt->icw_opt_totalAmt0317);
						                    }else{
						                        echo 0;
						                    }
						                }
								    break;
						        case 3:
						                if($this->session->userdata("usertype")=='user'){
						                    echo 0;
						                }else{
						                    if($taiTotalAmtDt){
						                        echo round($taiTotalAmtDt->icw_tai_totalAmt0317);
						                    }else{
						                        echo 0;
						                    }
						                }
								    break;
						        case 4:
						                if($this->session->userdata("usertype")=='user'){
						                    echo 0;
						                }else{
						                    if($resgrandTotalAmtDt){
						                        echo round($resgrandTotalAmtDt->grandTotal);
						                    }else{
						                        echo 0;
						                    }
						                }
						        break;
						    }
						}
						?>
					</h3>
					<p>Total Bussiness</p>
				</div>
				<div class="icon">
					<i class="ion ion-bag"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i
					class="fa fa-arrow-circle-right"></i> </a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>
						<i class="fa fa-inr"></i>
						<?php 
						if($shopType){
						    switch ($shopType){
						        
						        case 1:
            						    if($this->session->userdata("usertype")=='user'){
            						        if($usertotalAmtDt){
            						            echo round($usertotalAmtDt->icw_paidAmount0317);
            						        }
            						    }else{ 
            						        if($totalAmtDt){
            						            echo round($totalAmtDt->icw_paidAmount0317);
            						        }else{
            						            echo 0;
            						        }
            						    }		
            						break;
						        case 2:
						                 if($this->session->userdata("usertype")=='user'){
						                     echo 0;
						                 }else{
						                     if($optTotalAdvAmtDt){
						                         echo round($optTotalAdvAmtDt->icw_opt_advance0317);
						                     }else{
						                         echo 0;
						                     }
						                 }
						            break;
						        case 3:
						                  if($this->session->userdata("usertype")=='user'){
						                      echo 0;
						                  }else{
						                      if($taiTotalAdvAmtDt){
						                          echo round($taiTotalAdvAmtDt->icw_tai_advance0317);
						                      }else{
						                          echo 0;
						                      }
						                  }
						            break;
						        case 4:
						                  if($this->session->userdata("usertype")=='user'){
						                      echo 0;
						                  }else{
						                      if($restodaygrandTotalAmtDt){
						                          echo round($restodaygrandTotalAmtDt->grandTotal);
						                      }else{
						                          echo 0;
						                      }
						                  }
						            break;
						    }
						}
						?>
						
					</h3>
					<p>
					
					<?php 
					if($shopType){
					    switch ($shopType){
					        
					        case 1:
    								echo "Total Collection";
    						      break;
					        case 2:
    								echo "Total Advanced"; 
    							  break;
					        case 3:
    							    echo "Total Advanced";
    							  break;
					        case 4:
    								echo "Today Bussiness";
    							  break;
					    }
					}
						?> 
					</p>
				</div>
				<div class="icon">
					<i class="ion ion-bag"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i
					class="fa fa-arrow-circle-right"></i> </a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>
					<?php
    					if($shopType==4){ 
    					   echo "";    
    					}else{
						  echo '<i class="fa fa-inr"></i>';
						} 
						?>					
						
						<!-- General -->
						<?php 
						if($shopType){
						    switch ($shopType){
						        
						        case 1:  //General
						                  if($this->session->userdata("usertype")=='user'){
						                      if($usertotalAmtDt){
						                          echo round($usertotalAmtDt->icw_balanceAmt0317);
						                      }else{
						                          echo 0;
						                      }
						                  }else{
						                      if($totalAmtDt){
						                          echo round($totalAmtDt->icw_balanceAmt0317);
						                      }else{
						                          echo 0;
						                      }
						                  }
								    break;
								    
						        case 2: //optics
						                  if($this->session->userdata("usertype")=='user'){
						                      echo 0;
						                  }else{
						                      if($optTotalBalAmtDt){
						                          echo round($optTotalBalAmtDt->icw_opt_balance0317);
						                      }else{
						                          echo 0;
						                      }
						                  }
						            break;
						            
						        case 3: //Tailor
						                  if($this->session->userdata("usertype")=='user'){
						                      echo 0;
						                  }else{
						                      if($taiTotalBalAmtDt){
						                          echo round($taiTotalBalAmtDt->icw_tai_balance0317);
						                      }else{
						                          echo 0;
						                      }
						                  }
						              break;
						              
						          case 4: // Restaurnat
						                  if($this->session->userdata("usertype")=='user'){
						                      echo 0;
						                  }else{
						                      if($restodayTotalOrder){
						                          echo $restodayTotalOrder;
						                      }else{
						                          echo 0;
						                      }
						                  }
										break;
						       }
						  } 
						?>
					</h3>
					<p>
							<?php 
							if($shopType){
						          switch ($shopType){
						        
						        case 1:
									       echo "Total Balance";
								     break;
						        case 2:
									       echo "Total Balance";
									 break;
						        case 3:
									       echo "Total Balance";
									break;
						        case 4:
									echo "Today Orders";
								    break;
								 } 
                              }
                            ?>
					</p>
				</div>
				<div class="icon">
					<i class="ion ion-bag"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i
					class="fa fa-arrow-circle-right"></i> </a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>
					<?php				
						if($shopType){
						          switch ($shopType){
						        
						        case 4:
						                  if($this->session->userdata("usertype")=='user'){echo 0;}else{if($restodayTotalParcel){echo $restodayTotalParcel;}else{echo 0;}}
						              break;
						        default:
				                           if($queryTotalSales){echo $TotalRegistration;}
						      } 
                        }
                    ?>
					</h3>
					<p>
						<?php 
						if($shopType){
						    switch ($shopType){
						        
						        case 4:
									   echo "Today Parcel";
								    break;
						        default:
						                 echo "User Registrations";
									break;
						       }
						  }
						?>
						</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i
					class="fa fa-arrow-circle-right"></i> </a>
			</div>
		</div>
		<!-- ./col -->
	</div>
	<!-- /.row --> <!-- Main row -->
	<div class="row">
		<div class="col-md-6">
			<div class="box box-success box-solid ">
				<div class="box-header with-border ">
					<h3 class="box-title">1 Week Sale Report</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool"
							data-widget="collapse">
							<i class="fa fa-plus"></i>
						</button>
					</div>
					<!-- /.box-tools -->
				</div>
				<div class="box-body">
					<table id="datatable_week_data" style="display: none;">
						<thead>
							<tr>
								<th>Day</th>
								<th>Amount</th>

							</tr>
						</thead>
						<tbody>
						<!-- ------------Genaral-- ----------->
						<?php 
						    if($shopType==1){ 								
						          if($this->session->userdata("usertype")=='user'){
							             foreach ($userqueryWeekData as  $data){
							 ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->icw_amtWithTax0317); ?></td>
							</tr>
						<?php }}else{
						       foreach ($queryWeekData as  $data){
						       ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->icw_amtWithTax0317); ?></td>
							</tr>
							<?php }} }?>
							<!-- ------------END-- ----------->
							<!-- ------------OPTICS-- ----------->
							<?php 
							     if($shopType==2){ 
						              if($this->session->userdata("usertype")=='user'){
					                        foreach ($optqueryWeekData as  $data){
					          ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->icw_opt_totalAmt0317); ?></td>
							</tr>
						<?php }}else{
						               foreach ($optqueryWeekData as  $data){
						         ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->icw_opt_totalAmt0317); ?></td>
							</tr>
							<?php }} }?>
							
							<!-- ------------END-- ----------->
							<!-- ------------Tailor-- ----------->
								<?php 
								      if($shopType==3){ 								
						                   if($this->session->userdata("usertype")=='user'){
							                  foreach ($taiqueryWeekData as  $data){
							     ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->icw_tai_totalAmt0317); ?></td>
							</tr>
						<?php }}else{
						              foreach ($taiqueryWeekData as  $data){ 
						          ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->icw_tai_totalAmt0317); ?></td>
							</tr>
							<?php }} }?>
							
							<!-- ------------END-- ----------->
							<!-- ------------Restaurant-- ----------->
								<?php 
								if($shopType==1){ 
						               if($this->session->userdata("usertype")=='user'){
							                  foreach ($resqueryWeekData as  $data){
							      ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->weekgrandTotal); ?></td>
							</tr>
						<?php }}else{
						               foreach ($resqueryWeekData as  $data){ 
						          ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->weekgrandTotal); ?></td>
							</tr>
							<?php }} }?>
							<!-- ------------END-- ----------->
							
						</tbody>
					</table>
					<div id="datatable_week_data_chart"
						style="width: 100%; height: 250px; margin: 0 auto"></div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-warning box-solid ">
				<div class="box-header with-border ">
					<h3 class="box-title">1 Month Sale Report</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool"
							data-widget="collapse">
							<i class="fa fa-plus"></i>
						</button>
					</div>
					<!-- /.box-tools -->
				</div>
				<div class="box-body">
					<table id="datatable_reg_data" style="display: none;">
						<thead>
							<tr>
								<th>Day</th>
								<th>Amount</th>

							</tr>
						</thead>
						<tbody>
						<!-- ------------Genaral-- ----------->
						<?php 
						      if($shopType==1){ 
						              if($this->session->userdata("usertype")=='user'){
										 foreach ($userqueryMonthData as  $data){
							?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->icw_amtWithTax0317); ?></td>
							</tr>
						<?php }}else{
						               foreach ($queryMonthData as  $data){
						           ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->icw_amtWithTax0317); ?></td>
							</tr>
							<?php }} }?>
							<!-- ------------End-- ----------->
							<!-- ------------OPTICS-- ----------->
							<?php 
							         if($shopType==2){ 
						                      if($this->session->userdata("usertype")=='user'){
							                      foreach ($optqueryMonthData as  $data){
							      ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->icw_opt_totalAmt0317); ?></td>
							</tr>
						<?php }}else{
						               foreach ($optqueryMonthData as  $data){
						            ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->icw_opt_totalAmt0317); ?></td>
							</tr>
							<?php }} }?>							
							<!-- ------------End-- ----------->
							<!-- ------------Tailor-- ----------->
							<?php if($shopType==1){ 
						               if($this->session->userdata("usertype")=='user'){
							              foreach ($taiqueryMonthData as  $data){
							    ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->icw_tai_totalAmt0317); ?></td>
							</tr>
						<?php }}else{
									foreach ($taiqueryMonthData as  $data){
								?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->icw_tai_totalAmt0317); ?></td>
							</tr>
							<?php }} }?>
							<!-- ------------End-- ----------->
							<!-- ------------Restaurant-- ----------->
								<?php 
								if($shopType==4){ 								
                						 if($this->session->userdata("usertype")=='user'){
                							 foreach ($resqueryMonthData as  $data){
							       ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->monthgrandTotal); ?></td>
							</tr>
						<?php }}else{
						           foreach ($resqueryMonthData as  $data){ 
						          ?>
							<tr>

								<td><a href="#"><?php echo $data->date ?> </a></td>
								<td><?php echo round($data->monthgrandTotal); ?></td>
							</tr>
							<?php }} }?>
							<!-- ------------END-- ----------->
						</tbody>
					</table>
					<div id="datatable_reg_data_chart"
						style="width: 100%; height: 250px; margin: 0 auto"></div>
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
<script type="text/javascript">

$(document).ready(function(){
getHighChartDashboard('datatable_reg_data','datatable_reg_data_chart','line','',"bg-aqua-active",false);
getHighChartDashboard('datatable_week_data','datatable_week_data_chart','column','',"bg-green",false);

});
</script>

<script>
function getHighChartDashboard(tableid, highchartdiv, charttype, chrttitle,
		barcolors, plotoption) {
	
	barcolors = barcolors;

	$('#' + highchartdiv).highcharts(
			{
				data : {
					table : document.getElementById(tableid)
				},
				chart : {
					// type : 'column'
					backgroundColor : 'transparent',
					className : 'br-r',
					type : charttype,
					zoomType : 'x',
					panning : true,
					panKey : 'shift',
					marginTop : 45,
					marginRight : 1
				},
				exporting : {
					enabled : false
				},

				credits : false,
				colors : barcolors,
				title : {
					text : ' '
				},
				plotOptions : {
					series : {
						borderWidth : 0,
						color:'green',
						dataLabels : {
							enabled : true,
							format : '{point.y}',
							style : {
								fontSize : '11px',
								fontFamily : 'arial'
								
							}
						}
						
					}
				},
				xAxis : {
					labels : {
						rotation : -45,
						align : 'right',
						style : {
							fontSize : '11px',
							fontFamily : 'arial'
						}
					},
					title : {
						text : chrttitle
					}
				},
				yAxis : {
					allowDecimals : false,
					title : {
						text : ' '
					}
				},
				tooltip : {
					formatter : function() {
						return '<b>' + this.series.name + '</b><br/>Rs.'
								+ this.point.y + '  on  ' + this.point.name;
					}
				},
				legend : {
					enabled : true,
					floating : false,
					align : 'right',
					verticalAlign : 'top'
				// y: '-160px'
				}
			});
}

</script>

