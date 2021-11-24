<?php
include "db.php";
$schoolname = $_POST['school_name'];
$schoolabb = $_POST['school_abb'];
$schooladdress = $_POST['school_adddress'];
$city = $_POST['city'];
$province = $_POST['province'];
$postalcode = $_POST['postalcode'];

$sql = "INSERT INTO schools (school_name, school_abbreviation, school_address, school_city, school_postal_code, prov_id) VALUES ('$schoolname', '$schoolabb', '$schooladdress', '$city', '$postalcode', '$province')";
mysqli_query($conn, $sql);
header("LOCATION:school.php");
?>