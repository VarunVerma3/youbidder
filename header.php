
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href='styleheader.css' rel='stylesheet' type='text/css' >
<link href='front.css' rel='stylesheet'/>
<nav class="navbar navbar-default barcontainer">


<div class="navbar navbar-default ">
    <ul class="navbar nav">
	<li style="float:left;margin-left:30px;color:red"><h1>YOUBIDDER</h1></li>
    <?php
	  if(!isset($_SESSION['logname']))
	  {
	?>
	<li><a class="active" href="login.php"><h4>Login</h4></a></li>
	<?php
	  }
	  else
	  {
		 if($_SESSION['logname']!='admin')
		 {
	?>		
	     <li><a href="additem.php"><h4>Add Events</h4></a></li>
		 
		<?php
		 }
		?>
			<li><a href="admincheckdetails.php"><h4>All Events</h4></a></li>
			<li><a href="logout.php"><h4>Logout</h4></a></li>
	  <?php
	  }
	  ?>
    <li><a href="mainpage.php"><h4> Home</h4></a></li>    
    </ul>
    </div>
</nav>




    