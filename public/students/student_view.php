<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php";
include "../../private/db.php";
$id = $_GET['st_num'];
$sql = "SELECT * FROM students where student_number ='$id'";
$result = mysqli_query($conn, $sql);

$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1><span style="color:grey">Student Portal / </span>Student Details</h1>
		<hr>
	</div>
	<a href="student.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
	<div class="row" style="background:white"> <!-- NEW STUDENT BUTTON-->
	
	
	
		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST-->
		
			<table class="table table-bordered">
			  <?php foreach($students as $st) {?>
			  
			  
			  <div class="row">
				<div class="col-lg-3">
				<label>Student number:<br></label>
				<?php echo $st['student_number']; ?>
				</div>
			  </div>
			  <div class="row">
				<div class="col-lg-3">
				<label>Name:</label>
				<?php echo $st['first_name']; ?> <?php echo $st['middle_name']; ?> <?php echo $st['last_name']; ?>
				</div>
				<div class="col-lg-6">
				<label>Address:</label>
				<?php echo $st['home_address']; ?>, <?php echo $st['home_city']; ?>, <?php echo $st['prov_id']; ?>, <?php echo $st['home_postal_code']; ?>
				</div>
			  </div>
			  <div class="row">
				<div class="col-lg-3">
				<label>School name:</label>
				<?php echo $st['school_id']; ?>
				</div>
				<div class="col-lg-3">
				<label>Uwin Email:</label>
				<?php echo $st['uwin_email']; ?>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-lg-3">
				<label>Primary Contact: </label>
				<?php echo $st['phone1']; ?>
				</div>
				<div class="col-lg-3">
				<label>Alternate contact: </label>
				<?php
					if($st['phone2'] == "")
					{
						echo "No alternate contact";
					}
					else
					{
						echo $st['phone2'];
					}
				?>
				</div>
			  </div>
			  
			  <div class="row">
				<div class="col-lg-3">
				<label>Start term:</label>
				<?php echo $st['start_term']; ?>
				</div>
				<div class="col-lg-3">
				<label>Status:</label>
				<?php 
					if($st['status']==0)
					{
						echo "Inactive";
					}
					else 
					{
						echo "Active";
					}
				?>
				</div>
			  </div>
			  <?php } ?>
			  
			  
			  
			 <div class="row">
				<div class="col-lg-4">
				<label>Class:</label>
				<?php
					$sec = "SELECT * FROM students_course_section WHERE student_number='$id'";
					$esec = mysqli_query($conn, $sec);
					$rsec = mysqli_fetch_all($esec, MYSQLI_ASSOC);
					foreach($rsec as $rs)
					{
						
				?>
					<?php echo $rs['class']; ?>
				</div>
				<div class="col-lg-4">
				<label>Section:</label>
				<?php echo $rs['section']; ?>
					<?php } ?>
				</div>
			</div>
			</table>
			
		
		</div>
			
		
	</div>
 
 </main>
	
</body>

</html>