<?php 
include "header.php";
include "sidenav.php";

$u_query = "select * from user_master";
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
				<div class="alert alert-danger">
                    <strong><?php echo $msg = "User is cannot be Activated!"; ?></strong>
                </div>
<?php
		}else if($_REQUEST['msg']=="disapproval_success"){
?>
				<div class="alert alert-success">
                    <strong><?php echo $msg = "User is Deactivated!"; ?></strong>
                </div>
<?php
		}else if($_REQUEST['msg']=="disapproval_failure"){
?>
				<div class="alert alert-danger">
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
                            <!--<img src="../images/final_logo1.jpg" title="Try* & Buy Logo" alt="Try* & Buy logo" >-->
                            <small>Manage User</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
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
							<th>Name</th>
							<th>Email</th>
							<th>Gender</th>
							<th>Contact No</th>
							<th>Shipping Address</th>
							<th>Billing Address</th>
							<th>Status</th>
							<th>Change Status</th>
						</tr>
						<thead>
						<tbody>
						<?php while($row = mysql_fetch_array($u_result)) {
									//print "<pre>";
									//print_r($row);die;
									$id=$row['usermaster_id'];
									$sh_query="select add1,add2 from user_shipping_address where usermaster_id='$id'";
									$sh_result=mysql_query($sh_query,$conn);
									$bl_query="select add1,add2 from user_billing_address where usermaster_id='$id'";
									$bl_result=mysql_query($bl_query,$conn);
									
							while($bl_row = mysql_fetch_array($bl_result)) {
							
							while($sh_row = mysql_fetch_array($sh_result)) {
							
								if($row['status']==1)
								{
										$status='active';
								}
								else
								{
										$status='inactive';
								}
						 ?>
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
							} 
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
