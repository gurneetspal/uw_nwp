<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";

$id = $_GET['id'];

$sql = "DELETE FROM dashboadr_tasks WHERE id='$id'";
$sqle = mysqli_query($conn, $sql);
header("LOCATION: ../homepage.php"); 

?>