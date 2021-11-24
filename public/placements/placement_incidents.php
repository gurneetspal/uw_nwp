<?php
include "../../private/header.php";
include "../../private/db.php";
$id = $_GET['id'];
?>

<body>
<main id="main" class="main">
	<div class="row">
		<h1><span style="color:grey">Placements / Details / </span> Incident record</h1>
		<hr>
	</div>
	
	
	<div class="col-lg-12" style="text-align:left; margin-bottom:20px;" >
	<a href="placements.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
     </div>	
		<hr>
		
<div class="row">
	<div class="col-lg-10 offset-lg-1">
	<table class="table table-bordered">
			<tr>
				<th>Student name</th>
				<th>Year</th>
				<th>Clinical Course</th>
				<th>Placement</th>
				<th>Instructor</th>
				<th>Incident</th>
				<th>Date</th>
				<th>Form completed and sent to Health and Safety</th>
			</tr>
			<tr>
				<td>
					<?php
						$sql = "SELECT * FROM students WHERE student_number = '$id'";
						$esql = mysqli_query($conn, $sql);
						$rsql = mysqli_fetch_all($esql, MYSQLI_ASSOC);
						foreach($rsql as $rs)
						{
					?>
					<?php echo $rs['first_name']; ?> <?php echo $rs['middle_name']; ?> <?php echo $rs['last_name'];?>
					</td>
					<td><?php echo $rs['year']; ?>
					<?php
						}
					?>
				</td>
				
				<td>
				<?php
					$scs = "SELECT * FROM students_course_section WHERE student_number ='$id'";
					$escs = mysqli_query($conn, $scs);
					$rscs = mysqli_fetch_all($escs, MYSQLI_ASSOC);
					foreach($rscs as $rs)
					{
				?>
				<?php echo $rs['class']; ?>
			</td>	
					<?php } ?>
				
				
				
				<?php
				$place = "SELECT * FROM placements WHERE student_number='$id'";
				$eplace = mysqli_query($conn, $place);
				$result_place = mysqli_fetch_all($eplace, MYSQLI_ASSOC);
				foreach($result_place as $rp)
				{
			?>
			<td>
				<?php $depart = explode(",", $rp['h_department']); 
					$value_count1 = count($depart);
					?>
					<ul style="list-style:none">
					<?php
					for($x = 0; $x < $value_count1; $x++)
					{
					?>
						<li><?php echo $rp['h_name']; ?> / <?php echo $depart[$x]; ?></li>
						<?php
							}
					?>
					</ul>
			</td>
				<?php } ?>
				
				<td><!--Instructr-->
			<?php
				$placement = "SELECT * FROM placements WHERE student_number='$id'";
				$eplacement = mysqli_query($conn, $placement);
				$rplacement = mysqli_fetch_all($eplacement, MYSQLI_ASSOC);
				foreach($rplacement as $rp)
				{
			?>
				<?php echo $rp['instructor']; ?>
			</td>
				<?php } ?>
				
				<?php
					$s = "SELECT * FROM incidents WHERE student_number='$id'";
					$es = mysqli_query($conn, $s);
					$rs = mysqli_fetch_all($es, MYSQLI_ASSOC);
					foreach($rs as $r)
					{
				?>
				<td><?php echo $r['incident_comments'];?> </td>
				<td><?php echo $r['date_occurrence']; ?></td>
				<td><?php echo $r['health_safety_record']; ?></td>
				
				<?php } ?>
				
			</tr>
	</table>
	</div>
</div>
		<hr>
<div class="row">
	<div class="col-lg-10 offset-lg-1">
		<h4>Report a new incident</h4>
		
		<form action="placement_incident_enter.php?id=<?php echo $id;?>" method="post">
		<table class="table table-bordered">
			<tr>
				<th style="width:20%; text-align:right;" >Incident:</th>
				<td><input style="width:80%; border-style:hidden;" required name="incident" type="text" placeholder="Enter the incident.." ></td>
			</tr>
			<tr>
				<th style="width:20%; text-align:right;" >Date of occurence:</th>
				<td><input style="width:20%; border-style:hidden;" required name ="dateocc" type="date" placeholder="Day(s) or hh:mm"></td>
			</tr>
			<tr>
				<th style="width:20%; text-align:right;" >Date final form completed and sent to Health & Safety</th>
				<td><input required style="width:80%; border-style:hidden;" name="formdetails" type="text" placeholder="Enter details"></td>
			</tr>
		</table>
		<input type="submit" value="Submit">
		</form>
		
	</div>
</div>		
		
		
</main>
</body>		