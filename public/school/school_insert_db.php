<?php

session_start();

if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";

$schoolname = $_POST['school_name'];
$schoolabb = $_POST['school_abb'];
$schooladdress = $_POST['school_address'];
$city = $_POST['city'];
$province = $_POST['province'];
$postalcode = $_POST['postalcode'];

$sql = "INSERT INTO schools (school_name, school_abbreviation, school_address, school_city, school_postal_code, prov_id) VALUES ('$schoolname', '$schoolabb', '$schooladdress', '$city', '$postalcode', '$province')";
if(mysqli_query($conn, $sql)){
header("LOCATION:school.php");
}
else{
	echo $sql.$conn;
}
?>