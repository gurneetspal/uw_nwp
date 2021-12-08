<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";
$id = $_GET['id'];

$reason = $_POST['reason'];
$days = $_POST['days'];
$note = $_POST['note'];
$abdate = $_POST['abdate'];


$con = $_POST['con'];

$date = date('d-m-y h:i:s');
$chk = "";

foreach($con as $chk1)  
   {  
      $chk .= $chk1.",";  
   }  
   
  echo $chk;
//$test = "INSERT INTO abscences (student_number, absence_form_status) VALUES ('$id','$chk')";

$in = "INSERT INTO abscences (student_number, abscence_date, reason, num_days_missed, note, absence_form_status, created_at) VALUES ('$id','$abdate', '$reason','$days','$note','$chk','$date' )";
$ein = mysqli_query($conn, $in);

header("LOCATION:placement_abs.php");
?>