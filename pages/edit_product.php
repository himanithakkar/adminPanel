<?php 
include "header.php";
include "sidenav.php";
if(!isset($_SESSION['user']) || count($_SESSION['user'])<=0){
		redirect("../index.php");
}
	if(isset($_REQUEST['pid'])){
		$id = $_REQUEST['pid'];
							
		$query = "select * from product where product_id=$id";
		$result = mysql_query($query,$conn);
		$row = mysql_fetch_array($result);
		if($row['product_status']==1){
		$checked = "checked";
		}else{
			$checked = "";
		}
	}
	if(isset($_REQUEST['msg'])){
		if($_REQUEST['msg']=="success"){
?>
				<div class="alert alert-success">
					<strong><?php echo $msg = "Product is editted successfully!"; ?></strong>
				</div>
<?php
		}else if($_REQUEST['msg']=="failure"){
?>
				<div class="alert alert-danger">
					<strong><?php echo $msg = "Product is not editted!"; ?></strong>
				</div>
<?php
		}
	}else{
			$msg = "";
	}
?>
		<div id="page-wrapper">
-
			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="row">
					<div class="col-lg-12">

						<h1 class="page-header">
							<img src="../vraj1.png" title="logo" alt="logo" height="70">
							<small>Edit Product</small>
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
							<a href="display_products.php">Display Products</a>
							</li>
							<li class="active">
							<i class="fa fa-fw fa-edit"></i>
							Edit Products
							</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->
			<div class="row">
				<div class="col-lg-1"> </div> 
					<div class="col-lg-6"> 
					           
						<div class="table-responsive"> <!--table  div class-->
							<form role="form" action="update_product.php" method="post" >
								<input type="hidden" name="pid" value="<?php echo $id; ?>" />
								<div class="form-group">
		
									<table ><!--table class-->
									<tr>
											<td>
												<br />Product Id :
											</td> 
											<td> <br />
												<?php echo $row['product_id']; ?>	
											</td>
									</tr>
									<tr>
										<td> <br />
											Product Name :
										</td> 
										<td> <br />
											<input type="text" name="pname" class="form-control" value="<?php echo $row['product_name']; ?>">
										</td>
									</tr>
									<tr>
											<td><br>Description:</td> 
											<td> <br>
												<textarea rows="5" cols="30" class="form-control" name="desc">
												<?php echo $row['product_desc']; ?>
												</textarea>
											</td>
									</tr>
									<tr>
										<td> 
											<br />category : 
										</td> 
										<td><br>
											<select name="category" class="form-control">
											<?php
												$query = "select category_id,name from category";
												$cat_result = mysql_query($query,$conn);
												while($cat_row = mysql_fetch_array($cat_result)){
													if($cat_row['category_id'] == $row['category_id'])
														$selected = "selected";
													else
														$selected = "";
											?>

													<option value="<?php echo $cat_row['category_id']; ?>" <?php echo $selected; ?>>  <?php echo $cat_row['name']; ?> 
													</option>
											<?php
												}
											?>		
											</select>
										</td>
									</tr>
									<tr>
										<td><br>
											Status:
										</td>
										<td><br>
											<label><input type="checkbox" name="chkStatus" class="option-input checkbox" <?php echo $checked; ?> />Active<label>
										</td>		
									</tr>
									<tr>
										<td><br />
											Price :
										</td> 
										<td> <br />
												<input type="text" name="price" value="<?php echo $row['price']; ?>" class="form-control"> 
										</td>
									</tr>
									<tr>
										<td><br><br>
											Product Image:&nbsp;&nbsp;
										</td>
										<td><br>
											<img src="../uploaded_images/product/<?php echo $row['product_image'];?>" /><input type="file" name="product_image" />
										</td>
									<tr>
										<td colspan="2"><br />
											<center><input type="submit" value="Save" class="btn btn-primary btn-lg"></center>
										</td>
									</tr>
									</table>
								</div>
							</form>
	
					</div>
				</div>
				<div class="col-lg-5">
					<br><br>
					<img class="img-thumbnail" width="200" height="200" src="<?php if(!$row['product_image']){
									echo "http://placehold.it/200x200";} else{ echo $row['product_image'];
								}?>">
				</div>
			</div>
			<!-- /.container-fluid -->
		</div>
		</div>
		<!-- /#page-wrapper -->
<?php
include "footer.php";
?>