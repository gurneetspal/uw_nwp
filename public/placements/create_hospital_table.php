<?php
include "../../private/db.php";
$hname = $_GET['name'];
$addon = "0_";
$final = $addon.$hname;
echo $hname;

//CREATE TABLE WITH SAME NAME
//$ent = "CREATE TABLE $final (student_number VARCHAR(20), department VARCHAR(20), unit VARCHAR(20))";
$etable = mysqli_query($conn, $ent);
header("LOCATION:placements.php");
?>