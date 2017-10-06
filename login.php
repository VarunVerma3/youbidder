<?php
if(!empty($_POST['name']) and !empty($_POST['password']))
 {	if($_POST['name']=="admin" and $_POST['password']=="admin")
	 {
		 if (!session_id())session_start();
		$_SESSION['logname']=$_POST['name'];
		header("location:mainpage.php?");
	 }
	 else{
	 $conn=mysqli_connect("localhost", "root","", "online auction") or die(mysqli_error());
	 $query = "SELECT * FROM dataseller WHERE username='".$_POST['name']."' and password='".$_POST['password']."'";
	 $r=mysqli_query($conn, $query) or die("sorry");
	 if(mysqli_fetch_array($r)!=null)
	 {
		if (!session_id())session_start();
		$_SESSION['logname']=$_POST['name'];
		header("location:mainpage.php?");
	 }
	 else
	 {
		 header("location:index.php?abc=invalid");
	 }
	 }
	 die();
 }
 else
 {
		header("location:index.php");
 }
 
 ?>