<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";

    $f_name = $_POST['first_name'];
    $l_name = $_POST['last_name'];
    $u_email = $_POST['uwin_email'];
	$pass = $_POST['pass'];
	$d_pass = md5($pass);
	$admin_id = rand(1000,9999);
	
	$sql = "INSERT INTO admin_users (admin_id, first_name, last_name, status, password, uwin_email) VALUES ('$admin_id', '$f_name', '$l_name', 1, '$d_pass', '$u_email')";

              
            mysqli_query($conn, $sql);
			header("Location:admin_list.php");//redirection after inserting the value 
            // Close connection
			//	mysqli_close($conn);
?>