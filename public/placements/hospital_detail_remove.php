<?php
include "../../private/db.php";
$hname = $_GET['hospital'];
$tname = $_GET['name'];
echo $hname;
echo $tname;

//get the details of the particular hospital
$a = "SELECT * FROM hospital_names WHERE h_name = '$hname'";
$b = mysqli_query($conn, $a);
$c = mysqli_fetch_all($b, MYSQLI_ASSOC);
foreach($c as $d)
{
	str_replace($tname,"", $d['h_department']);
	echo $d['h_department'];
}
?>