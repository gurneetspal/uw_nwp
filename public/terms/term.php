<?php
include "../../private/header.php";
include "../../private/db.php";

$sql = "SELECT * FROM terms ORDER BY term_id";
$result = mysqli_query($conn, $sql);

$terms = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1>Terms Management</h1>
	</div>
	
	<div class="row" style="background:white"> <!-- NEW STUDENT BUTTON-->
		<div class="col-lg-12" style="text-align:left;" >
			<a href="../homepage.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> &nbsp &nbsp <a href="term_insert_form.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-plus"></span> &nbsp Add a new Term</a>
		</div>	
		
		
		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST-->
			<table class="table table-bordered">
			  <tr>
				<th>Term id</th>
				<th>Term Name</th>
				<th>Action</th>
				
			  </tr>
			  <?php foreach($terms as $st) {?>
			  <tr>
				<td> <a href="term_view.php?st_num=<?php echo $st['term_id']?>"> <?php echo $st['term_id']; ?> </a> </td>
				<td><?php echo $st['term_name']; ?></td>
				<td><span class="glyphicon glyphicon-remove" style="color:red;"></span></a> &nbsp &nbsp <a href="student_view.php?st_num=<?php echo $st['student_number']?>"><span class="glyphicon glyphicon-eye-open" style="color:blue"></span></a> &nbsp &nbsp <a href="student_update_form.php?id=<?php echo $st['student_number']?>"> <span class="glyphicon glyphicon-pencil" style="color:green"></span></a></td>
			  
			  </tr>
			  <?php } ?>
			
			</table>
		
		</div>
	</div>
 
 </main>
	
</body>

</html>