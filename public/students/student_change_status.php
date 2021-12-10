<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
 include "../../private/db.php";
 $id = $_GET['id'];
 $check = "SELECT * FROM students WHERE student_number='$id'";
 $echeck = mysqli_query($conn, $check);
 $rcheck = mysqli_fetch_all($echeck, MYSQLI_ASSOC);
 foreach($rcheck as $rc)
 {
	
		 $up = "Delete from students where student_number='$id'";
		 mysqli_query($conn, $up);
		 header("LOCATION:student.php");
		 

	 
 }
?>