<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php";
include "../../private/db.php";

$id = $_GET['st_num'];
$sql = "SELECT * FROM imp_placements where placement_id ='$id'";

$result = mysqli_query($conn, $sql);

$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1><span style="color:grey">Placements / </span>Placement Update Details</h1><hr>
	</div>
	
	<div class="row" style="background:white"> <!-- NEW STUDENT BUTTON-->
<a href="viewMasterPlacements.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST--> <p><i>Note: <span style="color:red;">*</span> means mandatory field.</i></span></p>
			<?php foreach($students as $st) {?>
		
		
		
		
		
		
		<form action="placement_update_insert.php?st_id=<?php echo $st['placement_id']?>" method="post" >
			<table class="table table-bordered">
			 
			 
			  <tr>
			    <td><span style="color:red">*</span><b>Placement ID</b></td>
				<td><?php echo $st['placement_id'];?></td>
			  </tr>
			  
			   <tr>
			    <td ><span style="color:red">*</span><b>Time</b></td>
				<td><input name="first_name" style="width=:100%; border-style:hidden; color:blue; width:100%" type="text" value="<?php echo $st['time']; ?>"></td>
			  </tr>
			  
			   <tr>
			    <td><span style="color:red">*</span><b>Term</b></td>
				<td><input name="term" type="text" style="color:blue; border-style:hidden; width:100%" placeholder='term' value="<?php echo $st['term']; ?>"></td>
			  </tr>
			  
			  
			
			</table>
			 <span title="Click to submit the update"><input type="submit" class="btn btn-primary" value="Submit"></span>
			</form> <?php } ?>
		
		</div>
			
		<div class="row" style="margin-top:10px;">
			
		</div>
	</div>
 
 </main>
	
</body>

</html>
