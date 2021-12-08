<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";


$s_id = $_POST['student_id'];
$f_name = $_POST['first_name'];
$m_name = $_POST['middle_name'];
$l_name = $_POST['last_name'];
$u_email = $_POST['uwin_email'];
$school = $_POST['school'];
$h_address = $_POST['home_address'];
$city = $_POST['city'];
$province = $_POST['province'];
$p_code = $_POST['postalcode'];
$phone = $_POST['phone'];
$phone1 = $_POST['phone1'];
$term = $_POST['term'];
$year = $_POST['year'];
$status = $_POST['status'];

  $sql = "INSERT INTO students 
  (
  student_number,
  first_name,
  middle_name,
  last_name,
  uwin_email, 
  school_id, 
  home_address, 
  home_city,
  prov_id,
  home_postal_code,
  phone1, 
  phone2, 
  start_term, 
  year,
  status
  )
  VALUES 
  (
  '$s_id',
  '$f_name',
  '$m_name',
  '$l_name',
  '$u_email',
  '$school',
  '$h_address',
  '$city',
  '$province',
  '$p_code',
  '$phone',
  '$phone1',
  '$term',
  '$year',
  '$status'
  )";
          
        if(mysqli_query($conn, $sql)){
            
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
$_SESSION['message']="1 Student added successfully.";		  
header("Location:student_insert_form.php");//redirection after inserting the value 
        // Close connection
        mysqli_close($conn);


?>