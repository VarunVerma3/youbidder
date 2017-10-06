
<?php


if($_SERVER['REQUEST_METHOD']=="POST")
 {  
     $conn=mysqli_connect("localhost","root","","online auction") or die(mysqli_error());
     if($conn== FALSE){
         echo "not connected";
     }
    
    
     $query ="CREATE TABLE IF NOT EXISTS dataseller(name VARCHAR(40),username VARCHAR(40),email VARCHAR(40),password VARCHAR(20))" ;
     mysqli_query($conn, $query) or die(mysqli_error());
     $query = "INSERT INTO dataseller VALUES('".$_POST["rname"]."','".$_POST["uname"]."','".$_POST["uemailid"]."','".$_POST["upassword"]."')";
     $qry = "SELECT * FROM dataseller";
	 $x = mysqli_query($conn, $qry) or die(mysqli_error());
	 while($row = mysqli_fetch_array($x))
	 {
		 if($row['username']==$_POST["uname"] && $row['email']==$_POST["uemailid"])
		 {
			 header('location:index.php?value=invaliddata');
                         
		 } 
		 else
		 {
			 mysqli_query($conn, $query) or die(mysqli_error());
                         echo 'nahi';
		 }
	 }
	header('location:index.php');
 }
 
?>