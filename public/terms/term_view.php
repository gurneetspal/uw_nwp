<?php

session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}

include "../../private/header.php";
include "../../private/db.php";


$id = $_GET['st_num'];
$sql = "SELECT * FROM terms t inner join students s on t.term_id=s.start_term where term_id='$id' ORDER BY term_id";
$result = mysqli_query($conn, $sql);
$rows=mysqli_num_rows ( $result );
$terms = mysqli_fetch_all($result, MYSQLI_ASSOC);

/* fetch associative array */

?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1>Term details</h1>
		<hr>
	</div>
	
	<div class="row" style="background:white"> <!-- NEW STUDENT BUTTON-->
	<a onclick="history.back(-1)" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
	
		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST-->
		<div class="form-group text-center">
			<h3> <?php echo $terms[0]['term_name'] ?> / <?php echo $id?></h3>
</div>

<table class="table table-bordered">
			  
			   	<tr>
					   <th>Student Number</th>
					   <th>Name</th>
					   <th>Email</th>
					   <th>School</th>
					   <th>Year Level</th>					   

			  </tr>
			  
				<tr>
					<?php foreach($terms as $st) {?>
					<td><a href="student_view.php?st_num=<?php echo $st['student_number']?>">
						
					<?php echo $st['student_number'] ?>
					</a>
				</td>
					<td><?php echo $st['first_name']  ?> <?php echo $st['last_name']  ?></td>
					<td><?php echo $st['uwin_email'] ?></td>
					<td><?php echo $st['school_id'] ?></td>
					<td><?php echo $st['year_level'] ?></td>

			  </tr>

			
			
			  
			  <?php } ?>
			
			</table> 
			
		
		</div>
			
		<div class="row" style="margin-top:10px;">
			
		</div>
	</div>
 
 </main>
	
</body>

</html>