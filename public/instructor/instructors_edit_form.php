<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php";
include "../../private/db.php";

$InstructorId = $_GET['InstructorId'];
$Type = $_GET['type'];

$result = $conn->query("SELECT * FROM instructors where instructor_id = $InstructorId");
    $row = $result->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
   // your code here   
       debugger;
       const queryString = window.location.search;

const urlParams = new URLSearchParams(queryString);

const page_type = urlParams.get('type')
debugger;
if(page_type=="'view'"){
    $('#form1 :input').prop('disabled', 'true');
    document.getElementById('btnsubmit').style.visibility="hidden";
    document.getElementById('btncancel').innerHTML="Back";
    document.getElementById('title').innerHTML="View details of ";



}
else{
    $('#form1 :input').prop('enabled', 'true');
    document.getElementById('btnsubmit').style.visibility="visible";
    document.getElementById('btncancel').innerHTML="Cancel";
    document.getElementById('title').innerHTML="Update details of ";



}
}, false);
</script>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1 id="title">Viewing details of  <?php echo $row['first_name']; ?><?php echo $row['last_name']; ?></h1>
	</div>
	<a href="instructor.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
	
	<div class="row" style="background:white">
	<small style="margin-top:10px;"><p><i>Note:</i> <span style="color:red;">*</span><i> means a required field.</i></p></small>
	</div>
	<div class="row" style="background:white">
		  <form id="form1"  action="instructors_process_Update.php?UpdateInstructorId=<?php echo $row['instructor_id'];?>" method="post" encrypt="multipart/form-data">
                       
                        <div class="form-group">
                            <label><span style="color:red;">*</span>First Name</label>
                            <input value="<?php echo $row['first_name']; ?>" name="first_name" class="form-control" placeholder="First name of the student" required>
                           <input type="hidden" name="InstructorId" value="<?php echo $InstructorId;?>">
                        </div>
                        
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Last Name</label>
                            <input value="<?php echo $row['last_name']; ?>" type="text" name="last_name" class="form-control" placeholder="Last name of the student" required>
                            
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Employee Number</label>
                            <input type="text"value="<?php echo $row['employee_num']; ?>" name="employee_number" class="form-control" placeholder="Enter Employee Number" required>
                        </div>  

                        <div class="form-group">
                            <label><span style="color:red;">*</span>Uwin Email</label>
                            <input value="<?php echo $row['uwin_email']; ?>" type="email" name="uwin_email" class="form-control" placeholder="University of Windsor Email id" required>
                           
                        </div>
                     
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Home Address</label>
                            <textarea  type="text" name="home_address" class="form-control" placeholder="Should not be more than 50 words" required><?php echo $row['address']; ?></textarea>
                     
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>City</label>
                            <input value="<?php echo $row['city']; ?>" type="text" name="city" class="form-control" placeholder="Enter city name" required>
                      
                        </div>
                    <!--ADD PROVINCE DETAILS HERE-->
						
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Postal Code</label>
                            <input value="<?php echo $row['postal_code']; ?>" type="text" name="postalcode" class="form-control" placeholder="Enter postal code" required>
                            
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Phone Number</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter phone number" required>
                            
                        </div>
                        <div class="form-group">
                            <label>Alternate Number</label>
                            <input type="text" name="phone1" class="form-control" placeholder="Enter alternate phone number">
                           
                        </div> 
                         <div class="form-group">
                            <label><span style="color:red;">*</span>Start Term</label>
                            <input type="text" name="term" class="form-control" placeholder="Start term, number only" required>
                            
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Contact Number</label>
                            <input value="<?php echo $row['instructor_phone1']; ?>" type="text" name="phone1" class="form-control"placeholder="Enter year number" required>
                            
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Phone 1 Device Type</label>
                            <select  class="form-control" required name="phone1_type">
                                  <option value="Mobile" <?php if( $row['phone_type1']=="Mobile") echo 'selected'; ?> >Mobile</option>
                                  <option value="Fax" <?php if( $row['phone_type1']=="Fax") echo 'selected'; ?> >Fax</option>
                                  <option value="Landline" <?php if( $row['phone_type1']=="Landline") echo 'selected'; ?> >Landline</option>
                            </select> 
                        </div>
                        
                        
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Phone 1 Ext</label>
                            <input value="<?php echo $row['instructor_ext1']; ?>" type="text" name="phone1_ext" class="form-control" placeholder="Extention 1" >

                            
                            
                        </div>

                     
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Phone 2 Device Type</label>
                            <select  class="form-control" required name="phone2_type">
                                  <option value="Mobile" <?php if( $row['phone_type2']=="Mobile") echo 'selected'; ?> >Mobile</option>
                                  <option value="Fax" <?php if( $row['phone_type2']=="Fax") echo 'selected'; ?> >Fax</option>
                                  <option value="Landline" <?php if( $row['phone_type2']=="Landline") echo 'selected'; ?> >Landline</option>
                            </select> 
                            
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Alternate Contact Number</label>
                            <input value="<?php echo $row['instructor_phone2']; ?>" type="text" name="phone2" class="form-control"placeholder="Enter alternate number" >
                            
                        </div>
                        
        <div class="form-group">
                            <label><span style="color:red;">*</span>Gender</label>
                            <select  class="form-control" required name="gender">
                                <option value="">--Choose one--</option>
                                <option value="male" <?php if( $row['gender']=="male") echo 'selected'; ?>>Male</option>
                                  <option value="female" <?php if( $row['gender']=="female") echo 'selected'; ?>>Female</option>
                                  <option value="Prefer not to say" <?php if( $row['gender']=="Prefer not to say") echo 'selected'; ?>>Prefer not to say</option>
                            </select> 
                            
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Highest Degree Completed</label>
                            <input value="<?php echo $row['highest_degree_completed']; ?>" type="text" name="Degree" class="form-control"placeholder="Enter Degree complition" required>
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>CNO</label>
                            <input value="<?php echo $row['cno']; ?>" type="text" name="Cno" class="form-control"placeholder="Enter cno number" required>
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Health Status Date</label>
                            <input value="<?php echo $row['health_status_date']; ?>" type="date" name="Health_status_dt" class="form-control"placeholder="Enter Health Status Date" required>
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>TB Test Date</label>
                            <input value="<?php echo $row['tb_test_date']; ?>" type="date" name="tb_Test_dt" class="form-control"placeholder="Enter TB Test Date" required>
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Immunization Submitted</label>
                            <select  class="form-control" required name="immunization">
                                <option value="1" <?php if( $row['immunization_submitted']=="1") echo 'selected'; ?>>Yes</option>
                                  <option value="0"<?php if( $row['immunization_submitted']=="0") echo 'selected'; ?>>No</option>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Mask Fit Testing Date</label>
                            <input value="<?php echo $row['mask_fit_testing_date']; ?>" type="date" name="mask_testing_dt" class="form-control"placeholder="Enter Mask Fit Testing Date" required>
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>BLS CPR Expiry Date</label>
                            <input value="<?php echo $row['bls_cpr_expiry_date']; ?>" type="date" name="bls_dt" class="form-control"placeholder="Enter BLS CPR Expiry Date" required>
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>SMG Training Date</label>
                            <input value="<?php echo $row['smg_training']; ?>" type="date" name="smg_dt" class="form-control"placeholder="Enter SMG training Date" required>
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Extended Police Clearence</label>
                            <select  class="form-control" required name="police">
                                <option value="1"  <?php if( $row['extended_police_clearance']=="1") echo 'selected'; ?>>Yes</option>
                                  <option value="0"  <?php if( $row['extended_police_clearance']=="0") echo 'selected'; ?>>No</option>
                                  </select> 
                        </div>
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Comment</label>
                            <textarea  name="comment" class="form-control"><?php echo $row['comments']; ?></textarea>
                        </div>
                    </div>
                        <div class="form-group sticky-top">
                        <input type="submit" id="btnsubmit" class="btn btn-primary" value="Submit">
                                           </div>
                    </form>
			
	</div>
 
 </main>
	
</body>

</html>