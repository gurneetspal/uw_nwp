<?php

include "../../private/db.php";


$id = $_GET['term_id'];



  $sql = "DELETE from terms 
  WHERE
  term_id= '$id'";
          
        if(mysqli_query($conn, $sql)){
                $_SESSION['message']="1 Term deleted successfully.";		  
                header("Location:term.php");//redirection after inserting the value 
                
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
        // Close connection
        mysqli_close($conn);


?>