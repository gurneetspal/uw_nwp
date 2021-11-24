<?php
include "db.php";
include "header.php";


?>

<main id="main" class="main">
	<div class="row">
			
		<h1><span style="color:grey">Placements</span></h1>
		<hr>
	</div>
	
	
	<div class="col-lg-12" style="text-align:left; margin-bottom:20px;" >
	<a href="placements.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
	</div>
	
	<div class="row" style="margin-top:20px;">
	<h3>Enter the details of new hospital</h3>
	</div>
	
	
	<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST-->
	
		<table class="table table-bordered">
			  <tr>
				<td style="text-align:right">Enter student Id</td>
				<td><input type="text" placeholder="Enter student number"></td>
			  </tr>
			  <tr>
				
			  </tr>
			  <tr>
				<td style="text-align:right;">Placed in</td>
				<td><ul>
					<li>Diagnostic Imaging, Claris Care (Currently)</li>
					<li>Gastroenterology, Claris Care (Completed) </li>
				</ul></td>
				
			  </tr>
			  
			  <tr>
				<td style="text-align:right;">Suggested Placements</td>
				<td><ul>
				<li><a href="#">Coronary Care Unit, Claris Care (Available)</a></li>
				<li><a href="#">Gynecology, Willow green hospital (Available)</a></li>
				</ul></td>
			  </tr>	
			  
			  <tr>
			  <td></td>
				<td style="text-lign:right"><input type="submit" value="Submit"</td>
			  </tr>
			</table>
		
		</div>
</main>	
		
