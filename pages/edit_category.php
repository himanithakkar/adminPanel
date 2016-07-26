<?php 
include "header.php";
include "sidenav.php";
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
							Display Category
                            </li>
							<li class="active">
							Edit Category
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
	 		<div class="row">
                    <div class="col-lg-12">            
                        <div class="table-responsive"><!--table  div class-->
						  <form role="form" action="update_category.php" method="post" style="text-align:center">

                            <div class="form-group">
		<input type="hidden" name="txtid" value="<?php echo $id; ?>" />
					<table align="center"><!--table class-->
						<tr>
							<td>Category Name:</td>
							<td><input type="text" name="txtName" value="<?php echo $row['name']; ?>" class="form-control" /><br /></td>
						</tr>
						<tr>
							<td>Status:</td>
							<td><label><input type="checkbox" name="chkStatus" class="option-input checkbox" <?php echo $checked; ?> />Active<label><br /></td>
						</tr>
						<tr>
							<td> Select parent category :</td><td> <select name="parent_category" class="form-control">
							<option value="0"> </option>
							<?php
								$query = "select category_id,name from category";
								$cat_result = mysql_query($query,$conn);
								while($cat_row = mysql_fetch_array($cat_result)){
									if($cat_row['id'] == $row['category_id'])
										$selected = "selected";
									else
										$selected = "";
							?>

									<option value="<?php echo $cat_row['id']; ?>" <?php echo $selected; ?>>  <?php echo $cat_row['name']; ?> </option>
							<?php
								}
							?>		</select> <br />
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="Submit" class="btn btn-primary btn-lg" />
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
