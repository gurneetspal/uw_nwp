<?php
include "header.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>


        function isIntKey(e) {
            var charCode = (e.which) ? e.which : event.keyCode
            if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57)) {

                alert("Please Enter Only Numbers.");
                e.preventDefault();
                return false;
            }
            if (charCode == 46) {
                alert("Please Enter Only Numbers.");
                e.preventDefault();
                return false;
            }
            return true;
        }

        function isOnlyAlphabet(e) {
            var charCode = (e.which) ? e.which : event.keyCode
            if (charCode >= 48 && charCode <= 57) {
                alert("Please Enter Only Alphabets.");
                e.preventDefault();
                return false;


            }
            return true;
        }

      
    

$(document).ready(function() {
    $('input[type=checkbox][name=monday]').change(function() {
        if ($(this).is(':checked')) {
            debugger;
            document.getElementsByName('mon_time_s')[0].removeAttribute('readonly');
            document.getElementsByName('mon_time_e')[0].removeAttribute('readonly');
            document.getElementsByName('hid_monday')[0].value="1";

            }
        else {
            document.getElementsByName('mon_time_s')[0].readonly=true;
            document.getElementsByName('mon_time_e')[0].readonly=true;
            document.getElementsByName('hid_monday').value="0";



        }
    });
    $('input[type=checkbox][name=tuesday]').change(function() {
        if ($(this).is(':checked')) {
            debugger;
            document.getElementsByName('tue_time_s')[0].removeAttribute('readonly');
            document.getElementsByName('tue_time_e')[0].removeAttribute('readonly');
            document.getElementsByName('hid_tuesday')[0].value="1";


            }
        else {
            document.getElementsByName('tue_time_s')[0].readonly=true;
            document.getElementsByName('tue_time_e')[0].readonly=true;
            document.getElementsByName('hid_tuesday')[0].value="0";


        }
    });
    $('input[type=checkbox][name=wednesday]').change(function() {
        if ($(this).is(':checked')) {
            debugger;
            document.getElementsByName('wed_time_s')[0].removeAttribute('readonly');
            document.getElementsByName('wed_time_e')[0].removeAttribute('readonly');
            document.getElementsByName('hid_wednesday')[0].value="1";


            }
        else {
            document.getElementsByName('wed_time_s')[0].readonly=true;
            document.getElementsByName('wed_time_e')[0].readonly=true;
            document.getElementsByName('hid_wednesday')[0].value="0";

        }
    });
    $('input[type=checkbox][name=thursday]').change(function() {
        if ($(this).is(':checked')) {
            debugger;
            document.getElementsByName('thur_time_s')[0].removeAttribute('readonly');
            document.getElementsByName('thur_time_e')[0].removeAttribute('readonly');
            document.getElementsByName('hid_thursday')[0].value="1";


            }
        else {
            document.getElementsByName('thur_time_s')[0].readonly=true;
            document.getElementsByName('thur_time_e')[0].readonly=true;
            document.getElementsByName('hid_thursday')[0].value="0";
        }
    });
    $('input[type=checkbox][name=friday]').change(function() {
        if ($(this).is(':checked')) {
            debugger;
            document.getElementsByName('fri_time_s')[0].removeAttribute('readonly');
            document.getElementsByName('fri_time_e')[0].removeAttribute('readonly');
            document.getElementsByName('hid_friday')[0].value="1";


            }
        else {
            document.getElementsByName('fri_time_s')[0].readonly=true;
            document.getElementsByName('fri_time_e')[0].readonly=true;
            document.getElementsByName('hid_friday')[0].value="0";

        }
    });
    $('input[type=checkbox][name=saturday]').change(function() {
        if ($(this).is(':checked')) {
            debugger;
            document.getElementsByName('sat_time_s')[0].removeAttribute('readonly');
            document.getElementsByName('sat_time_e')[0].removeAttribute('readonly');
            document.getElementsByName('hid_saturday')[0].value="1";


            }
        else {
            document.getElementsByName('sat_time_s')[0].readonly=true;
            document.getElementsByName('sat_time_e')[0].readonly=true;
            document.getElementsByName('hid_saturday')[0].value="0";

        }
    });
    $('input[type=checkbox][name=sunday]').change(function() {
        if ($(this).is(':checked')) {
            debugger;
            document.getElementsByName('sun_time_s')[0].removeAttribute('readonly');
            document.getElementsByName('sun_time_e')[0].removeAttribute('readonly');
            document.getElementsByName('hid_sunday')[0].value="1";


            }
        else {
            document.getElementsByName('sun_time_s')[0].readonly=true;
            document.getElementsByName('sun_time_e')[0].readonly=true;
            document.getElementsByName('hid_sunday')[0].value="0";

        }
    });
});

    </script>
</head>

<body>

<main id="main" class="main ">
    <div>
		<h1>Insert details of Class</h1>
		<hr>
    </div>
	
	
    <div style="background:white">
	<a href="instructor.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
	        <small style="margin-top:20px" ><p><i>Note:</i> <span style="color:red;">*</span><i> means a required field.</i></p></small>
    </div>
    <div style="background:white">
		<form  action="class_insert.php" method="post" encrypt="multipart/form-data">
            <div >            
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-2"><span style="color:red;">*</span>Class Number</label>
                            <div class="col-md-4">
                            <input name="class_number" onkeydown=isIntKey(event) class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2"><span style="color:red;">*</span>Class Section</label>
                            <div class="col-md-4">

                            <input type="text" name="class_section" onkeydown=isIntKey(event) class="form-control" required>
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-md-2"><span style="color:red;">*</span>Course Id</label>
                            <div class="col-md-4">

                        <select class="form-control" name="course_id">
                            <option value="">Select Course</option>
                        <?php
                        require_once "db.php";
                        $result = mysqli_query($conn,"SELECT * FROM courses");
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row['course_id'];?>"><?php echo $row["course_title"];?> - <?php echo $row["course_catalogue_no"];?></option>
                        <?php
                     }
                     ?>
                     </select>
                        </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Monday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="monday" id="days"   >
                            <input type="hidden" name="hid_monday"  value="0" />
                            
                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time"  name="mon_time_s" readonly=true  >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time"  name="mon_time_e" readonly=true  >

                        </div>  
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Tuesday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="tuesday"  >
                            <input type="hidden" name="hid_tuesday" value="0" />

                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time"  name="tue_time_s"readonly=true   >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time"  name="tue_time_e" readonly=true  >

                        </div>  
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Wednesday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="wednesday"  >
                            <input type="hidden" name="hid_wednesday"  value="0"/>

                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time"  name="wed_time_s" readonly=true   >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time"  name="wed_time_e" readonly=true  >

                        </div>  
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Thursday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="thursday"  >
                            <input type="hidden" name="hid_thursday" value="0" />

                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time"  name="thur_time_s" readonly=true   >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time"  name="thur_time_e"  readonly=true  >

                        </div>  
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Friday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="friday"  >
                            <input type="hidden" name="hid_friday"  value="0"/>

                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time"  name="fri_time_s" readonly=true   >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time"  name="fri_time_e"  readonly=true  >

                        </div>  
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Saturday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="saturday"  >
                            <input type="hidden" name="hid_saturday"  value="0"/>

                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time"  name="sat_time_s" readonly=true  >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time"  name="sat_time_e" readonly=true   >

                        </div> 
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Sunday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="sunday"  >
                            <input type="hidden" name="hid_sunday"  value="0"/>

                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time"  name="sun_time_s" readonly=true  >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time"  name="sun_time_e" readonly=true  >

                        </div>  
                        <div class="form-group row">
                            <label class="col-md-2"><span style="color:red;">*</span>Instructor</label>
                            <div class="col-md-4">

                        <select class="form-control" name="instructor_id">
                            <option value="">Select Instructor</option>
                        <?php
                        require_once "db.php";
                        $result = mysqli_query($conn,"SELECT * FROM instructors");
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row['instructor_id'];?>"><?php echo $row["first_name"];?> <?php echo $row["last_name"];?></option>
                        <?php
                     }
                     ?>
                    
                     </select>
                     </div>
                    </div>
                     <div class="form-group row">
                            <label class="col-md-2" class="col-md-2"><span style="color:red;">*</span>Placement Address</label>
                            <div class="col-md-4">
                            <input name="address"   class="form-control"  required>
                            </div>
                        </div> 
            
            
                <div class="form-group sticky-top">
                    <input type="submit" class="btn btn-primary" name="submitInstructor" value="Submit">
                    <a href="instructor.php" class="btn btn-secondary ml-2">Cancel</a>
                </div>
        </form>
	    </div>

</main>

	
</body>

</html>