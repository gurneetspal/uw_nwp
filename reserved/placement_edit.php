<?php
include "db.php";
include "header.php";
?>
<body>
 <main id="main" class="main">
<div class="row">
		<h1><span style="color:grey">Homepage / Placements /</span> Assign</h1>
		<hr>
</div>

<div class="col-lg-12" style="text-align:left; margin-bottom:20px;" >
	<a href="placements.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
</div>	
<hr>

<div class="row">
	<div class="col-lg-10 offset-lg-1">
	<label>Student Number / Student Name: </label>
	<?php
		$st_id = $_GET['id'];
		$query = "SELECT *FROM students WHERE student_number = $st_id";
		$equery = mysqli_query($conn, $query);
		$rquery = mysqli_fetch_all($equery, MYSQLI_ASSOC);
		foreach($rquery as $rq)
		{
		?>
		<?php echo $rq['student_number'];?> / <?php echo $rq['first_name']; ?> <?php echo $rq['middle_name']; ?> <?php echo $rq['last_name']; ?>
		
</div>

<div class="row">
	<div class="col-lg-10 offset-lg-1">
	<label>Completed Training </label>
		<?php echo $rq['h_name']; ?> <?php echo $rq['h_department']; ?> <?php echo $rq['h_unit']; ?>
		<?php
		}
	?>
	</div>
</div>
<div class="row">
	<div class="col-lg-10 offset-lg-1">
		<label>Available:</label>
	</div>
</div>







<div class="row">	
		<ul>
			<li>Student firts name, last name, middle name</li>
			<li>Completed training</li>
			<li>Can do the trainig at</li>
			<li>Checkbox to select hospital, department and unit</li>
			<li>Change the hospital units etx. </li>
		</ul>
	</div>
</div>

</main>
</body>