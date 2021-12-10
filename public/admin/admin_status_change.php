<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";

$id = $_GET['id'];

$sql = "UPDATE admin_users SET status= CASE WHEN status='0' THEN '1' ELSE '0' END WHERE admin_id ='$id'";
mysqli_query($conn, $sql);

$o_id = $_GET['other_id'];
$sql1 = "delete from admin_users  WHERE admin_id = '$o_id'";
mysqli_query($conn, $sql1);

header("LOCATION:admin_list.php");

?>