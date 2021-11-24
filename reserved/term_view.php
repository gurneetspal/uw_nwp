<?php
include "header.php";
include "db.php";
$id = $_GET['st_num'];
$sql = "SELECT * FROM terms where term_id ='$id'";
$result = mysqli_query($conn, $sql);

$instructors = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1>Term details</h1>
		<hr>
	</div>
	
	<div class="row" style="background:white"> <!-- NEW STUDENT BUTTON-->
	<a href="term.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
	
		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST-->
		
			<table class="table table-bordered">
			  <?php foreach($instructors as $st) {?>
			  
			   			
			<tr>
				<th>Term Name/id</th>
				<td><?php echo $st['term_name']; ?> / wh101</td>
			</tr>
			<tr>
				<th>Student Name / Student Number</th>
				<td>Johan Smith / 808112</td>
			</tr>
			<tr>
				<th>Student Email</th>
				<td>jsmith@uwin.ca</td>
			</tr>
			<tr>
				<th>School</th>
				<td>University of Windsor</td>
			</tr>
			</table>
			
			<table class="table table-bordered">
			<tr>
				<th>Instructor Name</th>
				<td>Alex Mathew</td>
			</tr>
			<tr>
				<th>Class</th>
				<td>502</td>
			</tr>
			<tr>
				<th>Section</th>
				<td>32</td>
			</tr>
			  
			  
			  <?php } ?>
			
			</table>
			
		
		</div>
			
		<div class="row" style="margin-top:10px;">
			
		</div>
	</div>
 
 </main>
	
</body>

</html>