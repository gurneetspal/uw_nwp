<?php
include "../../private/db.php";
$note = $_POST['note'];
$sql = "insert into dashboadr_tasks (note) values ('$note')";
mysqli_query($conn, $sql);
header("LOCATION:../homepage.php");
?>