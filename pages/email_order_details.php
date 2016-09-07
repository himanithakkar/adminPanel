<?php
ob_start();
	include "db_conn.php";
	$order_id= $_REQUEST["oid"];
	$email= $_REQUEST["email"];
	
	$query = "select * from order_master where order_id='$order_id'";
	//echo $query; die();
	$result = mysql_query($query,$conn) or die(mysql_error());
	$row=mysql_fetch_array($result);
	$order_amt=$row['order_total'];
	$order_time=$row['order_timestamp'];
	$ship_date=$row['ship_date'];
	$user_id=$row['user_id'];
	$status_value=$row['order_status_type'];
	$status_name=getOrderStatusName($status_value,$conn);
	$user_name=getUserName($user_id,$conn);

	$to = $email;
			//echo "your email is ::".$email;
			//Details for sending E-mail
			
			$from = "klickpicgo";
			$url = "http://klickpicgo.com";
			$body  =  "<html>
							<body>
								<p>
								Dear $user_name,						
								<br>
								<hr></hr>
									<br>Your order placed on $order_time is to be delivered on $ship_date<br>
									<br>The current status of your order with total amount INR $order_amt is <strong>$status_name</strong>
									<br><br><br>Thank you for your business!
									<br><br>
									Sincerely,<br>
									Team klickpicgo
								</p>
							</body>
						</html>";
			$from = "no-reply@klickpicgo.com";
			$subject = "[Klickpicgo]Order Tracking Details";
			$headers1 = "From: $from\n";
			$headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
			$headers1 .= "X-Priority: 1\r\n";
			$headers1 .= "X-MSMail-Priority: High\r\n";
			$headers1 .= "X-Mailer: Just My Server\r\n";

			$sentmail = mail ( $to, $subject, $body, $headers1 );
	if($result && $sentmail==1)
		header("Location:manage_order.php?message=success");
	else
		header("Location:manage_order.php?message=failure");
		
	ob_end_flush();
?>
