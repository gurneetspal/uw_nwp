<?php
include "../../private/header.php";
include "../../private/db.php";
session_start();
?>

<main id="main" class="main">
	<div class="row">
		<?php
		  if(isset($_SESSION['message']))
			{
		?>
		<h1>
		<?php
				echo $_SESSION['message'];
			}
		?>	
		</h1>
			
		<h1><span style="color:grey">Placements</span> / Add new Hospital</h1>
		<hr>
	</div>
	
	
	<div class="col-lg-12" style="text-align:left; margin-bottom:20px;" >
	<a href="placements.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
	</div>
	
	<div class="row" style="margin-top:20px;">
	<h3>Enter the details of new hospital</h3>
	</div>
	
	
	<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST-->
	<div class="col-lg-8 offset-lg-2">
	
		<form action="h_name_insert_db.php" method="post">
			<table class="table table-bordered" style="border-style:hidden;">
			  <tr style="border:hidden">
				<td style="text-align:right">Hospital name</td>
				<td><input type="text" placeholder="Enter the hospital name" name="h_name" style="width:80%" required></td>
			  </tr>
			  
			  <tr style="border:hidden;">
				<td style="text-align:right">Hospital Address</td>
				<td><input type="text" placeholder="Enter the address" name="h_address" style="width:80%" required></td>
			  </tr>
			 
			 <tr style="border:hidden;">
				<td style="text-align:right">List of departments</td>
				<td><input type="text" placeholder="Department 1, Department 2,.." name="h_department" style="width:80%" required></td>
			  </tr>
			 <tr style="border:hidden;">
				<td style="text-align:right">Enter unit name</td>
				<td><input type="text" placeholder="Unit 1, Unit 2,.." name="u_name" style="width: 80%" required></td>
			 </tr>			
			 <tr style="border:hidden;">
			 <td></td>
				<td><input type="submit" value="Submit"></td>
			 </tr>
			</table>
		</form>
		</div>
		</div>
</main>	
		