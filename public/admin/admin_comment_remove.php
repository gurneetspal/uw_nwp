<?php
include "../../private/db.php";

$id = $_GET['id'];

$sql = "UPDATE admin_users SET comments = NULL WHERE admin_id = '$id'";
$ex = mysqli_query($conn, $sql);
header("LOCATION:admin_list.php");
?>