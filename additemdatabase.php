<?php
$start = date('Y-m-d 12:00:00',strtotime("tomorrow"));
$connn=mysqli_connect("localhost", "root","", "online auction") or die("error");
if($_SERVER['REQUEST_METHOD']=="POST")
 { 
$connn=mysqli_connect("localhost", "root","", "online auction") or die("error");
$queryy ="CREATE TABLE IF NOT EXISTS itemmdetails(
		bid_id INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		item_name VARCHAR(40),
		manufacturer_name VARCHAR(40),
		color VARCHAR(20),
		date_of_purchase DATE,
		base_amount INT(100),
		photo BLOB,
		bid_start DATETIME(6),
		bid_timeover DATETIME(6),
		min_bid INT(100))";
mysqli_query($connn, $queryy) or die(mysqli_error());
$query = "INSERT INTO itemmdetails(item_name,manufacturer_name,color,
		date_of_purchase,base_amount,
		photo,bid_start,bid_timeover,min_bid)
		 VALUES('".$_POST["itemname"]."',
		 '".$_POST["itemmanufacturename"]."',
		 '".$_POST["itemcolor"]."',
		 '".$_POST["itempurchase"]."',
		 '".$_POST["itemamount"]."',
		 '".$_POST["itemphoto"]."',
		 '".$start."',
		 '".$_POST["duration"]."',
		 '".$_POST["itemamount"]."')";
		 
mysqli_query($connn, $query) or die(mysqli_error());
$query = "SELECT bid_id FROM itemmdetails
			ORDER BY bid_id DESC
			LIMIT 1;";
 $r=mysqli_query($connn, $query) or die(mysqli_error());
 while($row=mysqli_fetch_array($r))
{
	$a = "table".$row['bid_id'];
	$queryy ="CREATE TABLE IF NOT EXISTS ".$a."(
		bid_no INT(100) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		bidder_name VARCHAR(40),
		bid_amount INT(10),
		duration DATETIME(6))";
		mysqli_query($connn, $queryy)or die(mysqli_error());
}
header("location:mainpage.php?ele=added");
}
	
 
?>
