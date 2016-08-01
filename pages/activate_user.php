<?php
ob_start();
	include "db_conn.php";
	$uid=$_REQUEST['id'];
	if($status == 0)
		$status = 1;
	
	
	$query = "update user set user_status='$status' where user_id=$uid";
	
	$result = mysql_query($query,$conn);
	
	if($result)
		header("Location:manage_user.php?id=$uid&msg=approval_success");
	else
		header("Location:manage_user.php?id=$uid&msg=approval_failure");
		ob_end_flush();
?>