<?php
include "header.php";
include "db.php";

$Id = $_GET['class_number'];

$result = $conn->query("SELECT *,p.address as 'p_address' FROM class_lessons c inner join placements p on p.placement_id=c.placement_id
inner join instructors i on i.instructor_id=c.instructor_id
where class_number = $Id");
$row = $result->fetch_assoc();

$result1 = mysqli_query($conn,"SELECT *,p.address as 'p_address' FROM class_lessons c inner join placements p on p.placement_id=c.placement_id 
inner join instructors i on i.instructor_id=c.instructor_id where class_number = $Id");
$row1 = mysqli_fetch_row($result1);


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
	<table class="table table-bordered">
			  <tr>
			    <td><span style="color:red">*</span><b>Class Number</b></td>
				<td><?php echo $row['class_number']; ?></td>
			  </tr>
			  <tr>
			    <td><span style="color:red">*</span><b>Class Section</b></td>
				<td><?php echo $row['class_section']; ?></td>
			  </tr>
			  <tr>
			    <td><span style="color:red">*</span><b>Course Id</b></td>
				<td><?php echo $row['course_id']; ?></td>
			  </tr>
			<tr>
			  <td><span style="color:red">*</span><b>Days</b></td>
			  <td>
				  <table>
			  <?php $j=0;?>
			  <?php for ($i=3;$i<=9;$i++)
			  { 
				  ?>
			  <tr>
				  <td>
					  <?php if($row1[$i]!=0 ){
						  echo mysqli_fetch_field_direct($result1,$i)->name." -- From: ".date("h:i A",strtotime($row1[$i+7+$j]))."  To: ".date("h:i A",strtotime($row1[$i+8+$j]));
						}
					  ?>
					</td>
			  </tr>
			  <?php 
			  $j++;
 			} ?>
			 </table>
			 </td>
		</tr>
			  <tr>
			    <td><span style="color:red">*</span><b>Instructor</b></td>
				<td><?php echo $row['first_name']; ?> <?php echo $row['last_name']; ?></td>
			  </tr>
			  <tr>
			    <td><span style="color:red">*</span><b>Placement</b></td>
				<td><?php echo $row['p_address']; ?></td>
			  </tr>
			</table>
	    </div>

</main>

	
</body>

</html>