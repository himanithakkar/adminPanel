<?php 
include "header.php";
include "sidenav.php";
if(isset($_SESSION['user']) && count($_SESSION['user'])>0){
	$uid=$_SESSION['user']['admin_user_id'];
	}
$msg="";
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
							<img src="../vraj1.png" title="logo" alt="logo" height="70">
							<small>Dashboard Home</small>
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-home"></i>  <a href="home.php">Dashboard</a>
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
							   
						<div class="form-group">
					<form role="form" action="update_password.php" method="post" >
					<input type="hidden" name="txtuid" value="<?php echo $uid; ?>" /> 
						<table align="center"><!--table class-->
							<tr>
								<td><br>
									Old Password:
								</td>
								<td><br>
									<input type="password" name="txtoldpass" class="form-control" placeholder="enter old password" />
								</td>
							</tr>
							<tr>
								<td><br>
									New Password:
								</td>
								 <td><br>
									<input type="password" name="txtnewpass" class="form-control" class="form-control-static" placeholder="enter new password" />
								</td>
							</tr>
							<tr>
								<td><br>
									Confirm New Password:&nbsp;
								</td>
								<td><br>
									<input type="password" name="txtcnewpass" class="form-control" class="form-control-static" placeholder="re-enter new password"  />
								</td>
							</tr>
								  <td colspan="2"> <br>
								  	<center>
								  	<input type="submit" value="Submit" href="change_password.php" class="btn btn-primary btn-lg"/>
								  	</center>
								  </td>
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
