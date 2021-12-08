<?php
include "../../private/db.php";

$sql="Insert into placements Select * from temp_placements";
mysqli_query($conn,$sql); // That inserts the data from Daten to Server

$sql2="Truncate Table temp_placements";
mysqli_query($conn,$sql2);
				
header("LOCATION:placements.php");

?>