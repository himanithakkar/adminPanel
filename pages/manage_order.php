<?php include "header.php";
	  include "sidenav.php";
if(!isset($_SESSION['user']) || count($_SESSION['user'])<=0){
		redirect("../index.php");
}
	if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!="")
		$order_query = "select * from order_master where user_id=".$_REQUEST['user_id']." order by order_date desc";
	else
		$order_query = "select * from order_master order by order_timestamp desc";
	
	$order_result = mysql_query($order_query,$conn);
	
$message = "";

if(isset($_REQUEST['message']))
{
	if($_REQUEST['message']=="success")
	{
?>
		<div class="alert alert-success">
			<strong>
				<?php echo $message = "Current order details has been sent to the customer!"; ?>
			</strong>
		</div>
<?php
	}
	else if($_REQUEST['message']=="failure")
	{
?>
		<div class="alert alert-danger">
			<strong><?php echo $message = "Cannot send order details to customer's e-mail address.Problem with sending email..."; ?>
			</strong>
		</div>
<?php
	}
}else{
			$message = "";
	}

?>




<?php

	if(isset($_REQUEST['msg'])){
		if($_REQUEST['msg']=="success"){
?>
				<div class="alert alert-success">
					<strong><?php echo $msg = "Order status updated successfully!"; ?></strong>
				</div>
<?php
		}else if($_REQUEST['msg']=="failure"){
?>
				<div class="alert alert-danger">
					<strong><?php echo $msg = "Order status not updated!"; ?></strong>
				</div>
<?php
		}
	}else{
			$msg = "";
	}
?>


<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
						 <img src="../vraj1.png" title="logo" alt="logo" height="70">
							Manage Orders
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-home"></i>  <a href="home.php">Dashboard</a>
							</li>
							<li class="active">
								<i class="fa fa-shopping-cart"></i><a href="manage_order.php"> Manage Orders</a>
							</li>
						</ol>
					</div>
				</div>
				<!-- <div class="row">
					<div class="col-lg-12">
						<div class="navbar navbar-default">
		                    <div class="container">
		                        <div class="navbar-header">
		                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		                                <span class="sr-only">Toggle navigation</span>
		                                <span class="icon-bar"></span>
		                                <span class="icon-bar"></span>
		                                <span class="icon-bar"></span>
		                            </button>
		                            
		                        </div>
		                        <div class="navbar-collapse collapse">
		                            <ul class="nav navbar-nav">
			                            <li ><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			                            </a>
		                                </li>
		                                <li class="dropdown">
		                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Order By <b class="caret"></b></a>			
		                                    <ul class="dropdown-menu">
		                                        <li><a href="#">Order Id: Ascending</a>
		                                        </li>
		                                        <li><a href="#">Order Id: Descending</a>
		                                        </li>
		                                        <li><a href="#">Total : High to Low</a>
		                                        </li>
		                                        <li><a href="#">Total : Low to High</a>
		                                        </li>
		                                        <li><a href="#">Order Status</a>
		                                        </li>
		                                        <li><a href="#">Email</a>
		                                        </li>
		                                    </ul>
		                                </li>
		                            </ul>
		                        </div>
                        //nav-collapse 
                    			</div>
                			</div>
						</div>
					</div> -->
				<div class="row">
					<div class="col-lg-12">
						<div class="table-responsive">
						<?php if(mysql_num_rows($order_result)>0){ ?>
							<table class="table t2able-hover">
								<thead>
									<tr>
										<th nowrap>Order ID</th>
										<th nowrap>Order Date/Time</th>
										<th >Name</th>
										<th nowrap>Email</th>
										<th nowrap>Total</th>
										<th nowrap>Order Status</th>
										<th wrap>Billing address</th>
										<th wrap>Shipping address </th>
										<!--<th>Shipping date</th>-->
										<th nowrap>View Details</th>
										<th nowrap>Email</th>
									</tr>
								</thead>
								<tbody>
									<?php
								while($order_row=mysql_fetch_array($order_result)){
									$user_id = $order_row['user_id'];
	
									$name = getUserName($user_id,$conn);
									
									$billing_query = "select * from user_billing_address where user_id='$user_id'";
									$billing_result = mysql_query($billing_query,$conn);
									if(mysql_num_rows($billing_result)>0){
										$billing_row = mysql_fetch_array($billing_result);
										
										$bill_city = $billing_row['bill_city'];
										$bill_pincode = $billing_row['bill_pincode'];

										$bill_address = $billing_row['bill_add1']." ".$billing_row['bill_add2']." ".$bill_city." ".$bill_pincode;

									}
									$shipping_query = "select * from user_shipping_address where user_id='$user_id'";
									$shipping_result = mysql_query($shipping_query,$conn);
									if(mysql_num_rows($shipping_result)>0){
										$ship_row = mysql_fetch_array($shipping_result);
										$ship_city = $ship_row['ship_city'];
										$ship_pincode = $ship_row['ship_pincode'];

										$ship_address = $ship_row['ship_add1']." ".$ship_row['ship_add2']." ".$ship_city." ".$ship_pincode;
									}
							?>
								<tr>
									<td nowrap><?php echo $order_row['order_id']; ?></td>
									<td nowrap><?php echo $order_row['order_timestamp']; ?></td>
									<td ><?php echo getUserName($order_row['user_id'],$conn); ?></td>

									<td nowrap><a href="manage_order.php?user_id=<?php echo $order_row['user_id']; ?>"><?php echo $email=getUserEmail($order_row['user_id'],$conn); ?></a></td>

									<td nowrap><?php echo $order_row['order_total']; ?><i class="fa fa-rupee"></i></td>
									<td nowrap>
										<form role="form" action="update_order_status.php" method="post" style="">
										<input type="hidden" name="txtid" value="<?php echo $order_row['order_id']; ?>" />
											<select name="order_status" class="form-control" onchange="this.form.submit()" style=" width:100px; 
											    
											    white-space:pre; 
											    text-overflow:ellipsis;
											    ;">
										<?php
											$o_query = "select order_status_type,name from order_status";
											$o_result = mysql_query($o_query,$conn);
											while($o_row = mysql_fetch_array($o_result)){
												if($o_row['order_status_type'] == $order_row['order_status_type'])
														$selected = "selected";
													else
														$selected = "";
										?>

													<option value="<?php echo $o_row['order_status_type']; ?>" <?php echo $selected; ?> >  <?php echo $o_row['name']; ?>
													</option>
										<?php
											}
										?>      
											</select>
										</form>
									</td>
									
									<td style="word-wrap:break-word;"><?php echo strtoupper($bill_address);?></td>
									<td style="word-wrap:break-word;"><?php echo strtoupper($ship_address);?></td>
									<?php /*<td>
										<div class='input-group date' id='datetimepicker1'>
											<input type='text' class="form-control" />
												<span class="input-group-addon">
													<span class="glyphicon glyphicon-calendar"></span>
												</span>
										</div>	
										<script type="text/javascript">
											$(function () {
												$('#datetimepicker1').datetimepicker();
											});
										</script>
									</td>*/ ?>
									<td nowrap><a href="view_order.php?id=<?php echo $order_row['order_id'];?>">View Details</a>
									</td>
									<td>
										<?php
											$oid=$order_row['order_id'];
											$email;
										?>
										<a href="email_order_details.php?oid=<?php echo $oid?>&email=<?php echo
										$email?>"><i class="fa fa-envelope fa-lg"></i>
										</a>
									</td>
								</tr>
							<?php
								}
							?>
								</tbody>
							</table>
							<?php }else{ echo "No Orders has been placed yet!"; } ?>
						</div>
					</div>
					</div>
				</div>
				<!-- /.row -->

			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- /#page-wrapper -->
 <?php
	include "footer.php";
 ?>