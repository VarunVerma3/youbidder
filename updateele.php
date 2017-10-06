
<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{   session_start();
	$a = "table".$_GET['id'];
	date_default_timezone_set('Asia/Kolkata');
	$date = new DateTime();
	$result= $date->format('Y-m-d H:i:m');
	$amount = $_POST["bidamt"];
    $connn=mysqli_connect("localhost", "root","", "online auction") or die(mysqli_error());
	$query = "UPDATE itemmdetails SET min_bid='".$amount."' WHERE bid_id='".$_GET['id']."'";
	mysqli_query($connn,$query);
	$query = "INSERT INTO ".$a."(bidder_name,bid_amount,duration)
		 VALUES('".$_SESSION['logname']."',
		 '".$amount."',
		 '".$result."')";
	mysqli_query($connn,$query);
	header("location:details.php?id=".$_GET['id']);
}
?>