<?php 
include "pages/db_conn.php";
$msg="";
$hash="";

if(isset($_REQUEST['hash']))
{
	$hash=$_REQUEST['hash'];
	$query = "select * from admin_user where recovery_hash='$hash' and admin_status=1";
	$result = mysql_query($query,$conn) or die(mysql_error());

	if(mysql_num_rows($result)>0){
		$row = mysql_fetch_array($result);
		$uid = $row['admin_user_id'];
		//echo "hash found"; die();

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
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Vraj Admin Panel</title>
	<link rel="icon" type="img/ico" href="vraj1.ico">
	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="css/sb-admin.css" rel="stylesheet">

	<!-- Morris Charts CSS -->
	<link href="css/plugins/morris.css" rel="stylesheet">

	<!-- Custom Fonts -->
	<link href="font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
<center>

	   <div id="page-wrapper">

			<div class="container-fluid">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							<img src="vraj1.png" title="Logo" alt="logo" height="90">
							<small>Reset Password</small>
						</h1>
					</div>
				</div>
				<!-- /.row -->

				<div class="form-group">
					<form role="form" action="update_reset_pass.php" method="post" >
					<input type="hidden" name="txtuid" value="<?php echo $uid; ?>" />
					<input type="hidden" name="txthash" value="<?php echo $hash; ?>" /> 
						<table align="center"><!--table class-->
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
							</tr>
					</table>
				</form>
			</div>
		</div>
			<!-- /.container-fluid -->
	</div>
</div>
</center>
		<!-- /#page-wrapper -->
<?php 
include "pages/footer.php";
	}else{
		echo $message = "Invalid or expired URL";
	}
}

?>