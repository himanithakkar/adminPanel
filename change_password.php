<?php 
include "admin_header.php";
include "sidebar.php";
if(isset($_SESSION['user']) && count($_SESSION['user'])>0){
	$uid=$_SESSION['user']['usermaster_id'];
	}
	
if(isset($_REQUEST['msg']))
{
	if($_REQUEST['msg']=="success"){
?>
				<div class="alert alert-success">
                    <strong><?php echo $msg = "Password changed successfully!!"; ?></strong>
                </div>
<?php
		}else if($_REQUEST['msg']=="failure"){
?>
				<div class="alert alert-danger">
                    <strong><?php echo $msg = "Password not changed!"; ?></strong>
                </div>
<?php
	}else{
			$msg = "";
	}
}
?>
       <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <img src="../images/final_logo1.jpg" title="Try* & Buy Logo" alt="Try* & Buy logo" >
                            <small>Dashboard Home</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
							Change Password
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
                    <div class="col-lg-12">
					           
                        <div class="table-responsive"><!--table  div class-->
					<form role="form" action="update_password.php" method="post" style="text-align:center">
					<input type="hidden" name="txtuid" value="<?php echo $uid; ?>" /> 
					<table align="center"><!--table class-->
					
					<tr>
						<td>Old Password:</td>
						 <td>
						<input type="password" name="txtoldpass" class="form-control" placeholder="enter old password" /><br /></td></tr>
					</tr>
					<tr>
						<td>New Password:</td>
						 <td>
						<input type="password" name="txtnewpass" class="form-control" class="form-control-static" placeholder="enter new password"/><br /></td></tr>
					</tr>
					<tr>
						<td>Confirm New Password:</td>
						 <td>
						<input type="password" name="txtcnewpass" class="form-control" class="form-control-static" placeholder="re-enter new password"/><br /></td></tr>
					</tr>
						  <td colspan="2"> <input type="submit" value="Submit" class="btn btn-primary btn-lg"/></td>
					</tr>
				</table>
				</form>

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
