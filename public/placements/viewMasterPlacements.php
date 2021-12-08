<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php";
include "../../private/db.php";

$sql = "SELECT * FROM placements ORDER BY placement_id";
$result = mysqli_query($conn, $sql);

$placements = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>


  <script src=
        "https://code.jquery.com/jquery-3.2.1.min.js">
    </script>
  
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        type="text/javascript">
    </script>
      
    <link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">
    </script>
</head>

<body>
 <main id="main" class="main">
 
 <div class="row">
 <?php
			if(isset($_SESSION['status']))
				
			{
				echo "hey";
				?>
				<div class="alert alert-success" role="alert">
					<?php echo $_SESSION['status'];  ?>
				</div>
		<?php
				
				unset($_SESSION['status']);
			}
		?>
</div>
 
	<div class="row">
		<h1><span style="color:grey">Homepage /</span>Placements Master</h1>
		
		
		
		<hr>
	</div>
	
	
	<div class="col-lg-12" style="text-align:left; margin-bottom:20px;" >
	<a href="../homepage.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>&nbsp &nbsp <a href="viewMasterPlacements.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-list"></span> &nbsp Placement Master</a> &nbsp &nbsp <a href="add_new_hospital.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-plus"></span> &nbsp Add a new Hospital</a>&nbsp &nbsp <a href="hospital_edit.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-list"></span> &nbsp Edit hospital details</a>&nbsp &nbsp <a href="auto_place.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-list"></span> &nbsp Auto Placements</a>
		</div>	
		<hr>
		
		
		<script>
						$(document).ready(function(){
						   // Select all the rows in the table
							// and get the count of the selected elements
							 $rowCount = $("#table1 tr").length - 2;
							 document.getElementById('count_rows').innerHTML = $rowCount;
						  });
						  
						  		function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("table1");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td1 = tr[i].getElementsByTagName("td")[0];
	td2 = tr[i].getElementsByTagName("td")[1];
    td3 = tr[i].getElementsByTagName("td")[2];
	 td4 = tr[i].getElementsByTagName("td")[3];
	  td5 = tr[i].getElementsByTagName("td")[4];
 

    if (td1 && td2 && td3 && td4 && td5 ) {
      txtValue1 = td1.textContent || td1.innerText;
	  txtValue2 = td2.textContent || td2.innerText;
	  txtValue3 = td3.textContent || td3.innerText;
	   txtValue4 = td4.textContent || td4.innerText;
	    txtValue5 = td5.textContent || td5.innerText;

      if (txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1
	  ||txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1 || txtValue5.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  $rowCount = $("#table1 tr").filter(function() {
     return $(this).css('display') !== 'none';
 }).length-1;
  document.getElementById('count').innerHTML="No. of Rows : "+$rowCount;
}
					</script>
					
					
		<div class="row">
		
	<input type="text" style="width:30%; margin-left:15px;" id="myInput" class="form-control col-md-6 " onkeyup="myFunction()" placeholder="Search for any detail">
	</div>			
		
		<div class="col-md-6" style="margin-top:20px">
		
		</div>
		
		<div style="margin-top:30px;">
			<table class="table table-bordered searchable sortable" id="table1">
			
			<tr>
			
			</tr>
				
				<tr class="item">
					<th>Location<i class='fa fa-fw fa-sort'></th>
					<th>Time<i class='fa fa-fw fa-sort'></th>
					<th>Term<i class='fa fa-fw fa-sort'></th>
					<th>Instructor Assigned<i class='fa fa-fw fa-sort'></th>
					<th>Instructor Assign Edit<i class='fa fa-fw fa-sort'></th>
					<th>Actions</th>
				</tr>
				
				
				<tr>
					<?php
					$student = "SELECT * FROM imp_placements";
					$student_query = mysqli_query($conn, $student);
					$student_result = mysqli_fetch_all($student_query, MYSQLI_ASSOC);
					?>
				<?php foreach($student_result as $sr)
					{
						//$studentNumber = $sr['location'];
					//$student2 = "SELECT * FROM students where student_number = ".$studentNumber."";
					//$student_query2 = mysqli_query($conn, $student2);
					//$student_result2 = mysqli_fetch_array($student_query2, MYSQLI_ASSOC);
					$num = $sr['placement_id'];
					$num2 = $sr['instructor_id'];
					 ?>

					<td><?php echo $sr['location']; ?></td>
					<td><?php echo $sr['time']; ?></td>
					<td><?php echo $sr['term']; ?></td>
					<?php
							$instructor1 = "SELECT * FROM instructors where instructor_id = ".$num2."";
					$instructor1_query = mysqli_query($conn, $instructor1);
					?>
					<td><?php 	while ($row = mysqli_fetch_array($instructor1_query)) {
   							 echo $row['last_name'].",".$row['first_name'];
							} ?></td>
					
					
					<td>
					<form action="assign_inst_to_placement.php?id=<?php echo $sr['placement_id']; ?>" method="post" encrypt="multipart/form-data">
					
						 
						 <select name='PcID' id = 'PcID'>
						<?php
						$sqlget = "SELECT * FROM instructors";
							$result = mysqli_query($conn,$sqlget);
						
							
							while ($row = mysqli_fetch_array($result)) {
   							 echo "<option value='" . $row['instructor_id'] . "'>" . $row['last_name'] . ",".$row['first_name']."-".$row["employee_num"]."</option>";
							}
						

						?>

						<input type="submit" name="submit" value="Update" />
							
							</select>					
						
			 <td> &nbsp &nbsp <a href="placement_edit.php?st_num=<?php echo $num; ?>"><span class="glyphicon glyphicon-pencil" style="color:blue"></span></a>

					</form>
					</td>

					
					
					
			
					</form>
					
				</tr>
				<?php
					}
					?>
				
			</table>			
		
		</div>
		<hr>
		
		
	</div>
 
 </main>
	
</body>

</html>