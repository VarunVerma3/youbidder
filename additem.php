<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>
<?php
$r = date('Y-m-d 00:00:00',strtotime("tomorrow"));
date_default_timezone_set('Asia/Kolkata');
session_start();
?>
<?php 
   include './header.php';
?>
<script>
var itemnameerr = true
var dateerr = true
var manufactureerr = true

function checkitem() {
    var x = document.getElementById('item')
	var y = document.getElementById('nval1')
	var pattern=/^[a-zA-Z ]*$/
    if(pattern.test(x.value))
	{
		y.setAttribute('class','glyphicon glyphicon-ok')
		y.style.color="green"
		itemnameerr = true;
	}
	else
	{
		y.setAttribute('class','glyphicon glyphicon-remove')
		y.style.color="red"
		nameerr = false;
	}
}	

function checkmanufacture() {
    var x = document.getElementById('itemmanufacture')
	var y = document.getElementById('nval2')
	var pattern=/^[a-zA-Z ]*$/
    if(pattern.test(x.value))
	{
		y.setAttribute('class','glyphicon glyphicon-ok')
		y.style.color="green"
		manufactureerr = true;
	}
	else
	{
		y.setAttribute('class','glyphicon glyphicon-remove')
		y.style.color="red"
		manufactureerr = false;
	}
}	
function checkdate() {
    var a=document.getElementById('bidduration').value
	var x = new Date(a)
	x.setHours(0,0,0,0)
	var r = '<?php echo $r;?>'
	var z = new Date(r)
	
    if(z.getTime() > x.getTime())
	{
		document.getElementById('nval7err').innerHTML="date must be grater then tommorow's date"
	}
	else
	{
		
		document.getElementById('nval7err').innerHTML=""
	}
	if(itemnameerr && manufactureerr)
	{
		document.getElementById('mybtn').disabled = false
	}
	else
	{
		document.getElementById('mybtn').disabled = true
	}
}	
</script>
<form role="form" class="form-horizontal" name="signupform" method="post" action="additemdatabase.php">
<div class="container">
    <div class="page-header">
    <h1>Add Item</h1>
    </div>
    <div class="jumbotron">
        <div class="form-group">
            <div class="col-md-3">
            <lable><h4>Item Name:</h4></lable>
            </div>
            <div class="col-md-7">
            <input id="item"  onkeyup="checkitem()" type="text" name="itemname" class="form-control" required>
            </div>
			<div class="col-md-2">
			<span id="nval1" style="float:left;font-size:25px"></span>
			</div>
        </div>
        <div class="form-group">
            <div class="col-md-3">
            <lable><h4>Manufacturer Name:</h4></lable>
            </div>
            <div class="col-md-7">
            <input id="itemmanufacture" type="text" onkeyup="checkmanufacture()" name="itemmanufacturename" class="form-control" required>
            </div>
			<div class="col-md-2">
			<span id="nval2" style="float:left;font-size:25px"></span>
			</div>
			
        </div>
        <div class="form-group">
             <div class="col-md-3">
            <lable><h4>Color:</h4></lable>
            </div>
             <div class="col-md-7">
            <input id="color"  type="text" name="itemcolor" class="form-control" required>
            </div>
			
        </div>
        <div class="form-group" >
             <div class="col-md-3">
             <lable><h4>Date of Purchase:</h4></lable>
             </div>
             <div class="col-md-7">
			 <?php
			   $s = new DateTime();
			   $t = $s->format('Y-m-d');
			 ?>
            <input id="datepurchase"  type="date" min="2000-01-02" max="<?php echo $t;?>" name="itempurchase" class="form-control" required>
             </div>
			 
        </div>
        <div class="form-group">
             <div class="col-md-3">
            <lable><h4>Base Amount:</h4></lable>
             </div>
             <div class="col-md-7">
            <input id="baseamount" type="text" name="itemamount"  class="form-control" required>
			</div>
        </div>
		<div class="form-group">
             <div class="col-md-3">
            <lable><h4>Photo:</h4></lable>
             </div>
             <div class="col-md-7">
            <input id="photo" type="file" name="itemphoto"  class="form-control" required>
			</div>
        </div>
		<div class="form-group">
             <div class="col-md-3">
            <lable><h4>Bid Duration:</h4></lable>
             </div>
             <div class="col-md-7">
            <input id="bidduration" type="date" name="duration" onblur="checkdate()" class="form-control" required>
			</div>
			<div>
			<span id="nval7" style="color:red"><p id="nval7err"></p></span>
			</div>
        </div>
        <input type="submit" id="mybtn" onclick="check()" class="btn btn-default" value="Submit" disabled>
    </div>   
</div>
</form>

