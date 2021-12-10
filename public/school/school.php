<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php";
include "../../private/db.php";

$sql = "SELECT * FROM schools ORDER BY school_id";
$result = mysqli_query($conn, $sql);

$schools = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<script>
myfunction(){
	alert("Are you sure you want to delete ?");
}

</script>
<script>
			$(document).ready(function()
			{
				debugger;

             $rowCount = $("#table1 tr").length-1;
			 document.getElementById('count').innerHTML="Total Schools: "+$rowCount;
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
    td3 = tr[i].getElementsByTagName("td")[2];
 

    if (td1 && td2 && td3 ) {
      txtValue1 = td1.textContent || td1.innerText;
	  txtValue2 = td2.textContent || td2.innerText;
	  txtValue3 = td3.textContent || td3.innerText;
	  
      if (txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1
	  ||txtValue3.toUpperCase().indexOf(filter) > -1 ) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  $rowCount = $("#table1 tr").filter(function() {
							 return $(this).css('display') !== 'none';
						 }).length-1;
document.getElementById('count').innerHTML="Total Schools: "+$rowCount;
		  }
		</script>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1>School Portal</h1>
		<hr>
	</div>
	
	<div class="row" style="background:white"> <!-- NEW SCHOOL BUTTON-->
		<div class="col-lg-12" style="text-align:left;" >
						<a href="../homepage/homepage.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> &nbsp &nbsp <a href="school_insert_form.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-plus"></span> &nbsp Add a new school details</a>
		</div>	
		
		<div style="margin-top:20px;">
		&nbsp&nbsp<b><span id="count"></span></b>
	</div>
	<div class="col-md-6" style="margin-top:20px;">
		<input type="text" id="myInput" class="form-control col-md-6 " title="Enter the keywords to search.." onkeyup="return myFunction();" placeholder="Search by any column name">
		</div>
		<div class="row" style="background:white; margin-top:30px;"> <!-- School LIST-->
		<table id="table1" class="table table-striped searchable sortable">
		<tr class="item theader" >
				<th style="text-align:center" >School Id<i class='fa fa-fw fa-sort'></th>
				<th style="text-align:center">School Name<i class='fa fa-fw fa-sort'></th>
				<th style="text-align:center">School Abbreviation<i class='fa fa-fw fa-sort'></th>
				<th style="text-align:center">Action</th>
				
				
			  </tr>
			  <?php foreach($schools as $st) {?>
			  <tr align="center">
				<td>  <?php echo $st['school_id']; ?> </td>
				<td><?php echo $st['school_name']; ?></td>
				<td><?php echo $st['school_abbreviation']; ?></td>
				<td><a onclick="return confirm('Are you sure you want to delete?')" href="school_delete.php?st_num=<?php echo $st['school_id']?>">
				Delete</a>&nbsp 
				<a href="school_view.php?st_num=<?php echo $st['school_id']?>">
				View</a>&nbsp 
				<a href="school_update_form.php?id=<?php echo $st['school_id']?>"> 
				Update</a></td>
			  </tr>
			  <?php } ?>
			
			</table>
		
		</div>
	</div>
 
 </main>
	
</body>

</html>