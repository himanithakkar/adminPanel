<?php
	include "db_conn.php";
	$id= $_REQUEST["id"];
	$query = "delete from category where category_id=$id";
	
	$result = mysql_query($query,$conn);
	
	if($result)
		header("Location:display_category.php?id=$id&msg=success");
	else
		header("Location:display_category.php?id=$id&msg=failure");
		
	
?>
