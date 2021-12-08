<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";


$school_id = $_GET['st_id'];

$s_name = $_POST['school_name'];
$s_abb = $_POST['school_abb'];
$s_address = $_POST['school_address'];
$city = $_POST['city'];
$province = $_POST['province'];
$p_code = $_POST['postalcode'];
$c_date =  date("Y/m/d");

  $sql = "UPDATE schools Set
  school_name='$s_name',
  school_abbreviation= '$s_abb',
  school_address='$s_address',
  school_city='$city',
  prov_id='$province',
  school_postal_code = '$p_code',
  updated_at= '$c_date' 
  WHERE school_id='$school_id' 
  ";
          
        if(mysqli_query($conn, $sql)){
            
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
$_SESSION['message']="1 school updated successfully.";		  
header("Location:school.php");//redirection after inserting the value 
        // Close connection
        mysqli_close($conn);


?>