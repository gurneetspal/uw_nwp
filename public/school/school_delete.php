<?php

include "../../private/db.php";

$school_id=$_GET['st_num'];



  $sql = "DELETE FROM  schools WHERE school_id='$school_id'";
          
        if(mysqli_query($conn, $sql)){
            
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
$_SESSION['message']="1 school deleted successfully.";		  
header("Location:school.php");//redirection after inserting the value 
        // Close connection
        mysqli_close($conn);


?>