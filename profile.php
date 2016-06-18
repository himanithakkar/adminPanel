<?php 
include "header.php";
include "sidenav.php";
/*
if(isset($_SESSION['user']) && count($_SESSION['user'])>0){
//	$user_id = $_SESSION['user']['usermaster_id'];
	$first_name = $_SESSION['user']['f_name'];
	$last_name = $_SESSION['user']['l_name'];
	$name = $first_name." ".$last_name;
	$email = $_SESSION['user']['email'];
//	$country = $_SESSION['user']['country'];
//	$state = $_SESSION['user']['state'];
//	$city = $_SESSION['user']['city'];
	$address = $_SESSION['user']['address'];
	$contact = $_SESSION['user']['contactno'];
	$user_image = $_SESSION['user']['user_image'];
}*/
?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <!--<img src="" title="" alt="" > -->
                            <small>Profile</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
								Profile
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
				<div class="row">
					<div class="col-lg-12">
						<table>
							<tr>
								<td>
								<img src="" width="259" <?php // echo $user_image ;?>" alt="<?php echo $name ;?>" /></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								</td>
								<td>
									&nbsp;&nbsp;<h3><b>Name : </b><?php echo $name ;?></h3>
									&nbsp;&nbsp;<p><b>Email : </b><?php echo $email ;?></p>
									&nbsp;&nbsp;<p><b>Gender : </b><?php echo "Female" ;?></p>
									&nbsp;&nbsp;<p><b>Address : </b>5 Adarsh apt,43- B Jagabhai park, near LG hospital, Maninagar, Ahmedabad,India</p>								
									&nbsp;&nbsp;<p><b>Contact Number :</b><?php echo "9825672753";?></p>
								</td>
							</tr>
						</table>
					</div>
				</div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
<?php 
include "footer.php";
?>