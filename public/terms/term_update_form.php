<?php

session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php";
include "../../private/db.php";

$id = $_GET['id'];
$sql = "SELECT * FROM terms where term_id ='$id'";
$result = mysqli_query($conn, $sql);

$instructors = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
	<a href="term.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
	
		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST--> 
		
		<?php foreach($instructors as $st) {?>
		<form action="term_update_insert.php?inst_id=<?php echo $st['term_id']?>" method="post" encrypt="multipart/form-data">
			<table class="table table-bordered">
			
			
			 
			  <tr>
			    <td><span style="color:red">*</span><b>Term Id</b></td>
				<td><?php echo $st['term_id'];?></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Term Name</b></td>
				<td><input name="term_name" type="text" value="<?php echo $st['term_name']; ?>"></td>
			  </tr>
			  
			<tr>			  
			    <td><span style="color:red">*</span><b>Created At</b></td>
				<td><input name="created_at" type="text" value="<?php echo $st['created_at']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><b>Last Updated</b></td>
				<td><?php echo $st['updated_at']; ?></td>
			  </tr>
			  <?php } ?>
			</table>
			 <input type="submit" class="btn btn-primary" value="Submit">
			</form>
		
		</div>
			
		<div class="row" style="margin-top:10px;">
			<p><i>Note: <span style="color:red;">*</span> means mandatory field.</i></span></p>
		</div>
	</div>
 
 </main>
	
</body>

</html>
