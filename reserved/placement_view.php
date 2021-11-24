<?php
include "header.php";
include "db.php";
$id = $_GET['st_num'];
$sql = "SELECT * FROM placements where placement_id ='$id'";
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
		<h1>Placement details</h1>
	</div>
	
	<div class="row" style="background:white"> <!-- NEW STUDENT BUTTON-->
	
		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST-->
		
			<table>
			  <?php foreach($placements as $st) {?>
			  <tr>
			    <td><span style="color:red">*</span><b>placements ID</b></td>
				<td><a href="placement_update_form.php?id=<?php echo $st['placement_id']?>"><?php echo $st['placement_id']; ?></a> <i><small style="color:green">Click on the id to update details</small></i></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Name</b></td>
				<td><?php echo $st['name']; ?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Department</b></td>
				<td><?php echo $st['department']; ?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Address</b></td>
				<td><?php echo $st['address']; ?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>City</b></td>
				<td><?php echo $st['city']; ?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Province ID</b></td>
				<td><?php echo $st['prov_id']; ?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Postal Code</b></td>
				<td><?php echo $st['postal_code']; ?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Phone</b></td>
				<td><?php echo $st['phone']; ?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Ext</b></td>
				<td><?php echo $st['ext']; ?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Contact Person</b></td>
				<td><?php echo $st['contact_person']; ?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Contact Person Title</b></td>
				<td><?php echo $st['contact_person_title']; ?></td>
			  </tr>

			  <tr>
			    <td><b>Created at</b></td>
				<td><?php echo $st['created_at']; ?></td>
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