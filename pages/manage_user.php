<?php 
include "header.php";
include "sidenav.php";
if(!isset($_SESSION['user']) || count($_SESSION['user'])<=0){
		redirect("../index.php");
}

$u_query = "select * from user";
$u_result = mysql_query($u_query,$conn);

if(isset($_REQUEST['msg'])){
		if($_REQUEST['msg']=="approval_success"){
?>
				<div class="alert alert-success">
					<strong><?php echo $msg = "User is Activated!"; ?></strong>
				</div>
<?php
		}else if($_REQUEST['msg']=="approval_failure"){
?>
				<div class="alert alert-warning">
					<strong><?php echo $msg = "User is cannot be Activated!"; ?></strong>
				</div>
<?php
		}else if($_REQUEST['msg']=="disapproval_success"){
?>
				<div class="alert alert-danger">
					<strong><?php echo $msg = "User is Deactivated!"; ?></strong>
				</div>
<?php
		}else if($_REQUEST['msg']=="disapproval_failure"){
?>
				<div class="alert alert-warning">
					<strong><?php echo $msg = "User is cannot be Deacivated!"; ?></strong>
				</div>

<?php
		}
	}
	else
	{
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
							<small>Manage User</small>
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-home"></i>  <a href="home.php">Dashboard</a>
							</li>
							<li class="active">
							<i class="fa fa-user"></i> Manage User
							</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-12">            
						<div class="table-responsive"><!--table  div class-->
						<form action="approve_comment.php" method="post">
						<input type="hidden" name="txtid" value="<?php echo $row['user_id']; ?>" />
					<table class="table table-hover" align="center" ><!--table class-->
						<thead>
						<tr>
							<!-- <th>Photo</th> -->
							<th>Name</th>
							<th>Email</th>
							<th>Gender</th>
							<th nowrap>Contact No</th>
							<th>Shipping Address</th>
							<th>Billing Address</th>
							<th nowrap>Last login</th>
							<th nowrap>Status</th>
							<th nowrap>Change status</th>
						</tr>
						<thead>
						<tbody>
						<?php  while($row = mysql_fetch_array($u_result)) {
									//print "<pre>";
									//print_r($row);die;
									$id=$row['user_id'];
									$name=$row['user_name'];
									$email=$row['user_emailid'];
									$mobileno=$row['user_mobile'];
									$ship_add=$row['user_shipping_addln1'].$row['user_shipping_addln2'];
									$bill_add=$row['user_billing_addln1'].$row['user_billing_addln2'];
									$lastlogin=$row['lastlogin'];
									if($row['user_status']==1)
									{
										$status='<font color="limegreen"><b> ACTIVE</font></b>';
									}
									else
									{
										$status='<font color="crimson"><b>INACTIVE</font></b>';
									}

									$billing_query = "select * from user_billing_address where user_id='$id'";
									$billing_result = mysql_query($billing_query,$conn);
									if(mysql_num_rows($billing_result)>0){
										$billing_row = mysql_fetch_array($billing_result);
										
										$bill_city = $billing_row['bill_city'];
										$bill_pincode = $billing_row['bill_pincode'];

										$bill_address = $billing_row['bill_add1']." ".$billing_row['bill_add2']." ".$bill_city." ".$bill_pincode;

									}
									$shipping_query = "select * from user_shipping_address where user_id='$id'";
									$shipping_result = mysql_query($shipping_query,$conn);
									if(mysql_num_rows($shipping_result)>0){
										$ship_row = mysql_fetch_array($shipping_result);
										$ship_city = $ship_row['ship_city'];
										$ship_pincode = $ship_row['ship_pincode'];

										$ship_address = $ship_row['ship_add1']." ".$ship_row['ship_add2']." ".$ship_city." ".$ship_pincode;
									}
						 ?>
							<tr>
								<td><?php echo strtoupper($name); ?></td>
								<td><?php echo $email; ?></td>
								<td>Female</td>
								<td nowrap><?php echo $mobileno; ?></td>
								<td><?php echo strtoupper($ship_address); ?></td>
								<td><?php echo strtoupper($bill_address); ?></td>
								<td nowrap><?php echo $lastlogin; ?></td>
								<td nowrap><?php echo $status; ?></td>
								<td nowrap>
									<?php 		if($row['user_status']==1) {?>
													<a href="diactivate_user.php?id=<?php echo $row['user_id']; ?>">Deactivate</a>
									<?php		}else{ ?>
													<a href="activate_user.php?id=<?php echo $row['user_id']; ?>">Activate</a>
									<?php 		} ?></a>
								</td>
							</tr>

						<?php } ?>
						</tbody>
					</table>
					</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /#page-wrapper -->
<?php 
include "footer.php";
?>
