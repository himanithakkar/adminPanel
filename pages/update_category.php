<?php
ob_start();
	include "db_conn.php";
	$id= $_REQUEST["txtid"];
	$name = $_REQUEST["txtName"];
	$parent_category=$_REQUEST["parent_category"];
	if($parent_category=="0"){
		$parent_category="0";
	}
	if(isset($_REQUEST["chkStatus"]) && $_REQUEST["chkStatus"]=="on"){
		$status = 1;
	}else{
		$status = 0;
	}
	
	$query = "update category set name='$name',status=$status, parent_id='$parent_category' where category_id=$id";
	
	$result = mysql_query($query,$conn);
	
	if($result)
		header("Location:edit_category.php?id=$id&msg=success");
	else
		header("Location:edit_category.php?id=$id&msg=failure");
		
	ob_end_flush();
?>
