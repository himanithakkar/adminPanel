<?php 
include "pages/db_conn.php";

$error=0;
$message = "";
if(isset($_REQUEST['txtEmail']) && isset($_REQUEST['txtPassword'])){
        $email = $_REQUEST['txtEmail'];
        $password = $_REQUEST['txtPassword'];
        $lastlogin=time();
        $query = "select * from admin_user where admin_email='$email' and admin_pass='$password' and admin_status=1";
        $result = mysql_query($query,$conn);
        if(mysql_num_rows($result)>0){
            $row = mysql_fetch_array($result);
            session_start();
            $_SESSION['user'] = $row;
            $user_id=$_SESSION['user']['admin_user_id'];
            $query = "update admin_user set lastlogin ='$lastlogin' where admin_user_id='$user_id'";
            redirect("pages/home.php");

        }else{
            $error=1;
            $message = "Invalid Email or password";
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

    <title>Admin Panel</title>
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
                            <small>Admin Login</small>
                        </h1>
                    </div>
             	</div>
                <!-- /.row -->
				<div class="form-group">
				<form  name="formLogin" action="index.php" method="post" style="text-align:center">
				<?php if($error==1){ ?>
  				<div class="alert alert-danger">
                    <strong>Oh snap! </strong> <?php echo $message; ?>.
                </div>
                <?php } ?>
				<table border='0' align="center">
					<tr>
						<td>Email :</td><td> <input type="text" placeholder="xyz@example.com" name="txtEmail" class="form-control"> </td>
					</tr>
					<tr>
						<td><br> Password :</td><td><br> <input type="password" placeholder="enter your password" name="txtPassword" class="form-control"></td>
					</tr>
					<tr>
						<td colspan="2"><br><input type="submit" name="submit" value="Login" class="btn btn-primary btn-lg" href="pages/home.php" ></td>
					</tr>
					<tr>
						<td colspan="2"><br><a href="#"> Forgot password?</a></td>
					</tr>
				</table>
			</form>
			</div>
				<br>
</div></div></div></center>
<?php
include "pages/footer.php";
?>