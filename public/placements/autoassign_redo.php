<?php
include "../../private/db.php";
$sql = "TRUNCATE TABLE temp_placements";
mysqli_query($conn, $sql);
header("LOCATION:autoassign.php");
?>