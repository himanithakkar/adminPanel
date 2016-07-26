<?php
 /*define('HOST','166.62.10.30');
 define('USER','db_vraj');
 define('PASS','3112@vraj');
 define('DB','vraj_db');
 
 $conn = mysql_connect(HOST,USER,PASS,DB);
 if(!$conn) {
   die('Unable to Connect'.mysql_error());
}
$conn = mysql_connect('166.62.10.30', 'db_vraj', '3112@vraj');
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("vraj_db");
	*/


	$conn = mysql_connect('localhost', 'root', '');
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("vraj_db");

//upload photo function
	function productImageUpload($source,$destination){
		$filename=$source['tmp_name'];

		$array = getimagesize($filename);
		$width_orig= $array[0];
		$height_orig= $array[1];
		
		$width=250;
		$height=250;
		
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