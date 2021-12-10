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
	
	<script>
						$(document).ready(function(){
						   // Select all the rows in the table
							// and get the count of the selected elements
							 $rowCount = $("#table1 tr").length - 2;
							 document.getElementById('count').innerHTML="No. of Placements : "+$rowCount;
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
  document.getElementById('count').innerHTML="No. of Placements : "+$rowCount;
}
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
		<h1>Assigned Placements</h1>
	</div>
	
	
	<div class="col-lg-12" style="text-align:left; margin-bottom:20px;" >
	<a href="../homepage/homepage.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> 
	&nbsp Back</a>&nbsp &nbsp <a href="viewMasterPlacements.php" class="btn btn-primary btn-md active">
		<span class="glyphicon glyphicon-list"></span> &nbsp Placement Master</a> 
		<!--&nbsp &nbsp <a href="add_new_hospital.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-plus"></span> &nbsp Add a new Hospital</a>&nbsp &nbsp <a href="hospital_edit.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-list"></span> &nbsp Edit hospital details</a>-->
		&nbsp &nbsp <a href="auto_place.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-list"></span> &nbsp Auto Placements</a>
		</div>	
		
		
					
					
		<div style="margin-top:20px;">
		&nbsp&nbsp<b><span id="count"></span></b>
		</div>
		<div class="col-md-6" style="margin-top:20px;">
		<input type="text" id="myInput" class="form-control col-md-6 " title="Enter the keywords to search.." onkeyup="return myFunction();" placeholder="Search by any column name">
		</div>
		
		<div class="" style="background:white; margin-top:70px;"> <!-- STUDENT LIST-->
		<table id="table1" class="table table-striped searchable sortable">
			
			
				
				<tr class="item theader">
					<th>Student name<i class='fa fa-fw fa-sort'></th>
					<th>Student id<i class='fa fa-fw fa-sort'></th>
					<th>Term<i class='fa fa-fw fa-sort'></th>
					<th>Location<i class='fa fa-fw fa-sort'></th>
					<th>Time / batch<i class='fa fa-fw fa-sort'></th>
					<th>Comment</th>
					<th>Placment Status</th>
					<th>Actions</th>
				</tr>
				
				
				<tr>
					<?php
					$student = "SELECT * FROM placements";
					$student_query = mysqli_query($conn, $student);
					$student_result = mysqli_fetch_all($student_query, MYSQLI_ASSOC);
					?>
				<?php foreach($student_result as $sr)
					{
						$studentNumber = $sr['student_number'];
					$student2 = "SELECT * FROM students where student_number = ".$studentNumber."";
					$student_query2 = mysqli_query($conn, $student2);
					//$student_result2 = mysqli_fetch_array($student_query2, MYSQLI_ASSOC);
					while($row2 = mysqli_fetch_array($student_query2))
				{
					?>
					<td><?php echo $row2['first_name'];?> <?php echo $row2['last_name']; ?></td>
					<td><?php echo $sr['student_number']; ?></td>
					<?php } ?>
					
					<?php
						$num = $sr['placement_id'];

						$q = "SELECT * FROM imp_placements WHERE placement_id='$num'";
						$qq = mysqli_query($conn, $q);
						$qrun = mysqli_fetch_all($qq, MYSQLI_ASSOC);
						foreach($qrun as $qe){					
					?>
					
					<td><?php echo $qe['term']; ?></td>
					<td><?php echo $qe['location']; ?></td>
					<td><?php echo $qe['time']; ?></td>
						<?php } ?>
					
						
					
						
					<td>
					<form action="placement_comment_add.php?id=<?php echo $sr['student_number']; ?>" method="post" encrypt="multipart/form-data">
					
						<input type="text" class="form-control" style="border 1" placeholder="Enter a comment" name ="comments" 
						<?php
							$stnum = $sr['student_number'];
							$c = "SELECT * FROM placement_comments WHERE student_number='$stnum'";
							$ec = mysqli_query($conn, $c);
							$rc = mysqli_fetch_all($ec, MYSQLI_ASSOC);
							foreach($rc as $rr)
							{
							 ?>
						value="<?php echo $rr['comments']; ?>"
							<?php } ?>						
						style="width:100%; border-style:hidden;" > 
						<input style="color:#5e89b8; border-style:hidden; background-color:#0000;" 
						type="submit" value="Add"> &nbsp <a href="placement_comment_remove.php?id=<?php echo $sr['student_number']; ?>">Remove</a>
			 
					</form>
					</td>
					<td>
					<?php
						$stat = "SELECT * FROM placements WHERE student_number='$stnum'";
						$state = mysqli_query($conn, $stat);
						$statr = mysqli_fetch_all($state, MYSQLI_ASSOC);
						?>
						
						
						
						<?php
						foreach($statr as $s)
						{
						?>
						<?php
							if($s['status']== NULL)
							{
								echo "Not Placed";
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
					
					</td>
					
					
					<td><!--<a href="placement_status_change.php?id=<?php echo $num;?>"<span class="glyphicon glyphicon-refresh" style="color:red;"></span></a> --> 
					<a href="assign_placement.php?id=<?php echo $s['confirmed_placement_id']?>"> 
					Update</span></a>

                    &nbsp &nbsp<a  href="assign_placement_delete.php?id=<?php echo $s['confirmed_placement_id']?>&StudentId=<?php  echo $sr['student_number']?>&Placement_id=<?php echo $qe['placement_id']?>" onclick="return confirm('Are you sure you want to delete');"> 
					Delete</span></a> </td>
					</form>
					
				</tr>
				<?php
					}
					?>
				
			</table>			
		
		</div>
		
		
 
 </main>
	
</body>

</html>