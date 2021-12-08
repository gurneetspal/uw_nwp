<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";
$id = $_GET['id'];

if(isset($_POST['PcID'])){
$ins = $_POST['PcID'];
 echo $ins;

 $sql="update imp_placements set instructor_id='$ins' where placement_id='$id'";
$esql = mysqli_query($conn, $sql);
}



header("LOCATION:viewMasterPlacements.php");
?>