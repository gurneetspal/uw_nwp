<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";
include "../../private/header.php";
$id = $_GET['st_num'];
?>
<body>
 <main id="main" class="main">
<div class="row">
		<h1><span style="color:grey">Placements /</span> Details</h1>
		<hr>
</div>

<div class="col-lg-12" style="text-align:left; margin-bottom:20px;" >
	<a href="placements.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
</div>	
<hr>

<div class="row">
	<p>Placement Status: 
	<b><?php
		$stat = "SELECT * FROM placements WHERE student_number='$id' ";
		$state = mysqli_query($conn, $stat);
		$stater = mysqli_fetch_all($state, MYSQLI_ASSOC);
		foreach($stater as $s)
		{
			if($s['status']==0)
			{
				echo "On hold";
			}
			if($s['status']==1)
			{
				echo "Placed";
			}
			else
			{
				echo "Not Placed";
			}
		}
	?>
	</b></p>
</div>
<div class="row" style="text-align:center;">
	<h3><b><u>Time Table</u></b></h3>
	
	<div class="col-lg-10 offset-lg-1">
		<table class="table table-bordered">
			<tr>
			<th>Name</th>
			<th>Student Number</th>
			<th>Instructor</th>
			<th>Hospital Name</th>
			<th>Department</th>
			<th>Unit Name</th>
			<th>Timings</th>
			<th>Placed on</th>
			</tr>
			
			
			<tr>
			<?php
				$sql = "SELECT * FROM students WHERE student_number = '$id'";
				$esql = mysqli_query($conn, $sql);
				$results = mysqli_fetch_all($esql, MYSQLI_ASSOC);
				foreach($results as $r)
				{
			?>
			<td><?php echo $r['first_name']; ?><?php echo $r['middle_name']; ?> <?php echo $r['last_name']; ?></td>
			<?php
			}
			?>
			<td><?php echo $id;?></td>
			<?php
				$place = "SELECT * FROM placements WHERE student_number='$id'";
				$eplace = mysqli_query($conn, $place);
				$result_place = mysqli_fetch_all($eplace, MYSQLI_ASSOC);
				foreach($result_place as $rp)
				{
			?>
			<td><?php echo $rp['instructor']; ?></td>
			<td><?php echo $rp['h_name']; ?></td>
			<td>
				<?php $depart = explode(",", $rp['h_department']); 
					$value_count1 = count($depart);
					?>
					<ul style="list-style:none">
					<?php
					for($x = 0; $x < $value_count1; $x++)
					{
					?>
						<li><?php echo $depart[$x]; ?></li>
						<?php
							}
					?>
					</ul>
			</td>
			
			
			<td>
				<?php $units = explode(",", $rp['h_unit']); 
					$value_count = count($units);
					?>
					<ul style="list-style:none">
					<?php
					for($x = 0; $x < $value_count; $x++)
					{
					?>
						<li><?php echo $units[$x]; ?></li>
						<?php
							}
					?>
					</ul>
			</td>
			
				
				<td><?php echo $rp['days'] ?> / <?php echo $rp['start_time']; ?> - <?php echo $rp['end_time']; ?></td>
				<td><?php echo $rp['created_at']; ?></td>
				<?php
				}
			?>
			</tr>
			
			
		</table>
	</div>
</div>

<div class="row">
	<div class="col-lg-3 offset-lg-1">
		<h4><a href="placement_abs.php?id=<?php echo $id; ?>" style="color:blue">Report/View absences</a></h4>
	</div>	
	<div class="col-lg-5">
		<h4><a href="placement_incidents.php?id=<?php echo $id; ?>" style="color:blue">Report/View incidents</a></h4>
	</div>
</div>

</main>
</body>