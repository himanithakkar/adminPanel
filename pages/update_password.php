<?php
ob_start();
	include "db_conn.php";
	$pass= $_REQUEST["txtcnewpass"];
	$uid= $_REQUEST["txtuid"];
	$query = "update admin_user set admin_pass='$pass' where admin_user_id=$uid";
	$result = mysql_query($query,$conn);
	if($result)
		header("Location:change_password.php?id=$uid&msg=success");
	else
		header("Location:change_password.php?id=$uid&msg=failure");
ob_end_flush();
?>
