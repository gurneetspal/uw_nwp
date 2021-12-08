<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1><span style="color:grey">Student Portal / </span>Insert details of new student</h1>
	</div>
	<hr>
	
	<div class="row" style="background:white">
	<a href="student.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
	<small style="margin-top:10px;"><p><i>Note:</i> <span style="color:red;">*</span><i> means a required field.</i></p></small>
	</div>
	<div class="row" style="background:white">
		<div class="col-lg-12" >
		  <form action="student_insert.php" method="post" encrypt="multipart/form-data">
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Student Number</label>
                            <input type="number" name="student_id" class="form-control" style="width:30%" required placeholder="Student number should be unique.." required>
                        </div>
						
						<div class="row">
                        <div class="form-group col-lg-4" >
                            <label><span style="color:red;">*</span>First Name</label>
                            <input name="first_name" class="form-control" placeholder="First name of the student" required>
                           
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Middle Name</label>
                            <input type="text" name="middle_name" class="form-control" placeholder="Middle name of the student">
                            
                        </div>
                        <div class="form-group col-lg-4">
                            <label><span style="color:red;">*</span>Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last name of the student" required>
						</div>
                        </div>
						
						<div class ="row">
                        <div class="form-group col-lg-4" >
                            <label><span style="color:red;">*</span>Uwin Email</label>
                            <input type="email" name="uwin_email" class="form-control" placeholder="University of Windsor Email id" required>
                           
                        </div>
                        <div class="form-group col-lg-4">
                            <label><span style="color:red;">*</span>School</label>
                            <select name="school" class="form-control" required>
								<option value="">--Choose one--</option>
								<?php
										$q = "SELECT * FROM schools";
										$q_e = mysqli_query($conn, $q);
										$q_r = mysqli_fetch_all($q_e, MYSQLI_ASSOC);
										foreach($q_r as $school_name)
										{
								?>
                                <option value="<?php echo $school_name['school_name']; ?>"><?php echo $school_name['school_name']; ?></option>
								<?php }?>
                            </select>
							
						</div>	
                       </div>
					   
					   <div class="row">
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Home Address</label>
                            <textarea type="text" name="home_address" class="form-control" placeholder="Should not be more than 50 words" required></textarea>
                     
                        </div>
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>City</label>
                            <input type="text" name="city" class="form-control" placeholder="Enter city name" required>
                      
                        </div>
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Province</label>
							<select name="province" class="form-control" required>
							<option>--Choose an option--</option>
							<?php 
								$prov = "SELECT * FROM provinces";
								$prov_ex = mysqli_query($conn, $prov);
								$prov_result = mysqli_fetch_all($prov_ex, MYSQLI_ASSOC);
								foreach($prov_result as $pr)
								{
							?>
							<option value="<?php echo $pr['province_name']; ?>"><?php echo $pr['province_name']; ?></option>
								<?php } ?>
							</select>

                           
                        </div>
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Postal Code</label>
                            <input type="text" name="postalcode" class="form-control" placeholder="Enter postal code" required>
                            
                        </div>
						</div>
						
						
						<div class="row">
                        <div class="form-group col-lg-4">
                            <label><span style="color:red;">*</span>Phone Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter phone number" required>
                            
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Alternate Number</label>
                            <input type="text" name="phone1" class="form-control" placeholder="Enter alternate phone number">
                           
                        </div>
						</div>
						
						<div class="row">
                        <div class="form-group col-lg-4">
                            <label><span style="color:red;">*</span>Start Term</label>
							<select name = "term" class="form-control" required>
							<option>--Choose an option--</option>
							<?php
								$term = "SELECT * FROM terms";
								$term_ex = mysqli_query($conn, $term);
								$term_re = mysqli_fetch_all($term_ex, MYSQLI_ASSOC);
								foreach($term_re as $t)
								{
							?>
							<option value="<?php echo $t['term_name']; ?>" ><?php echo $t['term_name']; ?></option>
								<?php } 
							?>
							</select>
                        </div>
                   
                            
                        
						<div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Status</label>
							
							<select class="form-control" required name="status">
								<option>--Choose an option--</option>
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
                            
                            
                        </div>
						</div>
						
                        <input type="submit" class="btn btn-primary" value="Submit">
                    <!--    <a href="student.php" class="btn btn-secondary ml-2">Cancel</a> -->
                    </form>
			
		</div>
	</div>
 
 </main>
	
</body>

</html>