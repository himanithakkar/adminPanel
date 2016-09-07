<?php 
include "header.php";
include "sidenav.php";
if(!isset($_SESSION['user']) || count($_SESSION['user'])<=0){
		redirect("../index.php");
}

if(isset($_REQUEST['order_report']) && $_REQUEST['order_report']=="Generate Report")//condition of order reports
{
	$oquery = "select * from order_master where total>0";
	if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!=""){
		$user_id = $_REQUEST['user_id'];
		$oquery .= " and usermaster_id = '$user_id'";
	}
	if(isset($_REQUEST['order_status']) && $_REQUEST['order_status']!=""){
		$order_status = $_REQUEST['order_status'];
		$oquery .= " and status = '$order_status'";
	}
	if(isset($_REQUEST['order_id']) && $_REQUEST['order_id']!=""){
		$order_id = $_REQUEST['order_id'];
		$oquery .= " and order_id = '$order_id'";
	}
	if(isset($_REQUEST['start_date']) && $_REQUEST['start_date']!="" && isset($_REQUEST['end_date']) && $_REQUEST['end_date']!=""){
		$start_date = $_REQUEST['start_date'];
		$end_date = $_REQUEST['end_date'];
		$oquery .= " and odate >= '$start_date' and odate <= '$end_date'";
	}else if(isset($_REQUEST['start_date']) && $_REQUEST['start_date']!="" && (!isset($_REQUEST['end_date']) && $_REQUEST['end_date']=="")){
		$start_date = $_REQUEST['start_date'];
		//$end_date = $_REQUEST['end_date'];
		$oquery .= " and odate >= '$start_date'";
	}else if(isset($_REQUEST['end_date']) && $_REQUEST['end_date']!="" && (!isset($_REQUEST['start_date']) && $_REQUEST['start_date']=="")){
		//$start_date = $_REQUEST['start_date'];
		$end_date = $_REQUEST['end_date'];
		$oquery .= " and odate <= '$end_date'";
	}
	$oresult = mysql_query($oquery,$conn);
	$orow = mysql_fetch_array($oresult); //order reports
}

if(isset($_REQUEST['comment_report']) && $_REQUEST['comment_report']=="Generate Report")//condition of Comment reports
{
	$cquery = "select * from product_comment where comment_id>0 ";
	if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!=""){
		$user_id = $_REQUEST['user_id'];
		$cquery .= " and usermaster_id = '$user_id'";
	}
	if(isset($_REQUEST['comment_status']) && $_REQUEST['comment_status']!=""){
		$comment_status = $_REQUEST['comment_status'];
		$cquery .= " and status = '$comment_status'";
	}
	if(isset($_REQUEST['start_date']) && $_REQUEST['start_date']!="" && isset($_REQUEST['end_date']) && $_REQUEST['end_date']!=""){
		$start_date = $_REQUEST['start_date'];
		$end_date = $_REQUEST['end_date'];
		$cquery .= " and cdate >= '$start_date' and cdate <= '$end_date'";
	}else if(isset($_REQUEST['start_date']) && $_REQUEST['start_date']!="" && (!isset($_REQUEST['end_date']) && $_REQUEST['end_date']=="")){
		$start_date = $_REQUEST['start_date'];
		//$end_date = $_REQUEST['end_date'];
		$cquery .= " and cdate >= '$start_date'";
	}else if(isset($_REQUEST['end_date']) && $_REQUEST['end_date']!="" && (!isset($_REQUEST['start_date']) && $_REQUEST['start_date']=="")){
		//$start_date = $_REQUEST['start_date'];
		$end_date = $_REQUEST['end_date'];
		$cquery .= " and cdate <= '$end_date'";
	}
	if(isset($_REQUEST['product_id']) && $_REQUEST['product_id']!=""){
		$product_id = $_REQUEST['product_id'];
		$cquery .= " and product_id = '$product_id'";
	}
	//echo $cquery;die;
	$cresult = mysql_query($cquery,$conn);
}//end condition of Comment reports
if(isset($_REQUEST['rating_report']) && $_REQUEST['rating_report']=="Generate Report")//condition of rating reports
{
	$rquery = "select * from product_rating where rating_id>0 ";
	if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']!=""){
		$user_id = $_REQUEST['user_id'];
		$rquery .= " and usermaster_id = '$user_id'";
	}
	if(isset($_REQUEST['rating_status']) && $_REQUEST['rating_status']!=""){
		$rating_status = $_REQUEST['rating_status'];
		$rquery .= " and status = '$rating_status'";
	}
	if(isset($_REQUEST['start_date']) && $_REQUEST['start_date']!="" && isset($_REQUEST['end_date']) && $_REQUEST['end_date']!=""){
		$start_date = $_REQUEST['start_date'];
		$end_date = $_REQUEST['end_date'];
		$rquery .= " and rdate >= '$start_date' and rdate <= '$end_date'";
	}else if(isset($_REQUEST['start_date']) && $_REQUEST['start_date']!="" && (!isset($_REQUEST['end_date']) && $_REQUEST['end_date']=="")){
		$start_date = $_REQUEST['start_date'];
		//$end_date = $_REQUEST['end_date'];
		$rquery .= " and rdate >= '$start_date'";
	}else if(isset($_REQUEST['end_date']) && $_REQUEST['end_date']!="" && (!isset($_REQUEST['start_date']) && $_REQUEST['start_date']=="")){
		//$start_date = $_REQUEST['start_date'];
		$end_date = $_REQUEST['end_date'];
		$rquery .= " and rdate <= '$end_date'";
	}
	if(isset($_REQUEST['product_id']) && $_REQUEST['product_id']!=""){
		$product_id = $_REQUEST['product_id'];
		$rquery .= " and product_id = '$product_id'";
	}
	$r_result = mysql_query($rquery,$conn);
}

?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                             <img src="../vraj1.png" title="logo" alt="logo" height="70">
                            <small>View Reports</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="home.php">Dashboard</a>
                            </li>
                            <li class="active">
							<i class="fa fa-list"></i> View Reports
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                         <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Search Report By</h3>
                            </div>
              <div class="panel-body">
				<div class="row">
                   <div class="col-lg-12">	
						<div class="col-sm-4">
                         <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Orders</h3>
                            </div>
							<form name="frmOrderReport" action="view_reports.php" method="post">
                               <div class="form-group">
                                <label></label>
                                <div class="checkbox">&nbsp;&nbsp;&nbsp;
                                    <label>
                                        <input type="checkbox" value=""><input type="text" class="form-control" name="user_id" placeholder="User Id" />
                                    </label>
								</div>
								<div class="checkbox">&nbsp;&nbsp;&nbsp;
									 <label>
                                        <input type="checkbox" value=""><input type="text" name="start_date" class="form-control" placeholder="Start Date (YYYY-MM-DD)" />
									</label>
                        		</div>
								<div class="checkbox">&nbsp;&nbsp;&nbsp;
									 <label>
                                        <input type="checkbox" value=""><input type="text" name="end_date" class="form-control" placeholder="End Date (YYYY-MM-DD)" />
									</label>
                        		</div>
								<div class="checkbox">&nbsp;&nbsp;&nbsp;
									 <label>
                                        <input type="checkbox" value=""><input type="text" name="order_id" class="form-control" placeholder="Order Id" />
                                    </label>
                        		</div>
								<div class="checkbox">&nbsp;&nbsp;&nbsp;
									 <label>
                                        <input type="checkbox" value=""><input type="text" name="order_status" class="form-control" placeholder="Order Status" />
                                    </label>
                        		</div>
                                       <center> <input type="submit" name="order_report" value="Generate Report" class="btn btn-primary btn-lg"/></center>
							</div><!--end of form group -->
						
						</div>
					</div>
					</form>
					<form name="frmCommentReport" action="view_reports.php" method="post">
						<div class="col-sm-4">
                         <div class="panel panel-red">
                            <div class="panel-heading">
                                <h3 class="panel-title">Comments</h3>
                            </div>
                               <div class="form-group">
                                <label></label>
                                <div class="checkbox">&nbsp;&nbsp;&nbsp;
                                    <label>
                                        <input type="checkbox" value=""><input type="text" name="user_id" class="form-control" placeholder="User ID" />
                                    </label>
								</div>
								<div class="checkbox">&nbsp;&nbsp;&nbsp;
									 <label>
                                        <input type="checkbox" value=""><input type="text" name="start_date" class="form-control" placeholder="Start Date (YYYY-MM-DD)" />
                                    </label>
                        		</div>
								<div class="checkbox">&nbsp;&nbsp;&nbsp;
									 <label>
                                        <input type="checkbox" value=""><input type="text" name="end_date" class="form-control" placeholder="End Date (YYYY-MM-DD)" />
									</label>
                        		</div>
								<div class="checkbox">&nbsp;&nbsp;&nbsp;
									 <label>
                                        <input type="checkbox" value=""><input type="checkbox" name="product_id" value=""><input type="text" class="form-control" placeholder="Product ID" />
                                    </label>
                        		</div>
								<div class="checkbox">&nbsp;&nbsp;&nbsp;
									 <label>
                                        <input type="checkbox" value=""><input type="text" name="comment_status" class="form-control" placeholder="Status" />
                                    </label>
                        		</div>
								 <center> <input type="submit" name="comment_report" value="Generate Report" class="btn btn-primary btn-lg"/></center>
							</div>
						</div>
					</div>
					</form>
					<form name="frmRatingReport" action="view_reports.php" method="post">
					<div class="col-sm-4">
                         <div class="panel panel-green">
                            <div class="panel-heading">
                                <h3 class="panel-title">Rating</h3>
                            </div>
                               <div class="form-group">
                                <label></label>
                                <div class="checkbox">&nbsp;&nbsp;&nbsp;
                                    <label>
                                        <input type="checkbox" value=""><input type="text" name="user_id"class="form-control" placeholder="User ID" />
                                    </label>
								</div>
								<div class="checkbox">&nbsp;&nbsp;&nbsp;
									 <label>
                                        <input type="checkbox" value=""><input type="text" name="start_date" class="form-control" placeholder="Start Date (YYYY-MM-DD)" />
                                    </label>
                        		</div>
								<div class="checkbox">&nbsp;&nbsp;&nbsp;
									 <label>
                                        <input type="checkbox" value=""><input type="text" name="end_date" class="form-control" placeholder="End Date (YYYY-MM-DD)" />
									</label>
                        		</div>
								<div class="checkbox">&nbsp;&nbsp;&nbsp;
									 <label>
										<input type="checkbox" value=""><input type="text" name="product_id" class="form-control" placeholder="Product ID" />
                                    </label>
                        		</div>
								<div class="checkbox">&nbsp;&nbsp;&nbsp;
									 <label>
                                        <input type="checkbox" value=""><input type="text" name="rating_status" class="form-control" placeholder="Rating" />
                                    </label>
                        		</div>
								<center> <input type="submit" name="rating_report" value="Generate Report" class="btn btn-primary btn-lg"/></center>
							</div>
						</div>
					</div>
            	</div>
			</div>
		</div>
		</form>
				<?php if(isset($oresult) && mysql_num_rows($oresult)>0){ //start of order reports
							$uid=$orow['usermaster_id'];
							$oid=$orow['order_id'];

							$user_query="select * from user_master where usermaster_id='$uid'";
							$user_result = mysql_query($user_query,$conn);
							$user_row = mysql_fetch_array($user_result);
							
							$bill_query="select * from user_billing_address where usermaster_id='$uid'";
							$bill_result = mysql_query($bill_query,$conn);
							$bill_row = mysql_fetch_array($bill_result);
							
							$ship_query="select * from user_billing_address where usermaster_id='$uid'";
							$ship_result = mysql_query($ship_query,$conn);
							$ship_row = mysql_fetch_array($ship_result);
							
							$odetail_query="select * from order_detail where order_id='$oid'";
							$odetail_result = mysql_query($odetail_query,$conn);
							$odetail_row = mysql_fetch_array($odetail_result);
							
							$count= mysql_num_rows($odetail_result);
							$proatt_id=$odetail_row['prodatt_id'];

							$proatt_query="select * from product_attribute where prodatt_id='$proatt_id'";
							$proatt_result = mysql_query($proatt_query,$conn);
							$proatt_row = mysql_fetch_array($proatt_result);
							
							$pid=$proatt_row['product_id'];
							
							$prod_query="select * from product_master where product_id='$pid'";
							$prod_result = mysql_query($prod_query,$conn);
							$prod_row = mysql_fetch_array($prod_result);
						
							/*while(mysql_num_rows($prod_result)!=0){
								$total=$total+$prod_row['price'];
							}*/
				?>	
				 <div class="table-responsive">
                            <table class="table table-hover">
							 <thead>
							<tr>
								<th>User Name</th>
								<th>Order no</th>
								<th>Order Date</th>
								<th>Status</th>
								<th>Billing address</th>
								<th>Shipping address</th>
								<th>Items</th>
								<th>Total</th>
								<th>View</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td width="20"><?php echo strtoupper($user_row['f_name']." ".$user_row['l_name']); ?></td>
								<td width="15"><?php echo $orow['order_no']; ?></td>
								<td width="40"><?php echo $orow['odate'];?></td>
								<td width="20"><?php echo getOrderStatusName($order_row['status'],$conn); ?></td>
								<td width="30"><?php echo $bill_row['add1'].$bill_row['add2']; ?></td>
								<td width="30"><?php echo $ship_row['add1'].$ship_row['add2']; ?></td>
								<td width="10"><?php echo $count; ?></td>
								<td width="25"><?php echo $orow['total']; ?> <i class="fa fa-rupee"></i> </td>
								<td width="20"><a href="order_detail.php">View details</a></td>
							</tr>
							</tbody>
						</table>
				</div>
				<?php 
					}	//end of order reports
					if(isset($cresult) && mysql_num_rows($cresult)>0){ //start comments reports
							$crow = mysql_fetch_array($cresult); //comments reports
							$uid=$crow['usermaster_id'];
							$pid=$crow['product_id'];
							
							$user_query="select * from user_master where usermaster_id='$uid'";
							$user_result = mysql_query($user_query,$conn);
							$user_row = mysql_fetch_array($user_result);
							
							$prod_query="select * from product_master where product_id='$pid'";
							$prod_result = mysql_query($prod_query,$conn);
							$prod_row = mysql_fetch_array($prod_result);

				?>
						<div class="table-responsive">
                            <table class="table table-hover">
							 <thead>
							<tr>
								<th>User Name</th>
								<th>User Email</th>
								<th>Product Name</th>
								<th>Comment Date</th>
								<th><i class="fa fa-comment"></i> Comment</th>
								<th>Status</th>
								<th>Approve</th>
								<th>Delete</th>
							</tr>
							</thead>
							
							<tbody>
							<tr>
								<td width="20"><?php echo strtoupper($user_row['f_name']." ".$user_row['l_name']); ?></td>
								<td width="15"><?php echo $user_row['email']; ?></td>
								<td width="40"><?php echo $prod_row['name']; ?></td>
								<td width="30"><?php echo $crow['cdate']; ?></td>
								<td width="30"><?php echo $crow['comment']?></td>
								<td width="20">InActive
						<?php 		if($crow['status']==1){
											echo "Active";
									}else{
											echo "InActive";
									}	
						?>
								 </td>
						<?php 		if($crow['status']==1) {?>
<!--										<a href="disapprove_comment.php?id=<?php echo $crow['comment_id']; ?>">Disapprove</a>
-->						<?php		}else{ ?>
										<a href="approve_comment.php?id=<?php echo $crow['comment_id']; ?>">Approve</a>
						<?php 		} ?>
							</td>
							<td><a href="delete_comment.php?id=<?php echo $crow['comment_id']; ?>">Delete</a></td>
						</tr>
							</tr>
							</tbody>
						</table>
					</div>

					<?php	
						}
						if(isset($r_result) && mysql_num_rows($r_result)>0){ //start rating reports
							$r_row = mysql_fetch_array($r_result); //rating reports
							$uid=$r_row['usermaster_id'];
							$pid=$r_row['product_id'];
							
							$user_query="select * from user_master where usermaster_id='$uid'";
							$user_result = mysql_query($user_query,$conn);
							$user_row = mysql_fetch_array($user_result);
							
							$prod_query="select * from product_master where product_id='$pid'";
							$prod_result = mysql_query($prod_query,$conn);
							$prod_row = mysql_fetch_array($prod_result);
				?>
						<div class="table-responsive">
                            <table class="table table-hover">
							 <thead>
							<tr>
								<th>User Name</th>
								<th>User Email</th>
								<th>Product Name</th>
								<th>Rating Date</th>
								<th><i class="fa fa-star"></i> Rating by user</th>
								<th>Average rating</th>
							</tr>
							</thead>
							
							<tbody>
							<tr>
								<td width="20"><?php echo strtoupper($user_row['f_name']." ".$user_row['l_name']); ?></td>
								<td width="15"><?php echo $user_row['email']; ?></td>
								<td width="40"><?php echo $prod_row['name']; ?></td>
								<td width="30"><?php echo $r_row['rdate']; ?></td>
								<td width="30"><?php echo $r_row['rating'];?></td>
								<td width="30"></td>
						</tr>
							</tr>
							</tbody>
						</table>
					</div>
				<?php
					}//end of rating report
				?>
			</center>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php 
include "footer.php";
?>