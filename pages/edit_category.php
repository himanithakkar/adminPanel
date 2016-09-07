<?php 
include "header.php";
include "sidenav.php";
if(!isset($_SESSION['user']) || count($_SESSION['user'])<=0){
		redirect("../index.php");
}
if(isset($_REQUEST['id'])){
	$id = $_REQUEST['id'];
	$query = "select * from category where category_id=$id";
	$result = mysql_query($query,$conn);
	$row = mysql_fetch_array($result);
	
	if($row['status']==1){
		$checked = "checked";
	}else{
		$checked = "";
	}
}
	if(isset($_REQUEST['msg'])){
		if($_REQUEST['msg']=="success"){
?>
				<div class="alert alert-success">
					<strong><?php echo $msg = "Category is editted successfully!"; ?></strong>
				</div>
<?php
		}else if($_REQUEST['msg']=="failure"){
?>
				<div class="alert alert-danger">
					<strong><?php echo $msg = "Category is not editted!"; ?></strong>
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
							<small>Edit Category</small>
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
							<a href="display_category.php">Display Category</a>
							</li>
							<li class="active">
							<i class="fa fa-fw fa-edit"></i>
							Edit Category
							</li>
						</ol>
					</div>
				</div>
				<!-- /.row -->
				<br>
			<div class="row">
					<div class="col-lg-1"> </div>  
					<div class="col-lg-11">    
						<div class="table-responsive"><!--table  div class-->
						  <form role="form" action="update_category.php" method="post" style="">
							<div class="form-group">
							<input type="hidden" name="txtid" value="<?php echo $id; ?>" />
							<table><!--table class-->
								<tr>
									<td><br />
										Category Name:
									</td>
									<td><br />
										<input type="text" name="txtName" value="<?php echo $row['name']; ?>" class="form-control" />
									</td>
								</tr>
								<tr>
									<td> <br />
										Select parent category :&nbsp;
									</td>
									<td> <br />
										<select name="parent_category" class="form-control">
											<option value="0"> 
											</option>
											<?php
												$query = "select category_id,name from category";
												$cat_result = mysql_query($query,$conn);
												while($cat_row = mysql_fetch_array($cat_result)){
													if($cat_row['id'] == $row['category_id'])
														$selected = "selected";
													else
														$selected = "";
											?>

											<option value="<?php echo $cat_row['id']; ?>" <?php echo $selected; ?>>  <?php echo $cat_row['name']; ?> 
											</option>
											<?php
												}
											?>		
										</select>
									</td>
								</tr>
								<tr>
									<td><br />
										Status:
									</td>
									<td><br />
										<label>
											<input type="checkbox" name="chkStatus" class="option-input checkbox" <?php echo $checked; ?> />Active
										<label>
									</td>
								</tr>
								<tr>
									<td colspan="2"><br />
										<center><input type="submit" value="Submit" class="btn btn-primary btn-lg" /></center><br />
									</td>
								</tr>
							</table>
						</div>
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
