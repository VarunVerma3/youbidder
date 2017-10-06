<?php
session_start();
$add = "";
/*if(isset($_GET['ele']))
{
	echo "<script>alert('item added')</script>";
}*/
?>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>


<div class='container-fluid fixed_img ' style="margin-top: -20;">
    <?php 
   include './header.php';
?>
    <div class="container" style="background-color: black;opacity: 0.5;">
        <p style="font-size: 20px;color: white;opacity: 1;">100% RISKFREE ONLINE AUCTIONS, WIN or BUY BRANDED NEW PRODUCTS AT UP TO 89% HUGE DISCOUNT 
5 Free Credits On Sign Up, Worldwide Shipping , Latest Gadgets, Click To BID Easy Auctions
40000+ Members , 10000+ Completed Auctions , Always Fair Auction Guaranteed. </p>
    </div>
</div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li style="border:2px solid black;margin-top:300px"  data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li style="border:2px solid black;margin-top:300px"data-target="#myCarousel" data-slide-to="1"></li>
    
  </ol>
<div class="carousel-inner" role="listbox">
<div class="container item active">
    <div class="row information-data">
        <div class="col-md-4 information" >
            <img src="certyfikaty-lux4home.jpg" style="margin-top:50px">
        </div>
        <div class="col-md-8 information-text">
		<h1>Quality Assurance<h1>
            <p style="font-size:30px"><br><br> We offer best quality products.Quality of products are rich in nature.There
						is no harm to use our products.
            </p>
        </div>
     </div>
</div>	
<div class="container item "> 
    <div class="row information-data">
    <div class='col-md-4 information' >
        <img src="delivery.png" style="margin-top:50px">
    </div>
    <div class='col-md-8 information-text'>
		<h1>Free Delivary</h1>
        <p style="font-size:30px"><br><br> We offer free delivary .Free Shipping and on time delivary.
            </p>
    </div>
     </div>
</div>	
</div>
</div>
<div style="background-image: url('bg/StockSnap_5KL6GPYCXN.jpg');background-size:cover;">
    <h1 align="center" style="background-color: wheat;font-family: serif;opacity:0.9"> Ongoing Events</h1>
<div class="container" style="background-color: grey;opacity: 0.9">
    
<?php
$connn=mysqli_connect("localhost", "root","", "online auction") or die("error");
$query = "SELECT * FROM itemmdetails";
$r = mysqli_query($connn,$query);
while($row=mysqli_fetch_array($r))
{   $i=0;
	$starttime = $row['bid_start'];
	$endtime = $row['bid_timeover'];
	$photo ="images/".$row['photo'];
	$bid_start= new DateTime($starttime);
	$bid_end= new DateTime($endtime);
	$bid_current= new DateTime();
	if($bid_start < $bid_current and $bid_current < $bid_end)
	{
		$i=$i+1;
?>
	<div class="col-md-3">
	<div style='height:200px;width:200px;'>
	<img src='<?php echo $photo;?>' style='height:inherit;width:inherit'>
	</div>
	<div>
	<a href="details.php?id=<?php echo $row['bid_id'];?>"><button class="btn btn-info">View Details</button></a>
	</div>
	</div>
<?php
    if($i>=4)
	{
		break;
	}
    }
}
?>
</div>
    <hr>
    <h1 align="center" style="background-color: wheat;font-family: serif;opacity:0.9"> Upcoming Events</h1>
<div class="container" style="background-color: grey;opacity: 0.9">

<?php
$connn=mysqli_connect("localhost", "root","", "online auction") or die("error");
$query = "SELECT * FROM itemmdetails";
$r = mysqli_query($connn,$query);
while($row=mysqli_fetch_array($r))
{
	$i=0;
	$starttime = $row['bid_start'];
	$endtime = $row['bid_timeover'];
	$photo ="images/".$row['photo'];
	$bid_start= new DateTime($starttime);
	$bid_end= new DateTime($endtime);
	$bid_current= new DateTime();
	if($bid_start > $bid_current)
	{
		$i=$i+1;
?>
	<div class="col-md-3">
	<div style="height:200px;width:300px">
	<img src='<?php echo $photo;?>' style='height:inherit;width:inherit'>
	</div>
	<div>
	<a href="details.php?id=<?php echo $row['bid_id'];?>"><button class="btn btn-info">View Details</button></a>
	</div>
	</div>
<?php
if($i>=4)
	{
		break;
	}
    }
}
?>
</div>
    <hr>
    <h1 align="center" style="background-color: wheat;font-family: serif;opacity:0.9"> Closed Events</h1>
    <div class="container" style="background-color: grey;opacity: 0.9;padding-bottom: 30px;">

<?php
$connn=mysqli_connect("localhost", "root","", "online auction") or die("error");
$query = "SELECT * FROM itemmdetails";
$r = mysqli_query($connn,$query);
while($row=mysqli_fetch_array($r))
{
	$i=0;
	$starttime = $row['bid_start'];
	$endtime = $row['bid_timeover'];
	$photo ="images/".$row['photo'];
	$bid_start= new DateTime($starttime);
	$bid_end= new DateTime($endtime);
	$bid_current= new DateTime();
	if($bid_current > $bid_end)
	{
		$i=$i+1;
?>
	<div class="col-md-3">
	<div style="height:300px;width:300px">
	<img src='<?php echo $photo;?>' style='height:inherit;width:inherit'>
	</div>
	<div>
            <a href="details.php?id=<?php echo $row['bid_id'];?>"><button class="btn btn-info " >View Details</button></a>
	</div>
	</div>
<?php
if($i>=4)
	{
		break;
	}
    }
}
?>
</div>
    
<?php include 'footer.php';?>

