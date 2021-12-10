<?php

session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}

include "../../private/db.php";

$id = $_GET['inst_id'];

$term_name = $_POST['term_name'];
$created_at = $_POST['created_at'];
$updated_at =  date("Y/m/d");

  $sql = "UPDATE terms SET
    term_name ='$term_name',
    created_at ='$created_at',
    updated_at ='$updated_at'
  WHERE term_id= '$id'";
          
        if(mysqli_query($conn, $sql))
        {
                $_SESSION['message']="1 Term Updated successfully.";		  
                header("LOCATION:term.php");//redirection after inserting the value 
        } 
        else
        {
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          

        // Close connection
        mysqli_close($conn);


?>