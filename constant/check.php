<?php 

session_start();

require_once 'connect.php';

//echo $_SESSION['userId'];

if(!$_SESSION['userId']) {
	header('location:./login.php');	
} 



?>