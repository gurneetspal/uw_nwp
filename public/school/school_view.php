<?php
include "../../private/header.php";
include "../../private/db.php";
$id = $_GET['st_num'];
$sql = "SELECT * FROM schools where school_id ='$id'";
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
		<h1>School Details</h1>
		<hr>
	</div>
	
	<div class="row" style="background:white"> <!-- NEW SCHOOL BUTTON-->
	<a href="school.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
		<div class="row" style="background:white; margin-top:30px;"> <!-- SCHOOL LIST-->
		
		<i style="color:green">Click on Student Number to edit or update Student information</i>
		
			<table class="table table-bordered">
			  <?php foreach($students as $st) {?>
			  <tr>
			    <td><span style="color:red">*</span><b>School Id</b></td>
				<td><a href="school_update_form.php?id=<?php echo $st['school_id']?>"><?php echo $st['school_id']; ?></a></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>School Name</b></td>
				<td><?php echo $st['school_name']; ?></td>
			  </tr>
			  
			   <tr>
			    <td><b>SchoolAbbreviation</b></td>
				<td><?php echo $st['school_abbreviation']; ?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>School Address</b></td>
				<td><?php echo $st['school_address']; ?></td>
			  </tr>
			  
			   
			   <tr>
			    <td><span style="color:red">*</span><b>School City</b></td>
				<td><?php echo $st['school_city']; ?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>province</b></td>
				<td><?php echo $st['prov_id']; ?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>School Postal Code</b></td>
				<td><?php echo $st['school_postal_code']; ?></td>
			  </tr>
			  
			  
			  
			   <tr>
			    <td><b>Last Updated</b></td>
				<td><?php echo $st['updated_at']; ?></td>
			  </tr>
			  <?php } ?>
			
			</table>
			
		
		</div>
			
		<div class="row" style="margin-top:10px;">
			<p><i>Note: <span style="color:red;">*</span> means mandatory field.</i></span></p>
		</div>
	</div>
 
 </main>
	
</body>

</html>