<?php 
include "../../private/db.php";

$id = $_GET['id'];
$sql = "UPDATE placement_comments SET comments = NULL WHERE student_number = '$id'";
$esql = mysqli_query($conn, $sql);
header("LOCATION:placements.php");
?>