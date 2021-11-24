<?php
include "../../private/header.php";
include "../../private/db.php";

$id = $_GET['id'];
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
		<h1><span style="color:grey">Student Portal / </span>Student Update Details</h1><hr>
	</div>
	
	<div class="row" style="background:white"> <!-- NEW STUDENT BUTTON-->
<a href="student.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST--> <p><i>Note: <span style="color:red;">*</span> means mandatory field.</i></span></p>
			<?php foreach($students as $st) {?>
		
		
		
		
		
		
		<form action="student_update_insert.php?st_id=<?php echo $st['student_number']?>" method="post" >
			<table class="table table-bordered">
			 
			 
			  <tr>
			    <td><span style="color:red">*</span><b>Student Number</b></td>
				<td><?php echo $st['student_number'];?></td>
			  </tr>
			  
			   <tr>
			    <td ><span style="color:red">*</span><b>First Name</b></td>
				<td><input name="first_name" style="width=:100%; border-style:hidden; color:blue; width:100%" type="text" value="<?php echo $st['first_name']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><b>Middle Name</b></td>
				<td><input name="middle_name" type="text" style="color:blue; border-style:hidden; width:100%" placeholder='Middle name' value="<?php echo $st['middle_name']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Last Name</b></td>
				<td><input name="last_name" style="color:blue; border-style:hidden; width:100%" type="text" value="<?php echo $st['last_name']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Uwin Email</b></td>
				<td><input name="uwin_email" style="color:blue; border-style:hidden; width:100%" type="email" value ="<?php echo $st['uwin_email']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>School ID</b></td>
				<td><input name="school_id"  style="color:blue; border-style:hidden; width:100%" type="text" value="<?php echo $st['school_id']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Home Address</b></td>
				<td><input name="home_address" type="text" style="color:blue; border-style:hidden; width:100%" value="<?php echo $st['home_address']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Home City</b></td>
				<td><input name="home_city" type="text" style="color:blue; border-style:hidden; width:100%"  value="<?php echo $st['home_city']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>province</b></td>
				<td><input name="province" type="text" style="color:blue; border-style:hidden; width:100%" value="<?php echo $st['prov_id']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Home Postal Code</b></td>
				<td><input name="home_postal_code"  style="color:blue; border-style:hidden; width:100%" type="text" value="<?php echo $st['home_postal_code']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Primary Contact</b></td>
				<td><input name="primary_contact" style="color:blue; border-style:hidden; width:100%" type="text" value="<?php echo $st['phone1']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><b>Alternate Contact</b></td>
				<td><input name="alternate_contact" style="color:blue; border-style:hidden; width:100%" type="text" placeholder='Alternate phone number' value="<?php echo $st['phone2']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Start Term</b></td>
				<td><input name="start_term" style="color:blue; border-style:hidden; width:100%" type="text" value="<?php echo $st['start_term']; ?>"> </td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Status</b></td>
				<td><span style="color:blue; border-style:hidden"><?php
				if($st['status'] == 0)
				{
					echo "Inactive";
				}
				else
				{
					echo "Active";
				}
				?></span></td>
			  </tr>
			  
			  
			
			</table>
			 <span title="Click to submit the update"><input type="submit" class="btn btn-primary" value="Submit"></span>
			</form> <?php } ?>
		
		</div>
			
		<div class="row" style="margin-top:10px;">
			
		</div>
	</div>
 
 </main>
	
</body>

</html>
