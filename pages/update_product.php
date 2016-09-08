<?php
ob_start();
	include "db_conn.php";
	$id= $_REQUEST["pid"];
	$name = $_REQUEST["pname"];
	$desc = $_REQUEST["desc"];
	$price=$_REQUEST["price"];
	$category=$_REQUEST["category"];
	if(isset($_REQUEST["chkStatus"]) && $_REQUEST["chkStatus"]=="on"){
		$status = 1;
	}else{
		$status = 0;
	}
	if($_FILES['product_image']['tmp_name']!="" && $_FILES['product_image']['size']>0){
		$new_filename = productImageUpload($_FILES['product_image'],"../images/");
		$new_filename='http://klickpicgo.com/admin_panel/images/'.$new_filename;
		$query = "update product set product_name='$name', product_image='$new_filename', price='$price', product_desc='$desc',product_status='$status' where product_id=$id";
	}else{
		$query = "update product set product_name='$name', price='$price', product_desc='$desc',product_status='$status' where product_id=$id";
	}
	
	$result = mysql_query($query,$conn);
	//echo $query;
	//die;
	
	if($result)
		header("Location:edit_product.php?pid=$id&msg=success");
	else
		header("Location:edit_product.php?pid=$id&msg=failure");
		
	ob_end_flush();
?>