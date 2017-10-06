
<?php
session_start();
if(!isset($_SESSION['logname']))
{
	header('location:index.php');
}
?>
<?php 
   include './header.php';
?>

<?php
date_default_timezone_set('Asia/Kolkata');
function upcomingevents()
{
?>
<div class="jumbotron">
<div class="container" style="margin-top:100px">
<h1> upcoming events</h1>
<table class="table" style="width:100%;padding:30px">
  <tr>
    <th>Item Photo</th>
    <th>Item Details</th>
     <?php
	  if($_SESSION['logname']=='admin')
	  {
	 ?>
		<th>Delete</th>
	 <?php
	  }
	 ?>	
  </tr>

<?php
$connn=mysqli_connect("localhost", "root","", "online auction") or die(mysqli_error());
$query = "SELECT * FROM itemmdetails";
$r = mysqli_query($connn,$query);
while($row=mysqli_fetch_array($r))
{
	$itemname=$row['item_name'];
	$id=$row['bid_id']; 
	$manufaurer_name=$row['manufacturer_name'];
	$starttime = $row['bid_start'];
	$endtime = $row['bid_timeover'];
	$photo ="images/".$row['photo'];
	$bid_start= new DateTime($starttime);
	$bid_end= new DateTime($endtime);
	$bid_current= new DateTime();
	if($bid_start > $bid_current)
	{
?>
	<tr>
    <td><img src="<?php echo $photo?>" style="height:200px;width:200px"></td>
    <td>
	<div>
	<label><h5>Item Name = </h5></label>
	<label><?php echo $itemname;?></label>
	</div>
	<div>
	<label><h5>Manufacture Name = </h5></label>
	<label><?php echo $manufaurer_name;?></label>
	</div>
	<a href="details.php?id=<?php echo $row['bid_id'];?>"><button class="btn btn-info">View Details</button></a></td> 
	<?php
	  if($_SESSION['logname']=='admin')
	  {
	 ?>
		<td><a href="update.php?id=<?php echo $id;?>">Delete</button></td> 
	 <?php
	  }
	 ?>	
	 </tr>
<?php
    }
}
echo "</table>";
echo "</div>";
echo "</div>";
}
?>

<?php
function ongoingevents()
{
?>
<div class="jumbotron">
<div class="container" style="margin-top:100px">
<h1> ongoing events</h1>
<table class="table" style="width:100%;padding:30px">
  <tr>
    <th>Item Photo</th>
    <th>Item Details</th>
<?php
	  if($_SESSION['logname']=='admin')
	  {
	 ?>
		<th>Delete</th>
	 <?php
	  }
	 ?>		
  </tr>

<?php
$connn=mysqli_connect("localhost", "root","", "online auction") or die("error");
$query = "SELECT * FROM itemmdetails";
$r = mysqli_query($connn,$query);
while($row=mysqli_fetch_array($r))
{   
	$itemname=$row['item_name'];
	$manufaurer_name=$row['manufacturer_name'];
	$starttime = $row['bid_start'];
	$endtime = $row['bid_timeover'];
	$photo ="images/".$row['photo'];
	$bid_start= new DateTime($starttime);
	$bid_end= new DateTime($endtime);
	$bid_current= new DateTime();
	if($bid_start < $bid_current and $bid_current < $bid_end)
	{
?>
	<tr>
    <td><img src="<?php echo $photo?>" style="height:200px;width:200px"></td>
    <td>
	<div>
	<label><h5>Item Name = </h5></label>
	<label><?php echo $itemname;?></label>
	</div>
	<div>
	<label><h5>Manufacture Name = </h5></label>
	<label><?php echo $manufaurer_name;?></label>
	</div>
	<a href="details.php?id=<?php echo $row['bid_id'];?>"><button class="btn btn-info">View Details</button></a></td> 
	<?php
	  if($_SESSION['logname']=='admin')
	  {
	 ?>
		<td><a href="update.php?id=<?php echo $id;?>">Delete</button></td> 
	 <?php
	  }
	 ?>	
	</tr>
<?php
    
    }
}
echo "</table>";
echo "</div>";
echo "</div>";
}
?>
<?php
function closedevents()
{
?>
<div class="jumbotron">
<div class="container" style="margin-top:100px">
<h1> closed events</h1>
<table class="table" style="width:100%;padding:30px">
  <tr>
    <th>Item Photo</th>
    <th>Item Details</th> 
	<?php
	  if($_SESSION['logname']=='admin')
	  {
	 ?>
		<th>Delete</th>
	 <?php
	  }
	 ?>	
	 <th>Winner</th>
  </tr>
<?php
$connn=mysqli_connect("localhost", "root","", "online auction") or die("error");
$query = "SELECT * FROM itemmdetails";
$r = mysqli_query($connn,$query);
while($row=mysqli_fetch_array($r))
{
	$itemname=$row['item_name'];
	$manufaurer_name=$row['manufacturer_name'];
	$starttime = $row['bid_start'];
	$endtime = $row['bid_timeover'];
	$photo ="images/".$row['photo'];
	$bid_start= new DateTime($starttime);
	$bid_end= new DateTime($endtime);
	$bid_current= new DateTime();
	if($bid_current > $bid_end)
	{
?>
	<tr>
    <td><img src="<?php echo $photo?>" style="height:200px;width:200px"></td>
    <td>
	<div>
	<label><h5>Item Name = </h5></label>
	<label><?php echo $itemname;?></label>
	</div>
	<div>
	<label><h5>Manufacture Name = </h5></label>
	<label><?php echo $manufaurer_name;?></label>
	</div>
	<a href="details.php?id=<?php echo $row['bid_id'];?>"><button class="btn btn-info">View Details</button></a></td> 
	<?php
	  if($_SESSION['logname']=='admin')
	  {
	 ?>
		<td><a href="update.php?id=<?php echo $row['bid_id'];?>">Delete</button></td> 
	 <?php
	  }
	 ?>	
	
	<?php
	$z = "table".$row['bid_id']; 
	$qry = "SELECT * FROM ".$z.
			"ORDER BY bid_id DESC
			LIMIT 1";
	$c=mysqli_query($connn,$qry)or die(" ");
	while($n=mysqli_fetch_array($c))
	{
		echo "<td>".$row['bidder_name']."</td>";
	}
	?>
	</tr>
<?php
    }
}
echo "</table>";
echo "</div>";
echo "</div>";
}
?>

<?php

if(!isset($_GET['data']))
{
	ongoingevents();
	upcomingevents();
	closedevents();
}
else{
	if($_GET['data']=='1')
	{
		ongoingevents();
	}
	else if($_GET['data']=='2')
	{
		upcomingevents();
	}
	else if($_GET['data']=='3')
	{
		closedevents();
	}
}
?>