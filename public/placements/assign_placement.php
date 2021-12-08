<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
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
			
			
			<div class="row">
				<div class="col-lg-3">
					<label>Choose a Placement:</label>
				</div>
				<div class="col-lg-3">
					<select name="inst">
						<option>--Choose a placement--</option>
						<?php
							$in = "SELECT * FROM imp_placements WHERE placement_id NOT IN (select placement_id from placements);";
							$ein = mysqli_query($conn, $in);
							$rin = mysqli_fetch_all($ein, MYSQLI_ASSOC);
							foreach($rin as $ri)
							{
						?>
						<option value="<?php echo $ri['placement_id']; ?>"><?php echo $ri['location']; ?><?php echo " (" ?><?php echo $ri['time']; ?><?php echo " - "; ?><?php echo $ri['term']; ?><?php echo ")" ?></option>
						<?php }?>
					</select>
				<div>
			</div>
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