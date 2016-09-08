<?php
ob_start();
	include "db_conn.php";
	//$pid= $_REQUEST["pid"];
	$pname = $_REQUEST["pname"];
	$cat_id=$_REQUEST["category"];
	$desc = $_REQUEST["desc"];
	$price =$_REQUEST["price"];
	
	if(isset($_REQUEST["chkStatus"]) && $_REQUEST["chkStatus"]=="on"){
		$status = 1;
	}else{
		$status = 0;
	}
	$new_filename = productImageUpload($_FILES['product_image'],"../images/");
	$new_filename='http://klickpicgo.com/admin_panel/images/'.$new_filename;
	$query = "insert into product(product_name,category_id,product_desc,price,product_image,product_status) values('$pname',$cat_id,'$desc',$price,'$new_filename','$status')";
		$result = mysql_query($query,$conn);
		
	if($result)
		header("Location:add_product.php?id=$id&msg=success");
	else
		header("Location:add_product.php?id=$id&msg=failure");
		
		ob_end_flush();
?>