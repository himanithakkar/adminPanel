<?php
include "pages/db_conn.php";
$error=0;
//$message = "";
if(isset($_REQUEST['txtEmail'])){
		
		$email = $_REQUEST['txtEmail'];

		$query = "select * from admin_user where admin_email='$email' and admin_status=1";
		$result = mysql_query($query,$conn) or die(mysql_error());

		$rand_pass=rand(1000,9999);
		$rand_hash=md5($rand_pass);

		if(mysql_num_rows($result)>0){

			$rows=mysql_fetch_array($result);
			$pass = $rows['admin_pass'];//FETCHING PASS
			$name = $rows['admin_name'];
			//$pass = md5($pass);
			//echo "your pass is ::".($pass)."";
			$to = $rows['admin_email'];
			//echo "your email is ::".$email;
			//Details for sending E-mail
			
			$from = "Vraj";
			$url = "http://admin.klickpicgo.com/reset_password.php?hash=$rand_hash";
			$body  =  "<html>
							<body>
								<p>
								Dear $name,						
								<br>
								<hr></hr>
									<br>Click on the password recovery link below to reset your password<br>
									<br>Url : $url;
									<br><br>
									Sincerely,<br>
									Team Vraj
								</p>
							</body>
						</html>";
			$from = "no-reply@klickpicgo.com";
			$subject = "Vraj Admin Password recovery";
			$headers1 = "From: $from\n";
			$headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
			$headers1 .= "X-Priority: 1\r\n";
			$headers1 .= "X-MSMail-Priority: High\r\n";
			$headers1 .= "X-Mailer: Just My Server\r\n";

			$sentmail = mail ( $to, $subject, $body, $headers1 );
		} 
		else 
		{
			if ($_POST ['txtEmail'] != "") {
				$error=1;
			$message1 = "Not found your email in our database.";
			}
		}
		//If the message is sent successfully, display sucess message otherwise display an error message.
		if($sentmail==1)
		{
			$error=2;
			$message2 = "Your password recovery link has been sent to your email address.";
			$r_query = "update admin_user set recovery_hash='$rand_hash' where admin_email='$email' and admin_status=1";
			$r_result = mysql_query($r_query,$conn) or die(mysql_error());
		}
		else
		{
			if($_POST['txtEmail']!=""){
				$error=3;
				$message3 = "Cannot send password recovery link to your e-mail address.Problem with sending email...";
			}
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
							<small>Forgot Password</small>
						</h1>
					</div>
				</div>
				<!-- /.row -->
				<div class="form-group">
				<form  name="formForgotPassword" action="forgot_password.php" method="post">
				<label> <i class="fa fa-info-circle fa-lg"></i> We will send you a password recovery link to your registerd email address.</label>
				<br><br>
				<table border='0' align="center">
					<tr>
						<td>
							Email :
						</td>
						<td> 
							<input type="text" placeholder="xyz@example.com" name="txtEmail" class="form-control"> 
						</td>
					</tr>
						<td colspan="2">
						<br><br><center>
						<input type="submit" name="submit" value="Send Recovery Email" class="btn btn-primary btn-lg" ></center>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<center>
							<br><br><a href="index.php"><i class="fa fa-sign-in fa-lg"></i> Login</a>
							</center>
						</td>
					</tr>
				</table>
				<br>
					<?php if(isset($message2) && $error=2){ ?>
						<div class="alert alert-info">
							<i class="fa fa-bars fa-lg"></i> <i class="fa fa-envelope-o fa-lg"></i> <?php echo $message2; ?>
						</div>
					<?php } ?>
					<?php if(isset($message1) && $error=1){  $cnt++;?>
						<div class="alert alert-danger">
							<i class="fa fa-exclamation-triangle fa-lg"></i> <?php echo $message1; ?>
						</div>
					<?php } ?>
					<?php if(isset($message3) && $error=3 && !$cnt){ ?>
						<div class="alert alert-danger">
							<i class="fa fa-exclamation-triangle fa-lg"></i> <?php echo $message3; ?>
						</div>
					<?php } ?>
			</form>
			</div>
				<br>
</div></div></div></center>
<?php
include "pages/footer.php";
?>