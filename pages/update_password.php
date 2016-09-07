<?php
ob_start();
include "db_conn.php";
	
		$admin_user_id=$_REQUEST['txtuid'];
		$oldpass = $_REQUEST['txtoldpass'];
		//echo $oldpass."hello<br>";
		if($oldpass){
		$oldpass = md5($oldpass);
		}
		
			$new_pass = $_REQUEST['txtnewpass'];
			$new_c_pass = $_REQUEST['txtcnewpass'];
			if($new_pass == $new_c_pass)
			{
				$final_pass = md5($new_c_pass);

				$u_query = "update admin_user set admin_pass='$final_pass' where admin_pass='$oldpass' and admin_user_id='$admin_user_id'";
				//die();
				$u_result = mysql_query($u_query,$conn);	
			}
		
	if($u_result)
		header("Location:change_password.php?id=$uid&msg=success");
	else
		header("Location:change_password.php?id=$uid&msg=failure");

ob_end_flush();
?>