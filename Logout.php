<?php require_once("Includes/DB.php"); ?>
<?php require_once("Includes/Functions.php"); ?>
<?php 
$_SESSION["User_ID"]=null;
$_SESSION["Username"]=null;
$_SESSION["AdminName"]=null;
session_destroy();
Redirect_to("Login.php");
?>