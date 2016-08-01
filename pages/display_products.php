<?php 
include "header.php";
include "sidenav.php";
$query = "select * from product";
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
								<th>Category name</th>
								<th>Price</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
							<?php
							while($row = mysql_fetch_array($result))
							{
							?>
							<tr>
								<td><img class="img-thumbnail" src="<?php if(!$row['product_image']){
									echo "http://placehold.it/400x400";} else{ echo $row['product_image'];
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
								<td><?php echo $cat_row['name'] ?></td>


								<td><?php echo $row['price']; ?>INR</td>
								
								<td><a href="edit_product.php?pid=<?php echo $row['product_id']; ?>">Edit</a></td>
								<td><a href="delete_product.php?pid=<?php echo $row['product_id']; ?>">Delete</a></td>
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
