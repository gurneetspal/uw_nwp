<?php
include "db.php";

$user_id = $_REQUEST["user_id"];

if($user_id !== "")
{
	$query = mysqli_query($conn, "SELECT * FROM students WHERE student_number = '$user_id'");
	
	$row = mysqli_fetch_array($query);
	
	$first_name = $row["first_name"];
	$last_name = $row["last_name"];
}

$result = array("$first_name", "$last_name");

$myJSON = json_encode($result);
echo $myJSON;
?>