<?php
include "../../private/header.php";
include "../../private/db.php";
?>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1><span style="color:grey">Homepage / Placements</span> / Auto Placements</h1>
		<hr>
	</div>
	
	
	<div class="col-lg-12" style="text-align:left; margin-bottom:20px;" >
	<a href="placements.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
		</div>	
		<hr>
		
<div class="row">
	<div class="col-lg-4 offset-lg-1 form-group">
		<form method="post" action="file-upload.php" enctype="multipart/form-data">
			<b>Select a (.xls) file with student number and names</b><br><input  required style="border-style:hidden; border-top:hidden; margin-top:10px;" type="file" name="uploadfile" class="form-control">
			<br>
			<input type="submit" name="submit" class="btn btn-primary">
		</form>
	</div>
	
	
	<div class="col-lg-4 offset-lg-1 form-group">
		<form method="post" action="file-upload-inst.php" enctype="multipart/form-data">
			<b>Select a (.xls) file with instructor number and names</b><br><input  required style="border-style:hidden; border-top:hidden; margin-top:10px;" type="file" name="uploadfile" class="form-control">
			<br>
			<input type="submit" name="submit" class="btn btn-primary">
		</form>
	</div>
</div>	


<div class="row">
	<div class="col-lg-4 offset-lg-1 form-group">
		<form method="post" action="file-upload-hospital.php" enctype="multipart/form-data">
			<b>Select a (.xls) file with hospital name, (department1, department2), (unit1, unit2)</b><br><input requried  style="border-style:hidden; border-top:hidden; margin-top:10px;" type="file" name="uploadfile" class="form-control">
			<br>
			<input type="submit" name="submit" class="btn btn-primary">
		</form>
	</div>
</div>
	
<hr>
<div class="row" style="margin-top:10px;">
	<h2 style="text-align:left">Uploaded Documents &nbsp <a href="autoassign.php">Auto Assign</a></h2>
</div>	
<div class="row">
	<table class="table table-border">
		<tr>
			<th>Student Number / Name</th>
			<th>Instructor Number / Name</th>
			<th>Hospital Name</th>
			<th>Department Name</th>
			<th>Unit Name</th>
		</tr>
		<tr>
		<td>
		<?php
					$sql = "SELECT * FROM excel_student";
					$sqle = mysqli_query($conn, $sql);
					$sqlr = mysqli_fetch_all($sqle, MYSQLI_ASSOC);
					foreach($sqlr as $sr)
					{
						?>
			
				<?php echo $sr['student_number']; ?> / <?php echo $sr['name']; ?>
				<br>
				<?php		
					}
				?>
			
			</td>
			<td>
			<?php
					$sql = "SELECT * FROM excel_instructor";
					$sqle = mysqli_query($conn, $sql);
					$sqlr = mysqli_fetch_all($sqle, MYSQLI_ASSOC);
					foreach($sqlr as $sr)
					{
						?>
			
				<?php echo $sr['instructor_number']; ?> / <?php echo $sr['name']; ?>
				<br>
				<?php		
					}
				?>
			</td>
			
			
			
			
			
			<?php
				$hospitals = "SELECT * FROM excel_hospital";
				$ehospitals = mysqli_query($conn, $hospitals);
				$rhospitals = mysqli_fetch_all($ehospitals, MYSQLI_ASSOC);
				foreach($rhospitals as $h)
				{
			?>
				<td><?php echo $h['hospital_name']; ?></td> <!--Hospital Name-->
				<td><!--Department Name-->
					<?php
						$dept = explode(",", $h['dept_name']);
						$value_count = count($dept);
					?>
					<ul style="list-style:none">
					<?php
					for($x = 0; $x < $value_count; $x++)
					{
					?>
						<li><?php echo $dept[$x]; ?></li>
					<?php
							}
					?>
					</ul>
					
				</td>
				<td><!--Department Name-->
					<?php
						$unit = explode(",", $h['unit_name']);
						$value_count1 = count($unit);
					?>
					<ul style="list-style:none">
					<?php
					for($xz = 0; $xz < $value_count1; $xz++)
					{
					?>
						<li><?php echo $unit[$xz]; ?></li>
					<?php
							}
					?>
					</ul>
				</td>
				<?php } ?>
				
			
		</tr>
		
	</table>
</div>
		
</main>
</body>