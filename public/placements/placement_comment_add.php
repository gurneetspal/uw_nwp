<?php 
include "../../private/db.php";

$id = $_GET['id'];
$com = $_POST['comments'];
$sql = "SELECT * FROM placements WHERE student_number = '$id'";
$esql = mysqli_query($conn, $sql);
$rsql = mysqli_fetch_all($esql, MYSQLI_ASSOC);

$sql = "Select student_number from placement_comments WHERE student_number='$id'";
			$result = mysqli_query($conn, $sql);
			$count=mysqli_num_rows($result);
if($count == 0)
{
	$n = "INSERT INTO placement_comments (student_number, comments) VALUES ('$id', '$com')";
	mysqli_query($conn, $n);
	header("LOCATION:placements.php");
}
else
{
	$in = "UPDATE placement_comments SET comments = '$com' WHERE student_number='$id'";;
		$ein = mysqli_query($conn, $in);
		header("LOCATION:placements.php");
}


?>