<?php 
include "header.php";
include "sidenav.php";
if(!isset($_SESSION['user']) || count($_SESSION['user'])<=0){
		redirect("../index.php");
}
$query = "select * from product";
mysql_set_charset('utf8',$conn);
	$result = mysql_query($query,$conn);


	if(isset($_REQUEST['msg'])){
			if($_REQUEST['msg']=="success"){
?>
				<div class="alert alert-danger">
					<strong><?php echo $msg = "Product is deleted successfully!"; ?></strong>
				</div>
<?php
		}else if($_REQUEST['msg']=="failure"){
?>
				<div class="alert alert-warning">
					<strong><?php echo $msg = "Product is not deleted!"; ?></strong>
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
							<small>Display Products</small>
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-home"></i>  <a href="home.php">Dashboard</a>
							</li>
							<li class="active">
							Manage Products
							</li>
							<li class="active">
							<i class="fa fa-fw fa-table"></i>
							Display Products
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
								<th>Photo</th>
								<th>Name</th>
								<th>Description</th>
								<th nowrap>Category name</th>
								<th nowrap>Price</th>
								<th nowrap>Status</th>
								<th nowrap><i class="fa fa-fw fa-edit"></i> Edit</th>
								<th nowrap><i class="fa fa-trash-o"></i> Delete</th>
							</tr>
							<?php
							while($row = mysql_fetch_array($result))
							{
								if($row['product_status']==1){
								$status='<font color="limegreen"><b> ACTIVE</font></b>';
							}
							else{
								$status='<font color="crimson"><b>INACTIVE</font></b>';
							}
							?>
							<tr>
								<td><img class="img-thumbnail" width="100" height="100" src="<?php if(!$row['product_image']){
									echo "http://placehold.it/200x200";} else{ echo $row['product_image'];
								}?>"alt="">
								</td>
								<td><?php echo strtoupper($row['product_name']); ?></td>
								<td><?php echo $row['product_desc']; ?></td>

						<?php
							$cat_id=$row['category_id'];
							$cat_query = "select name from category where category_id=$cat_id";
							$cat_result = mysql_query($cat_query,$conn);
							$cat_row = mysql_fetch_array($cat_result)
						?>
								<td nowrap><?php echo $cat_row['name'] ?></td>


								<td nowrap><?php echo $row['price']; ?><i class="fa fa-rupee"></i></td>
								<td nowrap><?php echo $status; ?></td>
								<td nowrap><a href="edit_product.php?pid=<?php echo $row['product_id']; ?>"><i class="fa fa-fw fa-edit"></i> Edit</a></td>
								<td nowrap><a onClick="javascript: return confirm('Are you sure you want to delete the product?');" href="delete_product.php?pid=<?php echo $row['product_id']; ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
							</tr>
							<?php
							}
							?>
							</table>

						</div>
</center>
			</div>
			<!-- /.container-fluid -->

		</div>
		<!-- /#page-wrapper -->
<?php 
include "footer.php";
?>
