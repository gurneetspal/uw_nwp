<?php

include "../../private/db.php";


$id = $_GET['st_id'];

$f_name = $_POST['first_name'];
$m_name = $_POST['middle_name'];
$l_name = $_POST['last_name'];
$u_email = $_POST['uwin_email'];
$school = $_POST['school_id'];
$h_address = $_POST['home_address'];
$city = $_POST['home_city'];
$province = $_POST['province'];
$p_code = $_POST['home_postal_code'];
$phone = $_POST['primary_contact'];
$phone1 = $_POST['alternate_contact'];
$term = $_POST['start_term'];
$year = $_POST['year_level'];
$status = $_POST['status'];

  $sql = "UPDATE students SET
  first_name = '$f_name',
  middle_name = '$m_name',
  last_name = '$l_name',
  uwin_email = '$u_email', 
  school_id = '$school', 
  home_address = '$h_address', 
  home_city = '$city',
  prov_id = '$province',
  home_postal_code = '$p_code',
  phone1 = '$phone', 
  phone2 = '$phone1', 
  start_term = '$term', 
  year_level = '$year',
  status = '$status'
  WHERE
  student_number= '$id'";
          
        if(mysqli_query($conn, $sql)){
            
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
$_SESSION['message']="1 Student added successfully.";		  
header("Location:student.php");//redirection after inserting the value 
        // Close connection
        mysqli_close($conn);


?>