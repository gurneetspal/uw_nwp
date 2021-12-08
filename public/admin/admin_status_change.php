<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";

$id = $_GET['id'];

$sql = "UPDATE admin_users SET status = 0 WHERE admin_id ='$id'";
mysqli_query($conn, $sql);

$o_id = $_GET['other_id'];
$sql1 = "UPDATE admin_users SET status = 1 WHERE admin_id = '$o_id'";
mysqli_query($conn, $sql1);

header("LOCATION:admin_list.php");

?>