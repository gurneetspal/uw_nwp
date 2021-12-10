<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";
$id = $_GET['id'];
$student_id = $_GET['StudentId'];
$Placement_id = $_GET['Placement_id'];


$ins = $_POST['inst'];
 echo $ins;

$sql1="update imp_placements set status='0' where placement_id='$Placement_id'";
$esql1 = mysqli_query($conn, $sql1);

$sql2="delete from  placements  where confirmed_placement_id='$id'";
$esql2 = mysqli_query($conn, $sql2);

$sql3="update students set status='0' where student_number='$student_id'";
$esql3 = mysqli_query($conn, $sql3);

 header("LOCATION:placements.php");
?>