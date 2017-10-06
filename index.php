<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<div style="background-image:url('bg/varun.jpg');background-size: cover">
    <?php
$error="";
$unique = "";
if(isset($_GET['abc']))
{
	$error = "invalid Email and Password";
}
if(isset($_GET['value']))
{
	$unique = "email password already used";
	echo "<script>alert('email password already used')</script>";
}


?>
<?php 
   include './header.php';
?>
<script>
var nameerr = true
var unameerr = true
var umailerr = true
var passworderr = true
var passwordconferr = true
function nameCheck() {
    var x = document.getElementById('ncheck')
	var y = document.getElementById('nval1')
	var pattern=/^[a-zA-Z ]*$/
    if(pattern.test(x.value))
	{
		y.setAttribute('class','glyphicon glyphicon-ok')
		y.style.color="green"
		nameerr = true;
	}
	else
	{
		y.setAttribute('class','glyphicon glyphicon-remove')
		y.style.color="red"
		nameerr = false;
	}
}	
	
function usenameCheck()
{
	var x = document.getElementById('uncheck')
	var y = document.getElementById('nval2')
	var pattern=/^[a-zA-Z0-9 ]*$/
	if(pattern.test(x.value))
	{
		y.setAttribute('class','glyphicon glyphicon-ok')
		y.style.color="green"
		unameerr = true;
	}
	else
	{
		y.setAttribute('class','glyphicon glyphicon-remove')
		y.style.color="red"
		unameerr = false;
	}
	
}
function usemailCheck()
{
	var x = document.getElementById('umcheck')
	var y = document.getElementById('nval3')
	var pattern=/([\w\-]+\@[\w\-]+\.[\w\-]+)/
	if(pattern.test(x.value))
	{
		y.setAttribute('class','glyphicon glyphicon-ok')
		y.style.color="green"
		umailerr = true;
	}
	else
	{
		y.setAttribute('class','glyphicon glyphicon-remove')
		y.style.color="red"
		umailerr = false;
	}
	
}
function usepassCheck()
{
	var x = document.getElementById('upcheck')
	var y = document.getElementById('nval4')
	var pattern=/[a-zA-Z0-9]/
	if(x.value.length > 6 && pattern.test(x.value))
	{
		y.setAttribute('class','glyphicon glyphicon-ok')
		y.style.color="green"
		passworderr = true;
	}
	else
	{
		y.setAttribute('class','glyphicon glyphicon-remove')
		y.style.color="red"
		passworderr = false;
	}
	
}
function usepassconfCheck()
{
	var x = document.getElementById('uccheck')
	var z = document.getElementById('upcheck')
	var y = document.getElementById('nval5')
	if(x.value==z.value)
	{
		y.setAttribute('class','glyphicon glyphicon-ok')
		y.style.color="green"
		$passwordconferr = true;
	}
	else
	{
		y.setAttribute('class','glyphicon glyphicon-remove')
		y.style.color="red"
		passwordconferr = false;
	}
}
	
	
function allcheck()
{
	if(nameerr && unameerr && umailerr && passworderr && passwordconferr)
	{
		document.getElementById('mybtn').disabled = false;
	}
	else
	{
			document.getElementById('mybtn').disabled = true;
	}
}

</script>

<ul class="nav nav-tabs" style="margin-top:70px">
    <li><a href="#signup" onclick="uporin('signup')">Signup</a></li>
    <li class="active" style="background-color: transparent"><a href="#signin" onclick="uporin('signin')">SignIn</a></li>
</ul>
<div id="signup" class="tabcontent">
<form role="form" class="form-horizontal" name="signupform" method="post" action="signup.php">
<div class="container">
    <div class="page-header">
    <h1>SignUp</h1>
    </div>
    <div class="jumbotron">
        <div class="form-group">
            <div class="col-md-3">
            <lable><h4>Name:</h4></lable>
            </div>
            <div class="col-md-7">
            <input id="ncheck"  onkeyup="nameCheck()"  type="text" name="rname" class="form-control" required>
            </div>
			<div class="col-md-2">
			<span id="nval1" style="float:left;font-size:25px"></span>
			</div>
        </div>
        <div class="form-group">
            <div class="col-md-3">
            <lable><h4>Username:</h4></lable>
            </div>
            <div class="col-md-7">
            <input id="uncheck" onkeyup="usenameCheck()"  type="text" name="uname" class="form-control" required>
            </div>
			<div class="col-md-2">
			<span id="nval2" style="float:left;font-size:25px"></span>
			</div>
        </div>
        <div class="form-group">
             <div class="col-md-3">
            <lable><h4>EmailId:</h4></lable>
            </div>
             <div class="col-md-7">
            <input id="umcheck" onkeyup="usemailCheck()"  type="text" name="uemailid" class="form-control" required>
            </div>
			<div class="col-md-2">
			<span id="nval3" style="float:left;font-size:25px"></span>
			</div>
        </div>
        <div class="form-group" >
             <div class="col-md-3">
            <lable><h4>Password:</h4></lable>
             </div>
             <div class="col-md-7">
            <input id="upcheck" onkeyup="usepassCheck()"  type="password" name="upassword" class="form-control" required>
             </div>
			 <div class="col-md-2">
			<span id="nval4" style="float:left;font-size:25px"></span>
			</div>
        </div>
        <div class="form-group">
             <div class="col-md-3">
            <lable><h4>Confirm Password:</h4></lable>
             </div>
             <div class="col-md-7">
            <input id="uccheck" onchange="usepassconfCheck()" onblur="allcheck()" type="password" name="confpassword"  class="form-control" required>
			</div>
			<div class="col-md-2">
			<span id="nval5" style="float:left;font-size:25px"></span>
			</div>
        </div>
        <input type="submit" id="mybtn"  class="btn btn-default" value="Submit" disabled>
    </div>   
</div>
</form>
</div>
<div class="tabcontent" id="signin">
<form role="form" class="form-horizontal" name="signinform" method="post" action="login.php">
<div class="container">
    <div class="page-header">
    <h1>SignIn</h1>
    </div>
	<div><span><?php echo $error;?></span></div>
    <div class="jumbotron">
        <div class="form-group form-inline">
            <div class="col-md-3">
            <lable><h4>Username:</h4></lable>
            </div>
            <div class="col-md-9">
                <input  type="text" name="name" id="name" class="form-control" required>
            </div>
        </div>
        <div class="form-group form-inline"> 
            <div class="col-md-3">
            <lable><h4>Password:</h4></lable>
            </div>
            <div class="col-md-9">
            <input  type="password" name="password" id="password" class="form-control" required>
            </div>
        </div>
        <input type="submit" id="mybtn1" class="btn btn-default" value="Submit" >
    </div>   
</div>
</form>
</div>
<script>
function uporin(task)
{
    
    var tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    document.getElementById(task).style.display = "block";
}
document.getElementById("signup").style.display="none"; 
</script>
</div>
<?phpinclude 'footer.php'; ?>