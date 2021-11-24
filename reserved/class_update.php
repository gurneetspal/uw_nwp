<?php

include "db.php";

if (isset($_GET['class_number'])) {
        $class_number = $_GET['class_number'];
    
        $conn->query("delete from class_lessons where class_number = '$class_number'");
        // exit();
        $_SESSION['msg'] = 'class Deleted successfully.';
       echo "<script>window.location.href='class.php';</script>";

}
else{
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
// $placement_id= $_POST['placement_id']; 

$instructor_id= $_POST['instructor_id']; 
$c_date =  date("Y/m/d");


  $sql = "UPDATE  class_lessons set
course_id='$course_id', 
class_section='$class_section',
monday='$monday',
tuesday='$tuesday', 
wednesday='$wednesday', 
thursday='$thursday', 
friday='$friday',
saturday='$saturday', 
sunday='$sunday', 
mon_time_s='$mon_time_s',
mon_time_e='$mon_time_e', 
tue_time_s='$tue_time_s', 
tue_time_e='$tue_time_e', 
wed_time_s='$wed_time_s', 
wed_time_e='$wed_time_e', 
thur_time_s='$thur_time_s', 
thur_time_e='$thur_time_e', 
fri_time_s='$fri_time_s', 
fri_time_e='$fri_time_e', 
sat_time_s='$sat_time_s', 
sat_time_e='$sat_time_e', 
sun_time_s='$sun_time_s', 
sun_time_e='$sun_time_e', 
instructor_id='$instructor_id', 
-- placement_id='$placement_id', 
created_at='$c_date' where class_number='$class_number'";
          
        if(mysqli_query($conn, $sql)){
            
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
$_SESSION['message']="1 classes detail added successfully.";		  
header("Location:class.php");//redirection after inserting the value 
        // Close connection
        mysqli_close($conn);
}
?>