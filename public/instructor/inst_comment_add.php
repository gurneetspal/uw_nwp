<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";
$id = $_GET['id'];
$com = $_POST['comments'];
$sql = "UPDATE instructors SET comments ='$com' WHERE employee_num='$id'";
mysqli_query($conn, $sql);
header("LOCATION:instructor.php");
?>