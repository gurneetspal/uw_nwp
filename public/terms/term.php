<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php";
include "../../private/db.php";

$sql = "SELECT * FROM terms ORDER BY term_id";
$result = mysqli_query($conn, $sql);

$terms = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script>
			$(document).ready(function()
			{
				debugger;

             $rowCount = $("#table1 tr").length-1;
			 document.getElementById('count').innerHTML="Total Terms: "+$rowCount;
          });

		  function myFunction() 
		  {
			  debugger;
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


    if (td1 && td2 ) {
      txtValue1 = td1.textContent || td1.innerText;
	  txtValue2 = td2.textContent || td2.innerText;

      if (txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  $rowCount = $("#table1 tr").filter(function() {
							 return $(this).css('display') !== 'none';
						 }).length-1;
						 document.getElementById('count').innerHTML="Total Terms: "+$rowCount;
		  }
		</script>
		<style>

			th,td{
				text-align:center;
			}
			th{
				width:33%;
			}
			</style>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1>Terms Management</h1>
	</div>
	
	<div class="row" style="background:white"> <!-- NEW STUDENT BUTTON-->
		<div class="col-lg-12" style="text-align:left;" >
			<a href="../homepage/homepage.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> &nbsp &nbsp <a href="term_insert_form.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-plus"></span> &nbsp Add a new Term</a>
		</div>	
		
		<div style="margin-top:20px;">
		&nbsp&nbsp<b><span id="count"></span></b>
	</div>
	<div class="col-md-6" style="margin-top:20px;">
		<input type="text" id="myInput" class="form-control col-md-6 " title="Enter the keywords to search.." onkeyup="return myFunction();" placeholder="Search by any column name">
		</div>

		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST-->
		<table id="table1" class="table table-striped searchable sortable">
			  <tr class="theader">
				<th>Term id<i class='fa fa-fw fa-sort'></th>
				<th>Term Name<i class='fa fa-fw fa-sort'></th>
				<th>Action</th>
				
			  </tr>
			  <?php foreach($terms as $st) {?>
			  <tr>
				<td> 
				 <?php echo $st['term_id']; ?> </a> </td>

				<td><?php echo $st['term_name']; ?></td>

				<td><a onclick="return confirm('Are you sure you want to delete');" href="term_delete.php?term_id=<?php echo $st['term_id']?>">Delete</a> &nbsp &nbsp 
				<!-- <a href="term_view.php?st_num=<?php echo $st['term_id']?>"><span class="glyphicon glyphicon-eye-open" style="color:blue"></span></a> -->
				 &nbsp <a href="term_update_form.php?id=<?php echo $st['term_id']?>"> 
				 Update</a>
				</td>
			  
			  </tr>
			  <?php } ?>
			
			</table>
		
		</div>
	</div>
 
 </main>
	
</body>

</html>