<?php 
include "header.php";
include "sidenav.php";

if(isset($_SESSION['user']) && count($_SESSION['user'])>0){
	$user_id = $_SESSION['user']['admin_user_id'];
	$name = $_SESSION['user']['admin_name'];
	$email = $_SESSION['user']['admin_email'];
	$user_image = $_SESSION['user']['user_image'];
}*/
?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <img src="../vraj1.png" title="logo" alt="logo" height="70">
                            <small>Profile</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-home"></i>  <a href="home.php">Dashboard</a>
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