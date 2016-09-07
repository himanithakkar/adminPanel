<?php 
include "header.php";
include "sidenav.php";
if(!isset($_SESSION['user']) || count($_SESSION['user'])<=0){
		redirect("../index.php");
}
$query = "select category_id,name,status from category";
mysql_set_charset('utf8',$conn);
	$result = mysql_query($query,$conn);
	//echo "<pre>";
	//print_r($result);
	//echo "</pre>";die;
	if(isset($_REQUEST['msg'])){
		if($_REQUEST['msg']=="success"){
?>
				<div class="alert alert-danger">
					<strong><?php echo $msg = "Category is deleted successfully!"; ?></strong>
				</div>
<?php
			$msg = "Category is deleted successfully!";
		}else if($_REQUEST['msg']=="failure"){
?>
				<div class="alert alert-warning">
					<strong><?php echo $msg = "Category is not deleted!"; ?></strong>
				</div>
<?php
		}
	}else{
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
							<small>Display Category</small>
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-home"></i>  <a href="home.php">Dashboard</a>
							</li>
							<li class="active">
							Manage Category
							</li>
							<li class="active">
							<i class="fa fa-fw fa-table"></i>
							Display Category
							</li>
						</ol>
					</div>
				</div>
				
				<!-- /.row -->
			<div class="row">
					<div class="col-lg-12">            
						<div class="table-responsive"><!--table  div class-->
					<table class="table table-hover" ><!--table class-->
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Status</th>
							<th><i class="fa fa-fw fa-edit"></i> Edit</th>
							<th><i class="fa fa-trash-o"></i> Delete</th>
						</tr>
						<?php
						while($row = mysql_fetch_array($result)){
							if($row['status']==1){
								$status='<font color="limegreen"><b> ACTIVE</font></b>';
							}
							else{
								$status='<font color="crimson"><b>INACTIVE</font></b>';
							}
						?>
						<tr>

							<td><?php echo $row['category_id']; ?></td>
							<td><?php echo strtoupper($row['name']); ?></td>
							<td><?php echo $status; ?></td>
							<td><a href="edit_category.php?id=<?php echo $row['category_id']; ?>"><i class="fa fa-fw fa-edit"></i> Edit</a></td>
							<td><a onClick="javascript: return confirm('Are you sure you want to delete the category?');" href="delete_category.php?id=<?php echo $row['category_id']; ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
						</tr>
						<?php
						}
						?>
					</table>
				</div>
				</div>
			</div>
			<!-- /.container-fluid -->

		</div>
		</div>
		<!-- /#page-wrapper -->
<?php 
include "footer.php";
?>
