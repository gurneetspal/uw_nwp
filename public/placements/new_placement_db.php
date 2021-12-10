<?php 
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";

$location = $_POST['location'];
$timings = $_POST['timings'];
$term = $_POST['term']; 

$sql = "INSERT INTO imp_placements (location, time, term) VALUES ('$location', '$timings', '$term' )";
$esql = mysqli_query($conn, $sql);
header("LOCATION: viewMasterPlacements.php")
?>