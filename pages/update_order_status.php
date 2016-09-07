<?php
ob_start();
	include "db_conn.php";
	$order_status_id= $_REQUEST["order_status"];
	$order_id= $_REQUEST["txtid"];
	
	$query = "update order_master set order_status_type='$order_status_id' where order_id=$order_id";
	//echo $query; die();
	$result = mysql_query($query,$conn);
	
	if($result)
		header("Location:manage_order.php?id=$id&msg=success");
	else
		header("Location:manage_order.php?id=$id&msg=failure");
		
	ob_end_flush();
?>
