<?php
include "../../private/db.php";
$id = $_GET['id'];
$com = $_POST['comments'];
$sql = "UPDATE instructors SET comments = NULL WHERE employee_num='$id'";
mysqli_query($conn, $sql);
header("LOCATION:instructor.php");
?>