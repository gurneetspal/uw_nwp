<?php

include "db.php";


$id = $_GET['st_id'];

$name = $_POST['name'];
$department = $_POST['department'];
$address = $_POST['address'];
$city = $_POST['city'];
$prov_id = $_POST['prov_id'];
$postal_code = $_POST['postal_code'];
$phone = $_POST['phone'];
$ext = $_POST['ext'];
$contact_person = $_POST['contact_person'];
$contact_person_title = $_POST['contact_person_title'];
$u_date =  date("Y/m/d");

  $sql = "UPDATE placements SET
  name = '$name',
  department = '$department',
  address = '$address',
  city = '$city', 
  prov_id = '$prov_id', 
  postal_code = '$postal_code', 
  phone = '$phone',
  ext = '$ext',
  contact_person = '$contact_person', 
  contact_person_title = '$contact_person_title', 
  updated_at = '$u_date' 
  WHERE
  placement_id= '$id'";
          
        if(mysqli_query($conn, $sql)){
            
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
$_SESSION['message']="1 Updated added successfully.";		  
header("Location:placements.php");//redirection after inserting the value 
        // Close connection
        mysqli_close($conn);


?>