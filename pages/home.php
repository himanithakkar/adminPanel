<?php 
include "header.php";
include "sidenav.php";
	if(!isset($_SESSION['user']) || count($_SESSION['user'])<=0){
		redirect("../index.php");
}

$u_query = "select * from user";
$u_result = mysql_query($u_query,$conn);
while($u_row = mysql_fetch_array($u_result)) {
	$total_users=mysql_num_rows($u_result);
}
$o_query = "select * from order_master";
$o_result = mysql_query($o_query,$conn);
while($o_row = mysql_fetch_array($o_result)) {
	$total_orders=mysql_num_rows($o_result);
}
$c_query = "select * from category";
$c_result = mysql_query($c_query,$conn);
while($c_row = mysql_fetch_array($c_result)) {
	$total_category=mysql_num_rows($c_result);
}
$p_query = "select * from product";
$p_result = mysql_query($p_query,$conn);
while($p_row = mysql_fetch_array($p_result)) {
	$total_products=mysql_num_rows($p_result);
}
?>

		<div id="page-wrapper">

			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">
							<img src="../vraj1.png" title="logo" alt="logo" height="70">
							<small>Dashboard</small>
						</h1>
					</div>
				</div>
				<!-- /.row -->
				 <div class="jumbotron">
					<h1>Welcome, <?php echo $_SESSION['user']['admin_name'];?></h1>
					<p> What would you like to do today? </p>
				</div>
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-fw fa-user fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $total_users; ?></div>
										<div>Total Users!</div>
									</div>
								</div>
							</div>
							<a href="manage_user.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-shopping-cart fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $total_orders; ?></div>
										<div>Total Orders!</div>
									</div>
								</div>
							</div>
							<a href="manage_order.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-tasks fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $total_category; ?></div>
										<div>View categores!</div>
									</div>
								</div>
							</div>
							<a href="display_category.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-fw fa-table fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $total_products; ?></div>
										<div>View Products!</div>
									</div>
								</div>
							</div>
							<a href="display_products.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /#page-wrapper -->
<?php 
	include "footer.php";
?>
