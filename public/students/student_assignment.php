<?php
include "../../private/header.php";
include "../../private/db.php"; 
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1><span style="color:grey">Student Portal / </span>Assign <?php 
		$id = $_GET['id'];
		$c = "SELECT * FROM students WHERE student_number = '$id'";
		$cex = mysqli_query($conn, $c);
		$cer = mysqli_fetch_all($cex, MYSQLI_ASSOC); 
		foreach($cer as $cp)
		{
			echo $cp['first_name'];
		}?> to a new section or class</h1>
	</div>
	<hr>
	
	<div class="row" style="background:white">
	<a href="student.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
	<small style="margin-top:10px;"><p><i>Note:</i> <span style="color:red;">*</span><i> means a required field.</i></p></small>
	</div>
	<div class="row" style="background:white">
		<div class="col-lg-12" >
		  <form action="student_assignment_insert.php?id=<?php echo $id;?>" method="post" encrypt="multipart/form-data">
                        <div class="row">
							<div class="col-lg-3">
							<label>Student number: </label>
							<?php
								$id = $_GET['id'];
								echo $id;
							?>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-4">
								<label><span style="color:red;">*</span>Select a Class</label>
									<select required class="form-group" name="class_select">
									<option>--Choose an Option--</option>
									<?php 
										$cl = "SELECT * FROM classes";
										$cle = mysqli_query($conn, $cl);
										$clr = mysqli_fetch_all($cle, MYSQLI_ASSOC);
										foreach($clr as $c)
										{
									?>
									<option value="<?php echo $c['class_id']; ?>"><?php echo $c['class_id']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-4">
								<label><span style="color:red">*</span>Select a section</label>
								<select name="section_id" required class="form-group">
									<option>-Choose an Option---</option>
									<?php
										$se = "SELECT * FROM section";
										$see = mysqli_query($conn, $se);
										$ser = mysqli_fetch_all($see, MYSQLI_ASSOC);
										foreach($ser as $s)
										{
									?>
									<option value="<?php echo $s['section_id']; ?>"><?php echo $s['section_id']; ?></option>
									<?php } ?>
								</select>
								
							</div>
						</div>
						
						
                        <input type="submit" class="btn btn-primary" value="Enroll">
                    </form>
			
		</div>
	</div>
 
 </main>
	
</body>

</html>