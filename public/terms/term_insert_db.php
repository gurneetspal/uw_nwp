<?php
include "../../private/db.php";
$termid = $_POST['term_id'];
$termname = $_POST['term_name'];
$sql = "INSERT INTO terms (term_id, term_name) VALUES ('$termid', '$termname')";
mysqli_query($conn, $sql);
header("LOCATION:term.php");
?>