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
					<strong><?php echo $msg = "Category is added successfully!"; ?></strong>
				</div>
<?php
		}else if($_REQUEST['msg']=="failure"){
?>
				<div class="alert alert-danger">
					<strong><?php echo $msg = "Category is not added!"; ?></strong>
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
							<small>Add Category</small>
						</h1>
						<ol class="breadcrumb">
							<li>
								<i class="fa fa-home"></i>  <a href="home.php">Dashboard</a>
							</li>
							<li class="active">
								Manage Category
							</li>
							 <li class="active">
							 <i class="fa fa-fw fa-edit"></i>
								Add Category
							</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->
				<br>
			<div class="row">
				<div class="col-lg-12">  
					<div class="col-lg-1"> </div>
						<div class="table-responsive"><!--table  div class-->
							<form role="form" action="insert_category.php" method="post" style="">
								<table ><!--table class-->
									<tr>
										<td><br />
											Category Name:
										</td>
										<td><br />
											<input type="text" name="txtName" class="form-control" />
										</td>
									</tr>
									<tr>
										<td> <br />
											Select parent category : &nbsp;
										</td>
										<td> <br />
											<select name="parent_category" class="form-control">
												<option value="0"> 
												</option>
												<?php
													$query = "select category_id,name from category";
													$cat_result = mysql_query($query,$conn);
													while($row = mysql_fetch_array($cat_result)){
												?>
												<option value=" <?php echo $row['category_id']; ?>" > <?php echo $row['name']; ?> 
												</option>
											<?php
												}
											?>
											<select>
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
										<td colspan="2"><br />
											<center><input type="submit" value="Submit" class="btn btn-primary btn-lg"/></center><br />
										</td>
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
