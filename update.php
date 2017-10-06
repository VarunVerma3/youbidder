<?php
$id = $_GET['id'];
echo $id;
$connn=mysqli_connect("localhost", "root","", "online auction") or die("error");
$query = "DELETE FROM itemmdetails WHERE bid_id=".$id;
mysqli_query($connn, $query) or die(mysqli_error());
header('location:admincheckdetails.php');
?>