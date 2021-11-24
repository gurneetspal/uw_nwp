<?php
include "header.php";
include "db.php";

$sql = "SELECT * FROM placements ORDER BY placement_id";
$result = mysqli_query($conn, $sql);

$placements = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1>Placements</h1>
		<hr>
		<a href="placements.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
	</div>
		
		
		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST-->
			<table class="table table-bordered">
			<tr>
				<th>Student name / Student Number</th>
				<td>Johan Smith / 8803</td>
			</tr>
			<tr>
				<th>School</th>
				<td>University Of Windsor</td>
			</tr>
			<tr>
				<th>UWin email</th>
				<td>jsmith@uwindsor.ca</td>
			</tr>
			<tr>
				<th>Instructor Name</th>
				<td>Alex Mathew</td>
			</tr>
			<tr>
				<th>Class / Section</th>
				<td>1235 / 19</td>
			</tr>
			<tr>
				<th>Placements</th>
				<td>6N Medical MET</td>
			</tr>
			<tr>
				<th>Subject Code</th>
				<td>NURS 1515</td>
			</tr>
			<tr>
				<th>Timings</th>
				<td>Thurdays</td>
			</tr>
			<tr>
				<th>Start Date</th>
				<td>26/06/2021</td>
			</tr>
			<tr>
				<th>End Date</th>
				<td>03/01/2022</td>
			</tr>
			<tr>
				<th>Incidents recorded</th>
				<td><a href="temp_incident.php">View</a></td>
			</tr>
			
				
			
			</table>
		
		</div>
	</div>
 
 </main>
	
</body>

</html>