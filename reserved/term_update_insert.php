<?php

include "db.php";


$id = $_GET['inst_id'];

$term_name = $_POST['term_name'];
$created_at = $_POST['created_at'];
$updated_at =  date("Y/m/d");

  $sql = "UPDATE instructors SET
    term_name ='$term_name',
    created_at ='$created_at',
    updated_at ='$updated_at'
  WHERE
  term_id= '$id'";
          
        if(mysqli_query($conn, $sql)){
            
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
$_SESSION['message']="1 Term Updated successfully.";		  
header("Location:instructor.php");//redirection after inserting the value 
        // Close connection
        mysqli_close($conn);


?>