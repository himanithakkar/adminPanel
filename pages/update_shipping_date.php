<?php
ob_start();
	include "db_conn.php";
	echo $shipping_date= $_REQUEST["txtdate"];

		/*$arr_date = explode("-",$shipping_date);
		$timestamp = mktime(0,0,0,$arr_date[1],$arr_date[2],$arr_date[0]);
		$new_date = date("Y-d-m",$timestamp);*/


	$order_id= $_REQUEST["txtOrderId"];
	
	$query = "update order_master set ship_date='$shipping_date' where order_id=$order_id";
	//echo $query; die();
	$result = mysql_query($query,$conn);
	$id=$order_id;
	if($result)
		header("Location:view_order.php?id=$id&msg=success");
	else
		header("Location:view_order.php?id=$id&msg=failure");
		
ob_end_flush();
?>
