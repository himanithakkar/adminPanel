<?php 
include "header.php";
include "sidenav.php";
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
                            <img src="vraj1.png" title="logo" alt="logo" height="70">
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
							Add Products
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
	 		<div class="row">
                    <div class="col-lg-12">            
                        <div class="table-responsive"><!--table  div class-->
						<form role="form" action="insert_product.php" method="post" style="text-align:center">
					<table align="center" ><!--table class-->
					<tr>
						<td> Product Name :</td> 
						<td>
							<input type="text" name="pname" class="form-control">
						</td>	
					</tr>	
					<tr>
							<td>Description : </td> <td><br><textarea rows="5" cols="30" name="desc" class="form-control"> </textarea><br /></td>
					</tr>
					<tr>
					<td> category :</td> <td> <select name="category" class="form-control">
						<?php
							$query = "select category_id,name from category";
							$cat_result = mysql_query($query,$conn);
							while($row = mysql_fetch_array($cat_result)){
						?>
								<option value=" <?php echo $row['category_id']; ?>"> <?php echo $row['name']; ?> </option>
						<?php
							}
						?>		</select><br />
						</td>
					</tr>
					<tr>
						<td>Price :</td>
						<td> 
						<!--<div class="form-group has-error">
                           <label class="control-label" for="inputError">Price Cannot Be Left Empty</label>-->
						<input type="text" name="price" class="form-control"><br /> </td>
						<!-- </div> -->
					</tr>
					<tr>
							<td>Upload Image :</td><td> <input type="file" name="product_image"><br /></td>
					</tr>
					<tr>
						<td><input type="submit" value="Save" class="btn btn-primary btn-lg"></td>
						<td><input type="reset" value="Reset" class="btn btn-primary btn-lg"></td>
					</tr>
				</table>
				</form>
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
