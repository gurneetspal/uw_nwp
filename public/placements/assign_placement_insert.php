<?php
include "../../private/db.php";
$id = $_GET['st'];

$ins = $_POST['inst'];
echo $ins;

$days = $_POST['days'];
$myvalues = implode(",", $days);

$dept = $_POST['hdepartment'];
$values = implode(",", $dept);

$unit = $_POST['hunits'];
$unitvalues = implode(",",$unit);


$hospital = $_POST['hname'];
$hospitalvalues = implode(",", $hospital);

$start = $_POST['start'];
$end = $_POST['end'];

$date = date('d-m-y h:i:s');

$sql = "INSERT INTO placements (student_number, h_name, h_department, h_unit, days, start_time, end_time, status, instructor, created_at) 
VALUES ('$id', '$hospitalvalues', '$values', '$unitvalues', '$myvalues', '$start', '$end', '1', '$ins', '$date')";
$esql = mysqli_query($conn, $sql);
header("LOCATION:placements.php");
?>