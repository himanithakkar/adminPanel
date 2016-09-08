<?php

	$conn = mysql_connect('localhost', 'root', '');
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("vraj_db");

function getUserName($user_id,$conn){
		$query = "select user_name from user where user_id='$user_id'";
		$result = mysql_query($query,$conn);
		$row = mysql_fetch_array($result);
		return strtoupper($row['user_name']);
	}

	function getUserEmail($user_id,$conn){
		$query = "select user_emailid from user where user_id='$user_id'";
		$result = mysql_query($query,$conn);
		$row = mysql_fetch_array($result);
		return $row['user_emailid'];
	}
	function getOrderStatusName($status_value,$conn){
		$query = "select name from order_status where order_status_type='$status_value'";
		$result = mysql_query($query,$conn);
		$row = mysql_fetch_array($result);
		return strtoupper($row['name']);
	}
	
	function convertYMDtoDMY($temp_date){
		$arr_date = explode("-",$temp_date);
		$timestamp = mktime(0,0,0,$arr_date[1],$arr_date[2],$arr_date[0]);
		$new_date = date("d-m-Y",$timestamp);
		return $new_date;
	}
	
	function getProductDetails($product_id,$conn){
		$query = "select * from product where product_id=$product_id";
		$result = mysql_query($query,$conn);
		$row = mysql_fetch_array($result);
		return $row;
	}
	function checkUserOrderedProduct($user_id,$product_id,$conn){
		$query = "select * from order_master om, order_detail od where om.order_id=od.order_id and user_id='$user_id' and product_id='$product_id'";
		$result = mysql_query($query,$conn);
		$row = mysql_fetch_array($result);
		if(count($row)>1)
			return true;
		else
			return false;
	}
//upload photo function
	function productImageUpload($source,$destination){
		$filename=$source['tmp_name'];

		$array = getimagesize($filename);
		$width_orig= $array[0];
		$height_orig= $array[1];
		
		$width=250;
		
		
		$image_p = imagecreatetruecolor($width, $height);
		$image = imagecreatefromjpeg($filename);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		
		//Output into another file
		imagejpeg($image_p,$filename, 640);
		
		$ext = explode(".",$source['name']);
		$ext = $ext[count($ext)-1];
		$new_filename = "image_".time().".".$ext;
		
		move_uploaded_file($filename,$destination."$new_filename");
		
		return $new_filename;
	}
	
	function redirect($filename) {
	//echo "FILENAME:".$filename;die;
	if (!headers_sent())
		header('Location: '.$filename);
	else {
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$filename.'";';
		echo '</script>';
		echo '<noscript>';
		echo '<meta http-equiv="refresh" content="0;url='.$filename.'" />';
		echo '</noscript>';
	}
}
?>
