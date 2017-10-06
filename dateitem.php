
<?php
$start = date('Y-m-d 12:00:00',strtotime("tomorrow"));

$connn=mysqli_connect("localhost", "root","", "online auction") or die("error");


$query = "SELECT * FROM itemmdetails";
$r = mysqli_query($connn,$query);
while($row=mysqli_fetch_array($r))
{
	$startdate = date($row['bid_start']);
	$start = $startdate;
	$compleatdate = date($row['bid_timeover']);
	echo $startdate . "  ". $compleatdate." " .$row['photo'];
	$photo ="images/".$row['photo'];
	echo "<img src='".$photo."'>";
}

		 
//mysqli_query($connn, $query) or die(mysqli_error());
 
?>
<script>
// Set the date we're counting down to
var z = '<?php echo $start;?>'
var countDownDate = new Date(z).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();
  //document.getElementById("demo").innerHTML = countDownDate
  // Find the distance between now an the count down date
  var distance = countDownDate - now;
  
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

   //If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
<p id="demo"></p>

