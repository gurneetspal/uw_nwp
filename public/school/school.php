<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php";
include "../../private/db.php";

$sql = "SELECT * FROM schools ORDER BY school_id";
$result = mysqli_query($conn, $sql);

$schools = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script>
myfunction(){
	alert("Are you sure you want to delete ?");
}

</script>

</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1>School Portal</h1>
		<hr>
	</div>
	
	<div class="row" style="background:white"> <!-- NEW SCHOOL BUTTON-->
		<div class="col-lg-12" style="text-align:left;" >
						<a href="../homepage.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> &nbsp &nbsp <a href="school_insert_form.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-plus"></span> &nbsp Add a new school details</a>
		</div>	
		
		
		<div class="row" style="background:white; margin-top:30px;"> <!-- School LIST-->
			<table class="table table-bordered">
			  <tr style="text-align:center">
				<th style="text-align:center" >School Id</th>
				<th style="text-align:center">School Name</th>
				<th style="text-align:center">School Abbreviation</th>
				<th style="text-align:center">Action</th>
				
				
			  </tr>
			  <?php foreach($schools as $st) {?>
			  <tr align="center">
				<td>  <?php echo $st['school_id']; ?> </td>
				<td><?php echo $st['school_name']; ?></td>
				<td><?php echo $st['school_abbreviation']; ?></td>
				<td><a onclick="return confirm('Are you sure you want to delete?')" href="school_delete.php?st_num=<?php echo $st['school_id']?>"><span class="glyphicon glyphicon-remove" style="color:red;"></span></a>&nbsp &nbsp <a href="school_view.php?st_num=<?php echo $st['school_id']?>"><span class="glyphicon glyphicon-eye-open" style="color:blue"></span></a> &nbsp &nbsp <a href="school_update_form.php?id=<?php echo $st['school_id']?>"> <span class="glyphicon glyphicon-pencil" style="color:green"></span></a></td>
			  </tr>
			  <?php } ?>
			
			</table>
		
		</div>
	</div>
 
 </main>
	
</body>

</html>