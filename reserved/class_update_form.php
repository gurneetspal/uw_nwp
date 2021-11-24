<?php
include "header.php";
include "db.php";

$Id = $_GET['class_number'];

$result = $conn->query("SELECT * FROM class_lessons where class_number = $Id");
    $row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>


$(document).ready(function() {
    debugger;
    $('input[type=checkbox][name=monday]').change(function() {
        debugger;

        if ($(this).is(':checked')) {
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
		<h1>Update details of Class</h1>
		<hr>
    </div>
	
	
    <div style="background:white">
	<a onclick="history.back(-1)" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
	        <small style="margin-top:20px" ><p><i>Note:</i> <span style="color:red;">*</span><i> means a required field.</i></p></small>
    </div>
    <div style="background:white">
		<form  action="class_update.php" method="post" encrypt="multipart/form-data">
            <div >            
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-2"><span style="color:red;">*</span>Class Number</label>
                            <div class="col-md-4">
                            <input name="class_number" value=<?php echo $row['class_number']?> class="form-control"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2"><span style="color:red;">*</span>Class Section</label>
                            <div class="col-md-4">

                            <input type="text" name="class_section" value=<?php echo $row['class_section']?> class="form-control" required>
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
                        while($st = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $st['course_id'];?>" <?php if($row['course_id']==$st['course_id']) echo "selected"?>>
                        <?php echo $st["course_title"];?> - <?php echo $st["course_catalogue_no"];?></option>
                        <?php
                     }
                     ?>
                     </select>
                        </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Monday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="monday"  <?php if($row['monday']=="1") echo "checked"; ?> >
                            <input type="hidden" name="hid_monday"  value="0" />
                            
                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time" value="<?php if($row['monday']=="1") echo $row['mon_time_s']?>" name="mon_time_s" readonly=true  >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time" value="<?php if($row['monday']=="1") echo $row['mon_time_e']?>"  name="mon_time_e" readonly=true  >

                        </div>  
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Tuesday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="tuesday"  <?php if($row['tuesday']=="1") echo "checked"; ?>>
                            <input type="hidden" name="hid_tuesday" value="0" />

                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time" value="<?php if($row['tuesday']=="1") echo $row['tue_time_s']?>"  name="tue_time_s" readonly=true   >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time" value="<?php if($row['tuesday']=="1") echo $row['tue_time_s']?>"  name="tue_time_e" readonly=true  >

                        </div>  
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Wednesday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="wednesday" <?php if($row['wednesday']=="1") echo "checked"; ?> >
                            <input type="hidden" name="hid_wednesday"  value="0"/>

                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time" value="<?php if($row['wednesday']=="1") echo $row['wed_time_s']?>" name="wed_time_s" readonly=true   >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time" value="<?php if($row['wednesday']=="1") echo $row['wed_time_e']?>" name="wed_time_e" readonly=true  >

                        </div>  
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Thursday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="thursday" <?php if($row['thursday']=="1") echo "checked"; ?> >
                            <input type="hidden" name="hid_thursday" value="0" />

                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time" value="<?php if($row['thursday']=="1") echo $row['thur_time_s']?>" name="thur_time_s" readonly=true   >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time"value="<?php if($row['thursday']=="1") echo $row['thur_time_e']?>" name="thur_time_e"  readonly=true  >

                        </div>  
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Friday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="friday" <?php if($row['friday']=="1") echo "checked"; ?> >
                            <input type="hidden" name="hid_friday"  value="0"/>

                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time" value="<?php if($row['friday']=="1") echo $row['fri_time_s']?>" name="fri_time_s" readonly=true   >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time" value="<?php if($row['friday']=="1") echo $row['fri_time_e']?>" name="fri_time_e"  readonly=true  >

                        </div>  
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Saturday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="saturday" <?php if($row['saturday']=="1") echo "checked"; ?>  >
                            <input type="hidden" name="hid_saturday"  value="0"/>

                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time" value="<?php if($row['saturday']=="1") echo $row['sat_time_s']?>" name="sat_time_s" readonly=true  >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time" value="<?php if($row['saturday']=="1") echo $row['sat_time_e']?>" name="sat_time_e" readonly=true   >

                        </div> 
                        <div class="form-group row">
                            <label class="col-md-2" class="col-md-1">Sunday</label>
                            <input class="col-md-1" type="checkbox" value="0" name="sunday" <?php if($row['sunday']=="1") echo "checked"; ?> >
                            <input type="hidden" name="hid_sunday"  value="0"/>

                            <label class="col-md-2" class="col-md-2">Start time</label>
                            <input class="col-md-2" type="time" value="<?php if($row['sunday']=="1") echo $row['sun_time_s']?>"  name="sun_time_s" readonly=true  >
                            <label class="col-md-2" class="col-md-2">End Time</label>
                            <input class="col-md-2 " type="time" value="<?php if($row['sunday']=="1") echo $row['sun_time_e']?>" name="sun_time_e" readonly=true  >

                        </div>  
                        <div class="form-group row">
                            <label class="col-md-2"><span style="color:red;">*</span>Instructor</label>
                            <div class="col-md-4">

                        <select class="form-control" name="instructor_id">
                            <option value="">Select Instructor</option>
                        <?php
                        require_once "db.php";
                        $result = mysqli_query($conn,"SELECT * FROM instructors");
                        while($st = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $st['instructor_id'];?>" <?php if($row['instructor_id']==$st['instructor_id']) echo "selected"?>>
                        <?php echo $st["first_name"];?> <?php echo $st["last_name"];?>
                        </option>
                        <?php
                     }
                     ?>
                     </select>
                     </div>

                        </div> 
                </div>
            
            
                <div class="form-group sticky-top">
                    <input type="submit" class="btn btn-primary" name="submitInstructor" value="Update">
                    <a href="class.php" class="btn btn-secondary ml-2">Cancel</a>
                </div>
        </form>
	    </div>

</main>

	
</body>

</html>