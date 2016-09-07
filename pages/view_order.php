<?php 
include "header.php";
include "sidenav.php";
if(!isset($_SESSION['user']) || count($_SESSION['user'])<=0){
		redirect("../index.php");
}
if(!isset($_REQUEST['order_id']) || !isset($_REQUEST['order_id']))
{
	
	//$user_id = $_SESSION['user']['user_id'];
	$order_id = $_REQUEST['id'];

	$ship_query = "select ship_date from order_master where order_id='$order_id'";
	$ship_result = mysql_query($ship_query,$conn);
	
	$order_query = "select * from order_detail where order_id='$order_id'";
	$order_result = mysql_query($order_query,$conn);
}
	if(isset($_REQUEST['msg'])){
		if($_REQUEST['msg']=="success"){
?>
				<div class="alert alert-success">
					<strong><?php echo $msg = "Order Shipping date updated successfully!"; ?></strong>
				</div>
<?php
		}else if($_REQUEST['msg']=="failure"){
?>
				<div class="alert alert-danger">
					<strong><?php echo $msg = "Order Shipping date not updated!"; ?></strong>
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
							<small>Order Details</small>
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-home"></i>  <a href="home.php">Dashboard</a>
							</li>
							<li class="active">
							<i class="fa fa-shopping-cart"></i><a href="manage_order.php"> Manage Orders</a>
							</li>
							<li class="active">
							<i class="fa fa-list-alt"></i> Order Details
							</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->
					  <table class="table table-hover">
							 <thead>
							<tr>
								<th>Product Image</th>
								<th>Product Name</th>
								<th>User Image</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>SubTotal</th>
							</tr>
							</thead>
							<tbody>
							<?php
								$grand_total = 0;
								while($order_row=mysql_fetch_array($order_result)){
								$product = getProductDetails($order_row['product_id'],$conn);
								$grand_total += $order_row['price'] * $order_row['quantity'];
							?>
								<tr>
									<td>
										<img class="img-thumbnail" height="100" width="100"src="<?php if(!$product['product_image']){
										echo "http://placehold.it/100x100";} else{ echo $product['product_image'];
										}?>"alt="">
									</td>
									<td><?php echo $product['product_name']; ?></td>
									<td>
										<img class="img-thumbnail" height="100" width="100"src="<?php if(!$order_row['user_image']){
										echo "http://placehold.it/100x100";} else{ echo $order_row['user_image'];
										}?>"alt="">
									</td>
									<td><?php echo $order_row['price']; ?> <i class="fa fa-rupee"></i></td>
									<td><?php echo $order_row['quantity']; ?></td>
									<td><?php echo ($order_row['price'] * $order_row['quantity']); ?><i class="fa fa-rupee"></i></td>
								</tr>
							<?php
								}
							?>
							<form role="form" action="update_shipping_date.php" method="post" style="">
								<input type="hidden" name="txtOrderId" value="<?php echo $order_id; ?>" />
							<tr>
								<td><b>Shipping date:</b></td>
								<?php 
									$ship_row=mysql_fetch_array($ship_result);
									if($ship_row['ship_date']=="0000-00-00")
									{
										$show='';
									}
									else
									{
										$ship_date=$ship_row['ship_date'];
										$show=$ship_date; 
									}
								?>
								<td>
									<input type="text" name="txtdate"  value="<?php echo $show;?>" placeholder="YYYY-MM-DD" class="form-control" />
								</td>
								<td>
								
								<input type="submit" value="Set Shipping Date" class="btn btn-primary btn-md" />
								</td>
								<td colspan="2" align="right">Total:</td>
								<td ><b><?php echo $grand_total; ?><i class="fa fa-rupee"></i></b></td>
							</tr>
							</form>
							</tbody>
						</table>
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /#page-wrapper -->
<?php 
include "footer.php";
?>