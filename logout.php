<?php 
session_unset();
session_destroy();
header("LOCATION:index.php");
?>