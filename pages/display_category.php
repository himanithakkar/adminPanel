<?php 
include "header.php";
include "sidenav.php";
$query = "select category_id,name,status from category";

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
							<th>Edit</th>
							<th>Delete</th>
						</tr>
						<?php
						while($row = mysql_fetch_array($result)){
							if($row['status']==1){
								$status = "Active";
							}
							else{
								$status = "InActive";
							}
							print "<pre>";
							print_r($result); die;
						?>
						<tr>

							<td><?php echo $row['category_id']; ?></td>
							<td><?php echo strtoupper($row['name']); ?></td>
							<td><?php echo $status; ?></td>
							<td><a href="edit_category.php?id=<?php echo $row['category_id']; ?>">Edit</a></td>
							<td><a href="delete_category.php?id=<?php echo $row['category_id']; ?>">Delete</a></td>
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
