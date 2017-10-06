<?php
$r = date('Y-m-d 12:00:00',strtotime("tomorrow"));
?>
<script>
var r = '<?php echo $r;?>'
//var now = new Date().getTime();
var countDownDate = new Date(r).getTime();
 var now = new Date().getTime();
 var h = new Date()
 alert(h)
 h.setHours(12,30,0,0)
 //alert(h.getMonth()+1)
 alert(now)
 alert(countDownDate)
  if(now < countDownDate)
  {
	  alert("yes")
  }
  else
  {
	  alert("no")
  }
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

</script>
