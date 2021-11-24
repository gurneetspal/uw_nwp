<?php

include "db.php";

$class_number= $_POST['class_number'];
$course_id= $_POST['course_id']; 
$class_section= $_POST['class_section'];
$mon_time_s= $_POST['mon_time_s'];
$mon_time_e= $_POST['mon_time_e']; 
$tue_time_s= $_POST['tue_time_s']; 
$tue_time_e= $_POST['tue_time_e']; 
$wed_time_s= $_POST['wed_time_s']; 
$wed_time_e= $_POST['wed_time_e']; 
$thur_time_s= $_POST['thur_time_s']; 
$thur_time_e= $_POST['thur_time_e']; 
$fri_time_s= $_POST['fri_time_s']; 
$fri_time_e= $_POST['fri_time_e']; 
$sat_time_s= $_POST['sat_time_s']; 
$sat_time_e= $_POST['sat_time_e']; 
$sun_time_s= $_POST['sun_time_s']; 
$sun_time_e= $_POST['sun_time_e']; 
$monday= $_POST['hid_monday']; 
$tuesday= $_POST['hid_tuesday']; 
$wednesday= $_POST['hid_wednesday']; 
$thursday= $_POST['hid_thursday']; 
$friday= $_POST['hid_friday']; 
$saturday= $_POST['hid_saturday']; 
$sunday= $_POST['hid_sunday']; 

$instructor_id= $_POST['instructor_id']; 
$c_date =  date("Y/m/d");


  $sql = "INSERT INTO class_lessons 
  (
class_number, 
course_id, 
class_section,
monday,
tuesday, 
wednesday, 
thursday, 
friday,
saturday, 
sunday, 
mon_time_s,
mon_time_e, 
tue_time_s, 
tue_time_e, 
wed_time_s, 
wed_time_e, 
thur_time_s, 
thur_time_e, 
fri_time_s, 
fri_time_e, 
sat_time_s, 
sat_time_e, 
sun_time_s, 
sun_time_e, 
instructor_id, 
placement_id, 
created_at 

  )
  VALUES 
  (
'$class_number', 
'$course_id', 
'$class_section',
'$monday',
'$tuesday', 
'$wednesday', 
'$thursday', 
'$friday',
'$saturday', 
'$sunday', 
'$mon_time_s',
'$mon_time_e', 
'$tue_time_s', 
'$tue_time_e', 
'$wed_time_s', 
'$wed_time_e', 
'$thur_time_s', 
'$thur_time_e', 
'$fri_time_s', 
'$fri_time_e', 
'$sat_time_s', 
'$sat_time_e', 
'$sun_time_s', 
'$sun_time_e', 
'$instructor_id', 
'0', 
'$c_date'
)";
          
        if(mysqli_query($conn, $sql)){
            
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
$_SESSION['message']="1 classes detail added successfully.";		  
header("Location:class.php");//redirection after inserting the value 
        // Close connection
        mysqli_close($conn);


?>