<?php
	include "db_conn.php";
	$id= $_REQUEST["pid"];
	$name = $_REQUEST["pname"];
	$sdesc = $_REQUEST["sdesc"];
	$ldesc = $_REQUEST["ldesc"];
	
	
	if($_FILES['product_image']['tmp_name']!="" && $_FILES['product_image']['size']>0){
		$new_filename = productImageUpload($_FILES['product_image'],"uploaded_images/product/");
		$query = "update product set product_name='$name', product_desc='$sdesc', product_image='$new_filename' where product_id=$id";
	}else{
		$query = "update product set product_name='$name', product_desc='$sdesc' where product_id=$id";
	}
	$result = mysql_query($query,$conn);
	//echo $query;
	//die;
	
	if($result)
		header("Location:edit_product.php?pid=$id&msg=success");
	else
		header("Location:edit_product.php?pid=$id&msg=failure");
		
	
?>