<?php
include "../../private/header.php";
include "../../private/db.php";
$num = $_GET['id'];
?>

<body>
	<main id = "main" class = "main">
		<div class="row">
		<h1><span style="color:grey">Homepage / Placements / </span> Assign a placement </h1>
		<hr>
	</div>
	
	
	<div class="col-lg-12" style="text-align:left; margin-bottom:20px;" >
	<a href="placements.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
	</div>
	
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<label>Student Number / Student Name:</label>
			<?php
				$sql = "SELECT * FROM students WHERE student_number = $num";
				$esql = mysqli_query($conn, $sql);
				$results = mysqli_fetch_all($esql, MYSQLI_ASSOC);
				foreach($results as $r)
				{
			?>
			<?php echo $r['student_number']; ?> / <?php echo $r['first_name']; ?> <?php echo $r['middle_name']; ?> <?php echo $r['last_name']; ?>   
			<?php
				}
			?>
		</div>
	</div>
	
		<div class="row">
		<div class="col-lg-8 offset-lg-2">
		<form action="assign_placement_insert.php?st=<?php echo $num; ?>" method="post">
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
				<td><input type="checkbox" name="hname[]" value="<?php echo $h['h_name']; ?>"> &nbsp <?php echo $h['h_name']; ?></td> <!--Hospital Name-->
				<td><!--Department Name-->
					<?php
						$dept = explode(",", $h['h_department']);
						$value_count = count($dept);
					?>
					<ul style="list-style:none" >
					<?php
					for($x = 0; $x < $value_count; $x++)
					{
					?>
						<li><input type="checkbox" name="hdepartment[]" value="<?php echo $dept[$x]; ?>"> &nbsp <?php echo $dept[$x]; ?></li>
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
					<ul style="list-style:none;">
					<?php
					for($x = 0; $x < $value_count; $x++)
					{
					?>
						<li><input name = "hunits[]" type="checkbox"  value="<?php echo $dept[$x]; ?>"> &nbsp <?php echo $dept[$x]; ?></li>
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
			
			<div class="row">
				<div class="col-lg-3">
					<label>Choose an Instructor:</label>
				</div>
				<div class="col-lg-3">
					<select name="inst">
						<option>--Choose an instructor--</option>
						<?php
							$in = "SELECT * FROM instructors";
							$ein = mysqli_query($conn, $in);
							$rin = mysqli_fetch_all($ein, MYSQLI_ASSOC);
							foreach($rin as $ri)
							{
						?>
						<option value="<?php echo $ri['first_name']; ?> <?php echo $ri['last_name']; ?>"><?php echo $ri['first_name']; ?> <?php echo $ri['last_name']; ?></option>
						<?php }?>
					</select>
				<div>
			</div>
			</div>
			
			<div class="row">
				
					<label>Select timings:</label>
					<table class="table table-bordered">
					<tr>
						<th style="text-align:right">Days</th>
						<th>Select</th>
					</tr>
					<tr >
						<td style="text-align:right"><label id="monday">Monday</label></td>
						<td><input type="checkbox" id="monday" name="days[]" value="monday"></td>
					</tr>
					<tr>
						<td style="text-align:right"><label id="tuesday">Tuesday</label></td>
						<td><input type="checkbox" id="tuesday" name="days[]" value="tuesday"></td>
					</tr>
					<tr>
						<td style="text-align:right"><label id="monday">Wednesday</label></td>
						<td><input type="checkbox" id="wednesday" name="days[]" value="wednesday"></td>
					</tr>
					<tr>
						<td style="text-align:right"><label id="thursday">Thursday</label></td>
						<td><input type="checkbox" id="thursday" name="days[]" value="thursday"></td>
					</tr>
					<tr>
						<td style="text-align:right"><label id="friday">Friday</label></td>
						<td><input type="checkbox" id="friday" name="days[]" value="friday"></td>
					</tr>
					<tr>
						<td style="text-align:right"><label id="saturday"><span style="color:red">Saturday</span></label></td>
						<td><input type="checkbox" id="saturday" name="days[]" value="saturday"></td>
					</tr>
					<tr>
						<td style="text-align:right"><label id="sunday"><span style="color:red">Sunday</span></label></td>
						<td><input type="checkbox" id="sunday" name="days[]" value="sunday"></td>
					</tr>
					
					
					<table>
				</div>
			</div>
			
			<div class="row">
			<div class="col-lg-2">
				<label>Enter timings:</label>
			</div>
			<div class="col-lg-8">	
				<input type="text" name="start" placeholder="HH:MM"> to <input type="text" name="end" placeholder="HH:MM">  
			</div>
			
			<div class="row">
			<div class="col-lg-2">
			<input type="submit" value="Assign"></div>
			</div>
			</form>
		</div>
	</div>
	</div>
	
	</main>
</body>