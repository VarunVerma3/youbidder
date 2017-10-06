<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style>
#mail:valid
{
	color:green;
}
#mail:invalid
{
	color:red;
}
</style>
<script>
function myFunction() {
    var x = document.getElementById("mail");
    x.value = x.value.toUpperCase();
}
</script>

<form name="myform" method="post"  action="#">
Email:<input id="mail" title="Enter only alphabets" onfocusout="myFunction()" type="text" name="uemail" pattern="/^[a-zA-Z ]*$/"><br>
Password:<input type="password" name="password" required><br>
<input type="submit">
</form>

<script>
    
</script>