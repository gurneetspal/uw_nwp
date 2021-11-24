<?php
include "../../private/db.php";

$id = $_GET['id'];
$sql = "SELECT * FROM placements WHERE student_number='$id'";
$sqle = mysqli_query($conn, $sql);
$sqlr = mysqli_fetch_all($sqle, MYSQLI_ASSOC);
foreach($sqlr as $s)
{
	if($s['status']==0)
	{
		$up = "UPDATE placements SET status = '1' WHERE student_number='$id'";
		$upr = mysqli_query($conn, $up);
	}
	if($s['status']==1)
	{
		$up = "UPDATE placements SET status = '0' WHERE student_number='$id'";
		$upr = mysqli_query($conn, $up);
	}
}

header("LOCATION:placements.php");
?>