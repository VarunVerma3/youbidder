<?php
session_start();

		if(!isset($_SESSION['logname']))
		{
		header("location:index.php");
		}
		else
		{
			
                    unset($_SESSION["logname"]);
		session_destroy();
		header('location:index.php');
		}
		die();
?>	