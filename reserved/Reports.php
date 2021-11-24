<?php
include "header.php";
include "db.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    
</head>

<body>

<main id="main" class="main ">
    <div>
		<h1>Update details of Class</h1>
		<hr>
    </div>
	
	
    <div style="background:white">
	<a onclick="history.back(-1)" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
	        <small style="margin-top:20px" ><p><i>Note:</i> <span style="color:red;">*</span><i> means a required field.</i></p></small>
    </div>
    <div style="background:white">
		<form  action="export_to_excel.php?id=student" method="post" encrypt="multipart/form-data">
<div class="form-group col-md-4">
        <input class="form-control"  type="submit" value="Students Report"/>
</div>
      </form>
      <form  action="export_to_excel.php?id=instructor" method="post" encrypt="multipart/form-data">
      <div class="form-group col-md-4">

        <input type="submit" class="form-control" value="Instructor Report"/>
</div>
      </form>
	    </div>

</main>

	
</body>

</html>