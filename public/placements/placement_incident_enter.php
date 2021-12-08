<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";
$id = $_GET['id'];
$incident = $_POST['incident'];
$dateocc = $_POST['dateocc'];
$formdetails = $_POST['formdetails'];
echo $id;
echo $incident;
echo $dateocc;
echo $formdetails;

$sql = "INSERT INTO incidents (student_number, incident_comments, date_occurrence, health_safety_record) VALUES ('$id', '$incident', '$dateocc', '$formdetails')";
$esql = mysqli_query($conn, $sql);
header("LOCATION:placement_incidents.php");

?>