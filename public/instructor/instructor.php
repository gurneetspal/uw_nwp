<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php";
include "../../private/db.php";

$sql = "SELECT * FROM instructors ORDER BY instructor_id";
$result = mysqli_query($conn, $sql);
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
$rowCount='';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>


	<script src="https://use.fontawesome.com/b27c5b9ae9.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/jquery.fancytable/dist/fancyTable.min.js"></script>

	<script>

		$(document).ready(function(){
           // Select all the rows in the table
            // and get the count of the selected elements
             $rowCount = $("#table1 tr").length-1;
			 document.getElementById('count').innerHTML="No. of Instructor : "+$rowCount;
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


    if (td1 && td2 && td3 ) {
      txtValue1 = td1.textContent || td1.innerText;
	  txtValue2 = td2.textContent || td2.innerText;
	  txtValue3 = td3.textContent || td3.innerText;
	  txtValue4 = td4.textContent || td4.innerText;

      if (txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1
	  ||txtValue3.toUpperCase().indexOf(filter) > -1||txtValue4.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  $rowCount = $("#table1 tr").filter(function() {
     return $(this).css('display') !== 'none';
 }).length-1;
  document.getElementById('count').innerHTML="No. of Instructor : "+$rowCount;
}
	</script> 

</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1>Instructor Portal</h1>
		<hr>
	</div>
	
	<div class="row" style="background:white"> <!-- NEW STUDENT BUTTON-->
		<div class="col-lg-12" >
			<a href="../homepage/homepage.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> &nbsp &nbsp <a href="instructors_insert_form.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-plus"></span> &nbsp Add a new instructor</a>
		</div>	
		
		
		<div style="margin-top:20px;">
		&nbsp&nbsp<b><span id="count"></span></b>
	</div>
	<div class="col-md-6" style="margin-top:20px;">
		<input type="text" id="myInput" class="form-control col-md-6 " title="Enter the keywords to search.." onkeyup="return myFunction();" placeholder="Search by any column name">
		</div>
		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST-->

		<table id="table1" class="table table-striped searchable sortable">
				
				
			  <tr class="item theader">
				<th class="mt-head"></i>Instructor Number<i class='fa fa-fw fa-sort'></th>
				<th class="mt-head">First Name<i class='fa fa-fw fa-sort'></th>
				<th class="mt-head">Last Name<i class='fa fa-fw fa-sort'></th>
				<th class="mt-head">University ID</th>
				<th class="mt-head">Comments</th>
				<th class="mt-head">Action</th>
				
			  </tr>
			  <?php foreach($students as $st) {?>
			  <tr>
				<td>  <?php echo $st['employee_num']; ?>  </td>
				<td><?php echo $st['first_name']; ?></td>
				<td><?php echo $st['last_name']; ?></td>
				<td><?php echo $st['uwin_email']; ?></td>
				<td>
				<form action="inst_comment_add.php?id=<?php echo $st['employee_num']; ?>" method="post" encrypt="multipart/form-data">
					
		<input type="text" class="form-control" style="border 1" placeholder="Enter a comment" name ="comments" value="<?php echo $st['comments']; ?>" style="width:50%; border-style:hidden;" > 
		<input style="color:#5e89b8; border-style:hidden; background-color:#0000;" type="submit" value="Add"> 
		&nbsp &nbsp 				
 
		<a href="inst_comment_remove.php?id=<?php echo $st['employee_num']; ?>">Remove</a>
			  
						
					</form>
				</td>
				<td>
				<a onclick="return confirm('Are you sure you want to delete');" href="instructors_process.php?DeleteInstructorId=<?php echo $st['instructor_id']; ?>">
				Delete</a>&nbsp &nbsp
				<a href="instructors_edit_form.php?InstructorId=<?php echo $st['instructor_id']; ?>&&type='view'">
				View</</a> &nbsp 
				<a href="instructors_edit_form.php?InstructorId=<?php echo $st['instructor_id']; ?>&&type='edit'">
				Update</</a>
				

                                                        </td>
			  </tr>
			  <?php } ?>
			
			</table>
			  </div>
		</div>
	</div>
 
 </main>
	
</body>

</html>