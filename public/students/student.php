<?php
include "../../private/header.php";
include "../../private/db.php";

$sql = "SELECT * FROM students ORDER BY student_number";
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
		<h1>Student Portal</h1>
		<hr>
		
	</div>
	
	<div class="row" style="background:white"> <!-- NEW STUDENT BUTTON-->
		<div class="col-lg-12" style="text-align:left;" >
			<a href="../homepage.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp <span title="Homepage">Back</span></a> &nbsp &nbsp <a href="student_insert_form.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-plus"></span> &nbsp Add a new Student</a>
		</div>	
		
		
		<script>
			
						$(document).ready(function(){
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
							  td7 = tr[i].getElementsByTagName("td")[6];
							  
						 

							if (td1 && td2 && td3 && td4 && td5 && td6 && td7) {
							  txtValue1 = td1.textContent || td1.innerText;
							  txtValue2 = td2.textContent || td2.innerText;
							  txtValue3 = td3.textContent || td3.innerText;
							   txtValue4 = td4.textContent || td4.innerText;
								txtValue5 = td5.textContent || td5.innerText;
								txtValue6 = td6.textContent || td6.innerText;
								txtValue7 = td7.textContent || td7.innerText;

							  if (txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1
							  ||txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1 || txtValue5.toUpperCase().indexOf(filter) > -1 
							  || txtValue6.toUpperCase().indexOf(filter) > -1 || txtValue7.toUpperCase().indexOf(filter) > -1) {
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
					
		<div class="row" style="margin-top:20px;">
			<b>Number of row: <span id="count_rows"></span></b>
		</div>
		
		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST-->
			<table class="table table-bordered searchable sortable" id="table1" >
			<tr>
			<input type="text" id="myInput" class="form-control col-md-6 " style="width:20%; margin-bottom:20px;" onkeyup="myFunction()" placeholder="Search for any detail">
			</tr>
			  <tr class="item">
				<th>Student Number<i class='fa fa-fw fa-sort'></th>
				<th>Name<i class='fa fa-fw fa-sort'></th>
				<th>Uwin id<i class='fa fa-fw fa-sort'></th>
				<th>Address</th>
				<th>Contact</th>
				<th>Start Term<i class='fa fa-fw fa-sort'></th>
				<th>Status<i class='fa fa-fw fa-sort'></th>
				<th>Comments</th>
				<th>Action</th>
				
				
			  </tr>
			  <?php foreach($students as $st) {?>
			  <tr>
				<td> <?php echo $st['student_number']; ?> </td>
				<td><?php echo $st['first_name']; ?> <?php echo $st['middle_name']; ?> <?php echo $st['last_name']; ?></td>
				<td><?php echo $st['uwin_email']; ?></td>
				<td><?php echo $st['home_address']; ?>, <?php echo $st['home_city']; ?>, <?php echo $st['prov_id']; ?>, <?php echo $st['home_postal_code']; ?></td>
				<td><?php echo $st['phone1']; ?></td>
				<td><?php echo $st['start_term']; ?></td>
				<td>
					<?php
							if($st['status'] == 0){
								echo "INACTIVE";
							}
							else
								{
								echo "ACTIVE";
							}
					?>
				</td>
				<td>
					<form action="student_comment_add.php?id=<?php echo $st['student_number']; ?>" method="post" encrypt="multipart/form-data">
					
						<input type="text" placeholder="Enter a comment" name ="comments" value="<?php echo $st['comments']; ?>" style="width:100%; border-style:hidden;" > <span title="Add the comment"><input style="color:green; background-color:white; border-style:hidden;" type="submit" value="Add"></span> &nbsp <span title="Remove the comment"><a href="student_comment_remove.php?id=<?php echo $st['student_number']; ?>">Remove</a></span>
			  
						
					</form>
				</td>
				
				<td><a href="student_change_status.php?id=<?php echo $st['student_number']; ?>"><span title="Change the status" class="glyphicon glyphicon-remove" style="color:red;"></span></a> &nbsp &nbsp <a href="student_view.php?st_num=<?php echo $st['student_number']?>"><span class="glyphicon glyphicon-eye-open" title="View student details" style="color:blue"></span></a> &nbsp &nbsp <a href="student_update_form.php?id=<?php echo $st['student_number']?>"> <span class="glyphicon glyphicon-pencil" title="Edit the student details" style="color:green"></span></a>&nbsp &nbsp <a href="student_assignment.php?id=<?php echo $st['student_number']?>"> <span class="glyphicon glyphicon-list-alt" style="color:green"></span></a></td>
			  </tr>
			  <?php } ?>
			
			</table>
		
		</div>
	</div>
 
 </main>
	
</body>

</html>