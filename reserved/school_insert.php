<?php

include "db.php";


$s_name = $_POST['school_name'];
$s_abb = $_POST['school_abb'];
$s_address = $_POST['school_address'];
$city = $_POST['city'];
$province = $_POST['province'];
$p_code = $_POST['postalcode'];
$c_date =  date("Y/m/d");

  $sql = "INSERT INTO schools 
  (
  school_name,
  school_abbreviation,
  school_address, 
  school_city,
  prov_id,
  school_postal_code,
  created_at
  )
  VALUES 
  (
  '$s_name',
  '$s_abb',
  '$s_address',
  '$city',
  '$province',
  '$p_code',
  '$c_date' 
  )";
          
        if(mysqli_query($conn, $sql)){
            
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
$_SESSION['message']="1 school added successfully.";		  
header("Location:school_insert_form.php");//redirection after inserting the value 
        // Close connection
        mysqli_close($conn);


?>