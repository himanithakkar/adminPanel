<?php 
include "header.php";
include "sidenav.php";

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
						<input type="hidden" name="txtid" value="<?php echo $row['usermaster_id']; ?>" />
					<table class="table table-hover" align="center" ><!--table class-->
						<thead>
						<tr>
							<th>Photo</th>
							<th>Name</th>
							<th>Email</th>
							<th>Gender</th>
							<th>Contact No</th>
							<th>Shipping Address</th>
							<th>Billing Address</th>
							<th>Last login</th>
							<th>Status</th>
							<th>Change status</th>
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
										$status='active';
									}
									else
									{
										$status='inactive';
									}
						 ?>
							<tr>
								<td>
									<img class="img-thumbnail" src="<?php if(!$row['user_image']){
									echo "http://placehold.it/400x400";} else{ echo "../images/user/".$row['user_image'];
								}?>" alt="">
								</td>
								<td><?php echo $name; ?></td>
								<td><?php echo $email; ?></td>
								<td>Female</td>
								<td><?php echo $mobileno; ?></td>
								<td><?php echo $ship_add; ?></td>
								<td><?php echo $bill_add; ?></td>
								<td><?php echo $lastlogin; ?></td>
								<td><?php echo $status; ?></td>
								<td>
									<?php 		if($row['user_status']==1) {?>
													<a href="diactivate_user.php?id=<?php echo $row['user_id']; ?>">Deactivate</a>
									<?php		}else{ ?>
													<a href="activate_user.php?id=<?php echo $row['user_id']; ?>">Activate</a>
									<?php 		} ?></a>
								</td>
							</tr>

						<?php } /*?>
						
						<tr>
							<td><?php echo $row['f_name']." ".$row['l_name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['gender']; ?></td>
							<td><?php echo $row['contactno']; ?></td>
							<td><?php echo $sh_row['add1'].$sh_row['add2']; ?></td>
							<td><?php echo $bl_row['add1'].$bl_row['add2']; ?></td>
							<td><?php echo $status; ?></td>
							<td>
								<?php 		if($row['status']==1) {?>
												<a href="diactivate_user.php?id=<?php echo $row['usermaster_id']; ?>">Deactivate</a>
								<?php		}else{ ?>
												<a href="activate_user.php?id=<?php echo $row['usermaster_id']; ?>">Activate</a>
								<?php 		} ?></a>
							</td>
						</tr>
						<?php 		}
								}
							} */
						?>	
				
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
