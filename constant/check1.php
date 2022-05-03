<?php
session_start();
//echo $_SESSION['alogin'];exit;
if(!isset($_SESSION['login']))
{
	//echo $_SESSION['alogin'];exit;
	header("location:login.php");


}
?>