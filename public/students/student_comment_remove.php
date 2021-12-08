<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";

$id = $_GET['id'];

$sql = "UPDATE students SET comments = NULL WHERE student_number='$id'";
mysqli_query($conn, $sql);
header("LOCATION:student.php");
?>