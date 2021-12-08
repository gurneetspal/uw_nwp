<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";


$id = $_GET['st_id'];

$f_name = $_POST['location'];
$m_name = $_POST['time'];
$l_name = $_POST['term'];
//$u_email = $_POST['uwin_email'];


  $sql = "UPDATE students SET
  location = '$f_name',
  time = '$m_name',
  term = '$l_name',

  WHERE
  placement_id= ".$id."";
          
        if(mysqli_query($conn, $sql)){
            
        } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
          
$_SESSION['message']="Placement edited successfully.";		  
header("Location:viewMasterPlacements.php");//redirection after inserting the value 
        // Close connection
        mysqli_close($conn);


?>