<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";

$id = $_GET['id'];

$comm = $_POST['comment_section'];

$sql = "UPDATE admin_users SET comments = '$comm' WHERE admin_id = '$id'";

mysqli_query($conn, $sql);

header("LOCATION:admin_list.php");
?>