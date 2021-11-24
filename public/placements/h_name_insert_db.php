<?php
include "../../private/db.php";

$hname = $_POST['h_name'];
$haddress = $_POST['h_address'];
$hdepartment = $_POST['h_department'];
$hunit = $_POST['u_name'];

//INSERT THE HOSPITAL DATA IN THE DATABASE	
$sql = "INSERT INTO hospital_names(h_name, h_address, h_department, h_unit) VALUES('$hname', '$haddress', '$hdepartment', '$hunit')";
$sqle = mysqli_query($conn, $sql);

$test = "SELECT * FROM hospital_names";
$etest = mysqli_query($conn, $test);
$rtest = mysqli_fetch_all($etest, MYSQLI_ASSOC);
foreach($rtest as $r)
{
	echo $r['h_name'];
	$q = explode(",", $r['h_department']);
	$value_count = count($q);
	for($x = 0; $x < $value_count; $x++)
	{
		echo $q[$x];
	}
	
}

header("LOCATION:create_hospital_table.php?name=$hname");
?>