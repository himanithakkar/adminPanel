<?php
	include "db_conn.php";
	$pass= $_REQUEST["txtcnewpass"];
	$uid= $_REQUEST["txtuid"];
	$query = "update user_master set password='$pass' where usermaster_id=$uid";
	$result = mysql_query($query,$conn);
	if($result)
		header("Location:change_password.php?id=$uid&msg=success");
	else
		header("Location:change_password.php?id=$uid&msg=failure");
		
	
?>
