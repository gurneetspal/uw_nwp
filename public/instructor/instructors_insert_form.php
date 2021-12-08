<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php";
include "../../private/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
</head>

<body>

<main id="main" class="main ">
    <div>
		<h1>Insert details of new Instructor</h1>
		<hr>
    </div>
	
	
    <div style="background:white">
	<a href="instructor.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
	        <small style="margin-top:20px" ><p><i>Note:</i> <span style="color:red;">*</span><i> means a required field.</i></p></small>
    </div>
	
    <div style="background:white">
		<form  action="instructors_process.php" method="post" encrypt="multipart/form-data">
            <div >            
					<div class="row">
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>First Name</label>
                            <input name="first_name" class="form-control" placeholder="First name of the student" required>
                           
                        </div>
                        <div class="form-group col-lg-3">
                            <label>Middle Name</label>
                            <input type="text" name="middle_name" class="form-control" placeholder="Middle name of the student">
                            
                        </div>
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last name of the student" required>
                            
                        </div>
					</div>	
					<div class="row">
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Uwin Email</label>
                            <input type="email" name="uwin_email" class="form-control" placeholder="University of Windsor Email id" required>
                        </div>   
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Employee Number</label>
                            <input type="text" name="employee_number" class="form-control" placeholder="Enter Employee Number" required>
                        </div>      
					</div>			
					<div class="row">
                        <div class="form-group col-lg-4">
                            <label><span style="color:red;">*</span>Home Address</label>
                            <textarea type="text" name="home_address" class="form-control" placeholder="Should not be more than 50 words" required></textarea>
                     
                        </div>
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>City</label>
                            <input type="text" name="city" class="form-control" placeholder="Enter city name" required>
                      
                        </div>
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Province</label>
                            <select class="form-control" name="province">
                        <option value="">Select Province</option>
                        <?php
        
                        $result = mysqli_query($conn,"SELECT * FROM provinces");
                        while($row = mysqli_fetch_array($result)) 
						{
                        ?>
                        <option value="<?php echo $row['prov_id'];?>"><?php echo $row["province_name"];?></option>
                        <?php
                     }
                     ?>
                  </select>                           
                        </div>
					</div>

					
					<div class="row">
                        <div class="form-group col-lg-2">
                            <label><span style="color:red;">*</span>Postal Code</label>
                            <input type="text" name="postalcode" class="form-control" placeholder="Enter postal code" required>
                            
                        </div>
					</div>
					
					<div class="row">	
                        <div class="form-group col-lg-2">
                            <label><span style="color:red;">*</span>Phone 1 Device Type</label>
                            <select  class="form-control" required name="phone1_type">
                                <option value="Mobile">Mobile</option>
                                  <option value="Fax">Fax</option>
                                  <option value="Landline">Landline</option>
                            </select> 
                            
                        </div>
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Contact Number</label>
                            <input type="text" name="phone1" class="form-control"placeholder="Enter your number" required>
                            
                        </div>
                        <div class="form-group col-lg-2">
                            <label><span style="color:red;">*</span>Phone 1 Ext</label>
                            <input type="text" name="phone1_ext" class="form-control"placeholder="Enter your ext if exists" >
                            
                        </div>                  
                        <div class="form-group col-lg-2">
                            <label><span style="color:red;">*</span>Phone 2 Device Type</label>
                            <select  class="form-control"  name="phone2_type">
                                <option value="">--Choose one--</option>
                                <option value="Mobile">Mobile</option>
                                  <option value="Fax">Fax</option>
                                  <option value="Landline">Landline</option>
                            </select> 
                            
                        </div> 
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Alternate Contact Number</label>
                            <input type="text" name="phone2" class="form-control"placeholder="Enter your number" >
                            
                        </div>
					</div>	
					
					<div class="row">
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Gender</label>
                            <select  class="form-control" required name="gender">
                                <option value="">--Choose one--</option>
                                <option value="male">Male</option>
                                  <option value="female">Female</option>
                                  <option value="Prefer not to say">Prefer not to say</option>
                            </select>  
                        </div>
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Highest Degree Completed</label>
                            <input type="text" name="Degree" class="form-control"placeholder="Enter Degree complition" required>
                        </div>
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>CNO</label>
                            <input type="text" name="Cno" class="form-control"placeholder="Enter cno number" required>
                        </div>
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Health Status Date</label>
                            <input type="date" name="Health_status_dt" class="form-control"placeholder="Enter Health Status Date" required>
                        </div>
					</div>

					<div class="row">
                        <div class="form-group col-lg-2">
                            <label><span style="color:red;">*</span>TB Test Date</label>
                            <input type="date" name="tb_Test_dt" class="form-control"placeholder="Enter TB Test Date" required>
                        </div>
                        <div class="form-group col-lg-2">
                            <label><span style="color:red;">*</span>Immunization Submitted</label>
                            <select  class="form-control" required name="immunization">
                                <option value="1">Yes</option>
                                  <option value="0">No</option>
                            </select> 
                        </div>
                        <div class="form-group col-lg-2">
                            <label><span style="color:red;">*</span>Mask Fit Testing Date</label>
                            <input type="date" name="mask_testing_dt" class="form-control"placeholder="Enter Mask Fit Testing Date" required>
                        </div>
                        <div class="form-group col-lg-2">
                            <label><span style="color:red;">*</span>BLS CPR Expiry Date</label>
                            <input type="date" name="bls_dt" class="form-control"placeholder="Enter BLS CPR Expiry Date" required>
                        </div>
                        <div class="form-group col-lg-2">
                            <label><span style="color:red;">*</span>SMG Training Date</label>
                            <input type="date" name="smg_dt" class="form-control"placeholder="Enter SMG training Date" required>
                        </div>
					</div>
					<div class="row">		
                        <div class="form-group col-lg-2">
                            <label><span style="color:red;">*</span>Extended Police Clearence</label>
                            <select  class="form-control" required name="police">
                                <option value="1">Yes</option>
                                  <option value="0">No</option>
                                  </select> 
                        </div>
					</div>	
					<div class="row">
                        <div class="form-group col-lg-6">
                            <label><span style="color:red;">*</span>Comment</label>
                            <textarea  name="comment" class="form-control" placeholder="200 words max"></textarea>
                        </div>
					</div>	
            </div>
            
            
                <div class="form-group sticky-top">
                    <input type="submit" class="btn btn-primary" name="submitInstructor" value="Submit">
                   <!-- <a href="instructor.php" class="btn btn-secondary ml-2">Cancel</a>-->
                </div>
        </form>
	    </div>

</main>

	
</body>

</html>