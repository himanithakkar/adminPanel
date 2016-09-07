<?php 
include "header.php";
include "sidenav.php";
if(!isset($_SESSION['user']) || count($_SESSION['user'])<=0){
		redirect("../index.php");
}
	if(isset($_REQUEST['msg'])){
		if($_REQUEST['msg']=="success"){
?>
				<div class="alert alert-success">
					<strong><?php echo $msg = "Product is added successfully!"; ?></strong>
				</div>
<?php
		}else if($_REQUEST['msg']=="failure"){
?>
				<div class="alert alert-danger">
					<strong><?php echo $msg = "Product is not added!"; ?></strong>
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
							<small>Add Products</small>
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-home"></i>  <a href="home.php">Dashboard</a>
							</li>
							<li class="active">
							Manage Products
							</li>
							 <li class="active">
							 <i class="fa fa-fw fa-edit"></i>
							Add Products
							</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->
			<div class="row">
				<div class="col-lg-1"> </div> 
					<div class="col-lg-6">            
						<div class="table-responsive"><!--table  div class-->
							<form role="form" action="insert_product.php" method="post" >
								<table><!--table class-->
								<tr>
									<td><br /> Product Name :</td> 
									<td><br />
										<input type="text" name="pname" class="form-control">
									</td>	
								</tr>	
								<tr>
										<td>
											Description : 
										</td> 
										<td>
											<br><textarea rows="5" cols="30" name="desc" class="form-control"> </textarea>
										</td>
								</tr>
								<tr>
									<td> <br />
										category :
									</td> 
									<td> <br />
										<select name="category" class="form-control">
											<option value="0"> </option>
										<?php
											$query = "select category_id,name from category";
											$cat_result = mysql_query($query,$conn);
											while($row = mysql_fetch_array($cat_result)){
										?>
												<option value=" <?php echo $row['category_id']; ?>"> <?php echo $row['name']; ?> 
												</option>
										<?php
											}
										?>		</select>
									</td>
								</tr>
								<tr>
									<td><br />
										Status:
									</td>
									<td><br />
										<label>
											<input type="checkbox" name="chkStatus" class="option-input checkbox"/> Active
										</label>
									</td>
								</tr>
								<tr>
									<td><br />
										Price :
									</td>
									<td> <br />
									<!--<div class="form-group has-error">
									   <label class="control-label" for="inputError">Price Cannot Be Left Empty</label>-->
									<input type="text" name="price" class="form-control"></td>
									<!-- </div> -->
								</tr>
								<tr>
										<td><br /><br />
											Upload Image :
										</td>
										<td> <br /><br />
											<input type="file" name="product_image">
										</td>
								</tr>
								<tr>
									<td colspan="2"><br />
											<center><input type="submit" value="Save" class="btn btn-primary btn-lg"></center><br>
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			<div class="col-lg-5">
			<br>
					<img class="img-thumbnail" width="200" height="200" src="<?php if(!$row['product_image']){
									echo "http://placehold.it/200x200";} else{ echo $row['product_image'];
								}?>">
			</div>
			<!-- /.container-fluid -->
		</div>
		</div>
		
		<!-- /#page-wrapper -->
<?php 
include "footer.php";
?>
