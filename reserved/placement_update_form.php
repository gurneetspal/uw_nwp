<?php
include "header.php";
include "db.php";
$id = $_GET['id'];
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
		<?php foreach($placements as $st) {?>
		<form action="placement_update_insert.php?st_id=<?php echo $st['placement_id']?>" method="post" encrypt="multipart/form-data">
			<table>
			 
			  <tr>
			    <td><span style="color:red">*</span><b>Placement ID</b></td>
				<td><?php echo $st['placement_id'];?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Name</b></td>
				<td><input name="name" type="text" value="<?php echo $st['name']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Department</b></td>
				<td><input name="department" type="text" placeholder='department name' value="<?php echo $st['department']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Address</b></td>
				<td><input name="address" type="text" value="<?php echo $st['address']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>City</b></td>
				<td><input name="city" type="text" value ="<?php echo $st['city']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Prov ID</b></td>
				<td><input name="prov_id" type="text" value="<?php echo $st['prov_id']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Home Postal Code</b></td>
				<td><input name="postal_code" type="text" value="<?php echo $st['postal_code']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Phone</b></td>
				<td><input name="phone" type="text" value="<?php echo $st['phone']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><b>EXT</b></td>
				<td><input name="ext" type="text" placeholder='Extension' value="<?php echo $st['ext']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Contact Person</b></td>
				<td><input name="contact_person" type="text" value="<?php echo $st['contact_person']; ?>"> </td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Contact Person Title</b></td>
				<td><input name="contact_person_title" type="text" value="<?php echo $st['contact_person_title']; ?>"</td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Created At</b></td>
				<td><input name="created_at" type="text" value="<?php echo $st['created_at']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><b>Last Updated</b></td>
				<td><?php echo $st['updated_at']; ?></td>
			  </tr>
			  <?php } ?>
			</table>
			 <input type="submit" class="btn btn-primary" value="Submit">
			</form>
		
		</div>
			
		<div class="row" style="margin-top:10px;">
			<p><i>Note: <span style="color:red;">*</span> means mandatory field.</i></span></p>
		</div>
	</div>
 
 </main>
	
</body>

</html>
