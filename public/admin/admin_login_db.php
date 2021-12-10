<?php
include "../../private/db.php";

session_start();


if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$myusername = $_POST['username'];
	$mypassword = $_POST['pass'];
	$d_pass = md5($mypassword);
	
	$sql = "SELECT * FROM admin_users WHERE admin_id = '$myusername' AND password = '$d_pass' ";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	
	$count = mysqli_num_rows($result);
	$stats = $row['status'];
	
	if($count == 1 && $stats == 1)
	{
		$_SESSION['login'] =$row['first_name']." ".$row['last_name'];
		header("location:../../public/homepage/homepage.php");
	}
	else{
		$_SESSION['err'] = "Wrong user id or password";
		$error="Enter Valid credentials";
		header("LOCATION:../../index.php");
	}
	
}

?>