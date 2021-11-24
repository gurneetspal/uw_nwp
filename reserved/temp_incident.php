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
		<a href="temp_placement_view.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
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
				<th>Class / Section</th>
				<td>1235 / 19</td>
			</tr>
			<tr>
				<th>Instructor Name</th>
				<td>Alex Mathew</td>
			</tr>
			
			<tr>
				<th>Hospital/Agency</th>
				<td>WRH Met Campus - 7 North</td>
			</tr>
			
			<tr>
				<th>Incident</th>
				<td>disconnected wrong IV line - blood came in contact with hand</td>
			</tr>
			
			<tr>
				<th>Date of occurence</th>
				<td>9/4/2014</td>
			</tr>
			
			<tr>
				<th>Date final form completed and sent to Health & Safety</th>
				<td>September 29, 2014 - emailed to Sherri</td>
			</tr>
			
			
			
				
			
			</table>
		
		</div>
	</div>
 
 </main>
	
</body>

</html>