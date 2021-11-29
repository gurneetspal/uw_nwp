<?php
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
 

    if (td1 && td2 && td3 ) {
      txtValue1 = td1.textContent || td1.innerText;
	  txtValue2 = td2.textContent || td2.innerText;
	  txtValue3 = td3.textContent || td3.innerText;

      if (txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1
	  ||txtValue3.toUpperCase().indexOf(filter) > -1) {
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
	<a href="#"><button class="btn btn-primary">Submit</button></a>
	</div>
	</div>	
	
<div class="row">
	<div class="col-lg-8 offset-lg-2">
		<table class="table table-bordered searchable sortable" id="table1">
			<tr>
				<th>Student<i class='fa fa-fw fa-sort'></th>
				<th>Instructor<i class='fa fa-fw fa-sort'></th>
				<th>Hospital, Department, Unit<i class='fa fa-fw fa-sort'></th>
			</tr>
			<?php
				$sql = "SELECT * FROM tmp_placements";
				$ex = mysqli_query($conn, $sql);
				$result = mysqli_fetch_all($ex, MYSQLI_ASSOC);
				foreach($result as $r)
				{
			?>
			<tr>
				<td><?php echo $r['student']; ?></td>
				<td><?php echo $r['instructor']; ?></td>
				<td><?php echo $r['hospital']; ?></td>
			</tr>
			<?php
				}
			?>
		</table>
	</div>
</div>
		
</main>
</body>