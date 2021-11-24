<?php
include "../../private/header.php";
include "../../private/db.php";
?>

<body>
<main id="main" class="main">
	<div class="row">
		<h1><span style="color:grey">Placements /</span> Edit hospital details</h1>
		<hr>
	</div>
	
	
	<div class="col-lg-12" style="text-align:left; margin-bottom:20px;" >
	<a href="placements.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
     </div>	
		<hr>
		
		
	<!--Hospital name along side department name and unit name with remove button-->	
	
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
		
			<table class="table table-bordered">
			<tr>
				<th>Hospital name</th>
				<th>Department(s)</th>
				<th>Unit(s)</th>
			</tr>
			<?php
				$hospitals = "SELECT * FROM hospital_names";
				$ehospitals = mysqli_query($conn, $hospitals);
				$rhospitals = mysqli_fetch_all($ehospitals, MYSQLI_ASSOC);
				foreach($rhospitals as $h)
				{
			?>
			<tr>
				<td><?php echo $h['h_name']; ?></td> <!--Hospital Name-->
				<td><!--Department Name-->
					<?php
						$dept = explode(",", $h['h_department']);
						$value_count = count($dept);
					?>
					<ul>
					<?php
					for($x = 0; $x < $value_count; $x++)
					{
					?>
						<li><?php echo $dept[$x]; ?> <small><a href="hospital_detail_remove.php?name=<?php echo $dept[$x]; ?>&hospital=<?php echo $h['h_name']; ?>"><span style="color:red; font-size:10px;"><u>Remove</u></span></a></small></li>
					<?php
							}
					?>
					</ul>
					
				</td> 
				<td><!--Unit Name-->
					<?php
						$dept = explode(",", $h['h_unit']);
						$value_count = count($dept);
					?>
					<ul>
					<?php
					for($x = 0; $x < $value_count; $x++)
					{
					?>
						<li><?php echo $dept[$x]; ?> <small><a href="hospital_detail_remove.php?name=<?php echo $dept[$x]; ?>&hospital=<?php echo $h['h_name']; ?>"><span style="color:red; font-size:10px;"><u>Remove</u></span></a></small></li></li>
					<?php
							}
					?>
					</ul>
					
				</td> 
			</tr>
			<?php
				}
			?>
			
			</table>
		</div>
	</div>
	
</main>
</body>