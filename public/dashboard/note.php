<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";
$note = $_POST['note'];
$sql = "insert into dashboadr_tasks (note) values ('$note')";
mysqli_query($conn, $sql);
header("LOCATION:../homepage.php");
?>