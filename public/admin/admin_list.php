<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php";
include "../../private/db.php";

$sql = "SELECT * FROM admin_users ORDER BY admin_id";
$result = mysqli_query($conn, $sql);
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script src="https://use.fontawesome.com/b27c5b9ae9.js"></script>
	<script>
			$(document).ready(function()
			{
				debugger;

             $rowCount = $("#table1 tr").length-1;
			 document.getElementById('count').innerHTML="Total Users: "+$rowCount;
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
  td4 = tr[i].getElementsByTagName("td")[3];
  td5 = tr[i].getElementsByTagName("td")[4];


    if (td1 && td2 && td3 && td4 && td5) {
      txtValue1 = td1.textContent || td1.innerText;
	  txtValue2 = td2.textContent || td2.innerText;
	  txtValue3 = td3.textContent || td3.innerText;
	   txtValue4 = td4.textContent || td4.innerText;
	   txtValue5 = td5.textContent || td5.innerText;

      if (txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1
	  ||txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1
	  || txtValue5.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
  $rowCount = $("#table1 tr").filter(function() {
							 return $(this).css('display') !== 'none';
						 }).length-1;
						 document.getElementById('count').innerHTML="Total Users: "+$rowCount;
		  }
		</script>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1>Admin Staff</h1>
		<hr>
	</div>
	
	
	
	
	<div class="row" style="background:white;"> <!-- NEW STUDENT BUTTON-->
		<div class="col-lg-12" style="text-align:left;" >
			<a href="../homepage/homepage.php" class="" title="Back to homepage"><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> &nbsp &nbsp <a href="../admin/admin_insert_form.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-plus"></span> &nbsp Add a new user to the portal</a>
		
		</div>
		
		
		
		
		
		
		
		
		
		<div style="margin-top:20px;">
		&nbsp&nbsp<b><span id="count"></span></b>
	</div>
	<div class="col-md-6" style="margin-top:20px;">
		<input type="text" id="myInput" class="form-control col-md-6 " title="Enter the keywords to search.." onkeyup="return myFunction();" placeholder="Search by any column name">
		</div>
		
		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST-->
			<table id="table1" class="table table-striped searchable sortable">
				
				   
				<script>
						
				</script>				
		
			  <tr class="item theader" >
				<th style="width:15%">Admin Number<i class='fa fa-fw fa-sort'></th>
				<th style="width:15%">First Name<i class='fa fa-fw fa-sort'></th>
				<th style="width:15%">Last Name<i class='fa fa-fw fa-sort'></th>
				<th>University ID<i class='fa fa-fw fa-sort'></th>
				<th>Status<i class='fa fa-fw fa-sort'></th>
				<th>Comment</th>
				<th style="width:13%">Action</th>
			  </tr>
			  <?php foreach($students as $st) {?>
			  <tr>
				<td >				<?php echo $st['admin_id']; ?>
				</td>
				
				<td><?php echo $st['first_name']; ?></td>
				<td><?php echo $st['last_name']; ?></td>
				<td><?php echo $st['uwin_email']; ?></td>
				<td>
					<?php
						if($st['status'] == 1){
							echo "ACTIVE";
						}
						else{
							echo "INACTIVE";
						}
					?>
				
				</td>
				
				<td>
				
			<form action="admin_comment_add.php?id=<?php echo $st['admin_id'];?>" method="post">
				<input type="text" class="form-control" style="border 1" placeholder="Add a comment" required name="comment_section"
				value= "<?php echo $st['comments'];?>" style="width:100%; border-style:hidden">		
		<div class="d-flex justify-content-center">
			<input style="color:#5e89b8; border-style:hidden; background-color:#0000;" type="submit" value="Add">

			&nbsp &nbsp 				
				<a href="admin_comment_remove.php?id=<?php echo $st['admin_id']; ?>">Remove</a>
				</div>
				
				</td>
				</form>
				<td>
				<div>
					<!-- <a href="instructors_edit_form.php?InstructorId=<?php echo $st['instructor_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
                  <a href="admin_status_change.php?id=<?php echo $st['admin_id']; ?>" 
				  onclick="return confirm('Are you sure you want to proceed?')">Change-Status</a> 
				  <a href="admin_status_change.php?other_id=<?php echo $st['admin_id']; ?>" 
				  onclick="return confirm('Are you sure you want to proceed?')">Delete</a> 
</div>
                                                        </td>
			  </tr>
			  <?php } ?>
			  
			
			</table>
		
		</div>
		
		<div class="row" style="margin-top:20px">
			<p><i>By default the new admin user will have an <span style="color:green;">ACTIVE</span> status.</i></p>
		</div>
		
	</div>
 
 </main>
	
</body>

</html>