<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";

$sql = "Insert into placements Select * from temp_placements";
$sql_done = mysqli_query($conn,$sql); // That inserts the data from Daten to Server

$sql3 = "Select * from temp_placements";
$sqle = mysqli_query($conn,$sql3); // That inserts the data from Daten to Server
$sqlr = mysqli_fetch_all($sqle, MYSQLI_ASSOC);
					foreach($sqlr as $sr)
					{
						$stud_id = $sr['student_number'];
						$sql_update = "UPDATE `students` SET `status`= 1 WHERE `student_number` = ".$stud_id."";
						$sql_update_result = mysqli_query($conn,$sql_update);
                      
                        $stud_id1 = $sr['placement_id'];
						$sql_update1 = "UPDATE `imp_placements` SET `status`= 1 WHERE `placement_id` = ".$stud_id1."";
						$sql_update_result1 = mysqli_query($conn,$sql_update1);
					}

$sql2="Truncate Table temp_placements";
mysqli_query($conn,$sql2);
				
header("LOCATION:placements.php");

?>