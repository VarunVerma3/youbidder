<body style="background-color: wheat">
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
$id = $_GET['id'];
$itemname="";
$manufaurer_name="";
$color="";
$starttime="";
$endtime="";
$bidamount = "";
$connn=mysqli_connect("localhost", "root","", "online auction") or die(mysqli_error());
$query = "SELECT * FROM itemmdetails WHERE bid_id='".$id."'";
$r = mysqli_query($connn,$query);
while($row=mysqli_fetch_array($r))
{
	$itemname = $row['item_name'];
	$manufaurer_name =  $row['manufacturer_name'];
	$color =  $row['color'];
	$photo ="images/".$row['photo'];
	$starttime = $row['bid_start'];
	$endtime = $row['bid_timeover'];
	$bidamount = $row['min_bid'];
}
?>
<script>
window.onload = function(){
var start = '<?php echo $starttime;?>'
var end = '<?php echo $endtime;?>'
var current = new Date() 
var startbid = new Date(start)
var endbid = new Date(end)
var startcount
var endcount
if(startbid.getTime() > current.getTime())
{
	document.getElementById('bid').innerHTML = "Bidding will open";
	countDownDate = startbid.getTime()
	setInterval(function() {
	var now = new Date().getTime();
    var distance = countDownDate - now;
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  document.getElementById('bid_button').disabled = true
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "0d 0h 0m 0s";
  }
}, 1000);
}
else if(startbid.getTime() < current.getTime() && current.getTime() < endbid.getTime() )
{
	document.getElementById('bid').innerHTML = "Bidding is open";
	countDownDate = endbid.getTime()
	setInterval(function() {

  
  var now = new Date().getTime();
  
  
  var distance = countDownDate - now;
  
  
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
  document.getElementById('bid_button').disabled = false

   
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "0d 0h 0m 0s";
	
  }
}, 1000);
}
else if(current.getTime() > endbid.getTime())
{
	document.getElementById('bid').innerHTML = "Bidding is closed";
	document.getElementById('bid_button').disabled = true
}
};
</script>
<?php
if($_SESSION['logname']=='admin')
{
?>
<script>
window.onload = function(){
	document.getElementById('bid_button').disabled = true
}
</script>
<?php
}
?>


<div  class="jumbotron " style="background-color: #ccffff" >
    <h1 align="center" style="font-family: serif;">Item Details</h1>
<div class = "container  table table-bordered table-responsive table-striped" style="margin-top:100px">
    
    
    <div class="col-md-5 ">
        <br><br><br>
    <img class="table table-bordered"src='<?php echo "$photo"?>' style='height:inherit;width:inherit'>
</div>
<div class="container-fluid col-md-7" style="margin-top:50px">
    <div class="table table-bordered">
<label><h5>Item Name = </h5></label>
<label><?php echo $itemname;?></label>
</div>
<div class="table table-bordered">
<label><h5>Manufacture Name = </h5></label>
<label><?php echo $manufaurer_name;?></label>
</div>
<div class="table table-bordered">
<label><h5>Color = </h5></label>
<label><?php echo $color;?></label>
</div>
<div class="table table-bordered">
<h5 id="bid"></h5>
<p id="demo"></p>
</div>
<div>
<button onclick="show()" id="bid_button">Bid</button>
</div>
</div>
</div>
</div>
<script>
function show()
{
	if(document.getElementById('form1').style.display=='none')
	{
		document.getElementById('form1').style.display='block'
	}
}
function hide()
{
	if(document.getElementById('form1').style.display=='block')
	{
		document.getElementById('form1').style.display='none'
	}
}
</script>






<div class="container" id="form1" style="display:none">
<h1>Start Your Bid</h1>
<form method='post' action="updateele.php?id=<?php echo $id;?>">
<div class="form-group">
    <label >Min Bid:</label>
    <input type="text" value='<?php echo $bidamount;?>' disabled class="form-control" id="min_bid">
  </div>
  <div class="form-group">
    <label for="number">Your Bid:</label>
    <input type="number" min='<?php echo $bidamount;?>' name="bidamt" id="amount" onblur="validate_amount()" required class="form-control">
  </div>
<input type="submit" value="bid"><button onclick="hide()">Hide</button></br>
</form>
</div>


<?php
if($_SESSION['logname']=='admin')
{
?>
<h1>Bidding Details</h1>
<table class="table" style="width:100%;padding:30px">
  <tr>
    <th>Bidder name</th>
    <th>Amount</th> 
    <th>Date</th>
  </tr>
  <?php
  $a = "table".$id;
  $query = "SELECT * FROM ".$a;
  $r = mysqli_query($connn,$query);
  while($row=mysqli_fetch_array($r))
  {
  ?>
  <tr>
    <td><?php echo $row['bidder_name'];?></td>
    <td><?php echo $row['bid_amount'];?></td> 
    <td><?php echo $row['duration'];?></td>
  </tr>
  <?php
  }
  ?>
</table>
<?php
}
?>
</div>
</body>