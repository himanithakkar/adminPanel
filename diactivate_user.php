<?php
	include "dbcon.php";
	$uid=$_REQUEST['id'];
	if($status == 1)
		$status = 0;
	
	
	$query = "update user_master set status='$status' where usermaster_id=$uid";
	
	$result = mysql_query($query,$conn);
	
	if($result)
		header("Location:manage_user.php?id=$uid&msg=disapproval_success");
	else
		header("Location:manage_user.php?id=$uid&msg=disapproval_failure");
	
?>