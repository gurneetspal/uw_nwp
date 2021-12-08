<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php";
include "../../private/db.php";
?>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1><span style="color:grey">Homepage / Placements</span> / Auto Placements View</h1>
		<hr>
	</div>
	
	
	<div class="col-lg-12" style="text-align:left; margin-bottom:20px;" >
	<a href="placements.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
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
    td6 = tr[i].getElementsByTagName("td")[5];
 

    if (td1 && td2 && td3 && td4 && td5 && td6 ) {
      txtValue1 = td1.textContent || td1.innerText;
	  txtValue2 = td2.textContent || td2.innerText;
	  txtValue3 = td3.textContent || td3.innerText;
	  txtValue4 = td4.textContent || td4.innerText;
	  txtValue5 = td5.textContent || td5.innerText;
	  txtValue6 = td6.textContent || td6.innerText;

      if (txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1
	  ||txtValue3.toUpperCase().indexOf(filter) > -1 ||txtValue4.toUpperCase().indexOf(filter) > -1 ||txtValue5.toUpperCase().indexOf(filter) > -1 ||txtValue6.toUpperCase().indexOf(filter) > -1) {
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
	<h3 style="text-align:center;">Following are the placements assigned</h3>
</div>		
		<div class="row">
		<div class="col-lg-3 offset-lg-2">
	<input type="text" style="width:100%;margin-bottom:20px;" id="myInput" class="form-control col-md-6 " onkeyup="myFunction()" placeholder="Search for any detail">
	</div>
	<div class="col-lg-1">
	<a href="autoassign_redo.php"><button class="btn btn-primary">Redo</button></a>
	</div>
	<div class="col-lg-3">
	<a href="autoassign_submit.php"><button class="btn btn-primary">Submit</button></a>
	</div>
	</div>	
	
<div class="row">
	<div class="col-lg-8 offset-lg-2">
		<table class="table table-bordered searchable sortable" id="table1">
			<tr>
				<th>Student last Name<i class='fa fa-fw fa-sort'></th>
				<th>Student First Name<i class='fa fa-fw fa-sort'></th>
				<th>Instructor<i class='fa fa-fw fa-sort'></th>
					<th>Location<i class='fa fa-fw fa-sort'></th>
						<th>Time<i class='fa fa-fw fa-sort'></th>
							<th>Term<i class='fa fa-fw fa-sort'></th>
			</tr>
			<?php
				$sql = "SELECT * FROM temp_placements";
				$ex = mysqli_query($conn, $sql);
				$result = mysqli_fetch_all($ex, MYSQLI_ASSOC);
				foreach($result as $r)
				{
					$sql2 = "SELECT * FROM imp_placements where placement_id = ".$r['placement_id']."";
				$ex2 = mysqli_query($conn, $sql2);
				
			?>
			<tr>
				<td><?php echo $r['student_last_name']; ?></td>
				<td><?php echo $r['student_first_name']; ?></td>
				<?php
				$sql3 = "SELECT * FROM instructors where instructor_id = ".$r['instructor_id']."";
				$ex3 = mysqli_query($conn, $sql3);
				while($row3 = mysqli_fetch_array($ex3))
				{
				?>
				<td><?php echo $row3['last_name'].",".$row3['first_name']; ?></td>
			<?php } ?>
				<td><?php echo $r['location']; ?></td>
				<?php
				while($row2 = mysqli_fetch_array($ex2))
				{
					?>
				<td><?php echo $row2['time']; ?></td>
				<td><?php echo $row2['term']; ?></td>
			</tr>
			<?php
		}
				}
			?>
		</table>
	</div>
</div>
		
</main>
</body>