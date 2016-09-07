<?php
ob_start();
include "pages/db_conn.php";
	
		$admin_user_id=$_REQUEST['txtuid'];
		$hash = $_REQUEST['txthash'];
		//echo $oldpass."hello<br>";
		
		$new_pass = $_REQUEST['txtnewpass'];
		$new_c_pass = $_REQUEST['txtcnewpass'];
		if($new_pass == $new_c_pass)
		{
			$final_pass = md5($new_c_pass);
			$u_query = "update admin_user set admin_pass='$final_pass' where recovery_hash ='$hash' and admin_user_id='$admin_user_id'";
				//die();
			$u_result = mysql_query($u_query,$conn);	
		}
		if($u_result)
		{
			$reset_query = "update admin_user set recovery_hash='' where recovery_hash ='$hash' and admin_user_id='$admin_user_id'";
				//die();
			$reset_result = mysql_query($reset_query,$conn);
		}
		
	if($u_result)
		header("Location:index.php?id=$uid&msg=success");
	else
		header("Location:index.php?id=$uid&msg=failure");

ob_end_flush();
?>