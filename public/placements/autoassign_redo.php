<?php
include "../../private/db.php";
$sql = "TRUNCATE TABLE tmp_placements";
mysqli_query($conn, $sql);
header("LOCATION:autoassign.php");
?>