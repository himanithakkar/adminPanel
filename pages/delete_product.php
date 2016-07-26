<?php
	include "db_conn.php";
	$id= $_REQUEST["pid"];
	$query = "delete from product where product_id=$id";
	
	$result = mysql_query($query,$conn);
	
	if($result)
		header("Location:display_products.php?id=$id&msg=success");
	else
		header("Location:display_products.php?id=$id&msg=failure");
		
	
?>
