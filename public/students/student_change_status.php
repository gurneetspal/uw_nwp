<?php
 include "../../private/db.php";
 $id = $_GET['id'];
 $check = "SELECT * FROM students WHERE student_number='$id'";
 $echeck = mysqli_query($conn, $check);
 $rcheck = mysqli_fetch_all($echeck, MYSQLI_ASSOC);
 foreach($rcheck as $rc)
 {
	 if($rc['status'] == 1)
	 {
		 $up = "UPDATE students SET status = 0 WHERE student_number='$id'";
		 mysqli_query($conn, $up);
		 header("LOCATION:student.php");
		 
	 }
	 if($rc['status'] == 0)
	 {
		$up = "UPDATE students SET status = 1 WHERE student_number='$id'";
		 mysqli_query($conn, $up);
		  header("LOCATION:student.php");
	 }
	 
 }
?>