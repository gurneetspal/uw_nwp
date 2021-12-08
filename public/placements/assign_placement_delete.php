<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";
$id = $_GET['id'];

$ins = $_POST['inst'];
 echo $ins;


$sql="delete from  placements  where confirmed_placement_id='$id'";
$esql = mysqli_query($conn, $sql);
 header("LOCATION:placements.php");
?>