<?php
include "../../private/header.php";
include "../../private/db.php";
$id = $_GET['id'];
?>

<body>
<main id="main" class="main">
	<div class="row">
		<h1><span style="color:grey">Placements / Details / </span> Absences</h1>
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
			<th>Instructor</th>
			<th>Clinical</th>
			<th>Section/Term</th>
			<th>Date</th>
			<th>Reason</th>
			<th># of missed days</th>
			<th>Note</th>
			<th>Clinical Absence form</th>
		</tr>
		<tr>
			<td><!--Students-->
				<?php
					$student = "SELECT * FROM students WHERE student_number='$id'";
					$estudent = mysqli_query($conn, $student);
					$rstudent = mysqli_fetch_all($estudent, MYSQLI_ASSOC);
					foreach($rstudent as $rs)
					{
				?>
				<?php echo $rs['first_name']; ?> <?php echo $rs['middle_name']; ?> <?php echo $rs['last_name'];?>
 			</td>
			
			
			
			<td> <?php echo $rs['year']; ?></td>
			<?php } ?>
			
			
			
			<td><!--Placements-->
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
			<td> <?php echo $rs['section']; ?> / 
			<?php
				$num = $rs['student_number'];
				$st = "SELECT * FROM students WHERE student_number='$num'";
				$est = mysqli_query($conn, $st);
				$rest = mysqli_fetch_all($est, MYSQLI_ASSOC);
				foreach($rest as $re)
				{
			?>
			<?php echo $re['start_term']; ?>
				<?php } ?>
			</td>
					<?php } ?>
					
					
					
					
					
			<td>
				<?php
					$details = "SELECT * FROM abscences WHERE student_number =' $id'";
					$edetails = mysqli_query($conn, $details);
					$rdetails = mysqli_fetch_all($edetails, MYSQLI_ASSOC);
					foreach($edetails as $rd)
					{
				?>
				<?php echo $rd['abscence_date']; ?>
				
			</td>	
			
			
			<td><?php echo $rd['reason']; ?></td>
			<td><?php echo $rd['num_days_missed']; ?></td>
			<td><?php echo $rd['note']; ?></td>
			<td><?php echo $rd['absence_form_status']; ?></td>
			<?php
					}
				?>			
			
		</tr>
		</table>
	</div>
</div>
		
<div class="row">
	<div class="col-lg-10 offset-lg-1">
		<h4>Report a new absence</h4>
		
		<form action="placement_abs_enter.php?id=<?php echo $id;?>" method="post">
		<table class="table table-bordered">
			<tr>
				<th style="width:20%; text-align:right;" >Reason:</th>
				<td><input style="width:80%; border-style:hidden;" required name="reason" type="text" placeholder="Enter a reason for absence.." ></td>
			</tr>
			<tr>
				<th style="width:20%; text-align:right;" >Number of missed days:</th>
				<td><input style="width:80%; border-style:hidden;" required name ="days" type="text" placeholder="Day(s) or hh:mm"></td>
			</tr>
			<tr>
				<th style="width:20%; text-align:right;" >Absence date</th>
				<td><input style="width:20%; border-style:hidden;"  required name="abdate" type="date"></td>
			</tr>
			<tr>
				<th style="width:20%; text-align:right;" >Note:</th>
				<td><input style="width:80%; border-style:hidden;" required name="note" type="text" placeholder="Any special note.."></td>
			</tr>
			<tr>
				<th style="width:20%; text-align:right;" >Completed clinical absence form</th>
				<td>Yes <input type="checkbox" name="con[]" value="yes"> No <input type="checkbox" name="con[]" value="no"></td>
			</tr>
		</table>
		<input type="submit" value="Submit">
		</form>
		
	</div>
</div>		
		
		
</main>
</body>		