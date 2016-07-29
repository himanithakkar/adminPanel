<?php 
include "header.php";
include "sidenav.php";
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
	 		<div class="row">
                    <div class="col-lg-12">            
                        <div class="table-responsive"><!--table  div class-->
						<form role="form" action="insert_category.php" method="post" style="text-align:center">
					<table align="center"><!--table class-->
					<tr>
					<td>Category Name:</td>
					<td><input type="text" name="txtName" class="form-control" /><br /></td>
				</tr>
				<tr>
					<td>Status:</td>
					<td><label><input type="checkbox" name="chkStatus" class="option-input checkbox"/> Active</label><br /></td>
				</tr>
				<tr>
						<td> Select parent category :</td><td> <select name="parent_category" class="form-control">
						<option value="0"> </option>
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
					
					  <div class="one_quarter"><a class="pad15 center bold uppercase" href="#">
					  <td colspan="2"><input type="submit" value="Submit" class="btn btn-primary btn-lg"/></td></a></div>
					
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
