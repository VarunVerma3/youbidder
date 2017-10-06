<?php
$conn=mysqli_connect("localhost", "root","", "online auction") or die("error");
$query ="CREATE TABLE IF NOT EXISTS itemcatagories(watch SET('Color','Type'))" ;
mysqli_query($conn, $query) or die("error");


?>