<?php
include "db.php";
include "header.php";


?>

<main id="main" class="main">
	<div class="row">
			
			<?php
				$h_name = $_REQUEST['name'];
			?>
			
		<h1><span style="color:grey">Placements</span> / <?php echo $h_name; ?></h1>
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
				<td style="text-align:right">Hospital name</td>
				<td>Life motion Clinic</td>
			  </tr>
			  
			  <tr>
				<td style="text-align:right">Hospital Address</td>
				<td>47 Brook Rd., Mississauga, ON, L4T2P7.</td>
			  </tr>
			 
			 <tr>
				<td style="text-align:right">List of departments</td>
				<td><ol><li>Central Sterile Services Department (CSSD)</li><li>Critical Care</li></ol></td>
			  </tr>
			 <tr>
				<td style="text-align:right">List of units</td>
				<td><ol><li>Coronary Care Unit</li>
						<li>Diagnostic Imaging</li>
						<li>Gastroenterology</li></ol></td>
			 </tr>			
			</table>
		
		</div>
</main>	
		
