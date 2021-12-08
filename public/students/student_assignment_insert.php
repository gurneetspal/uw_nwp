<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";

$id = $_GET['id'];
$class = $_POST['class_select'];
$section = $_POST['section_id'];
$term = $_POST['term_name'];

$sql = "INSERT INTO students_course_section (student_number, class, section, term) VALUES ('$id', '$class', '$section', '$term')";
$sql_e = mysqli_query($conn, $sql);
header("LOCATION:student.php");


?>