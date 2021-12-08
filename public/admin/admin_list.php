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
session_start();
$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script src="https://use.fontawesome.com/b27c5b9ae9.js"></script>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1>Admin Staff</h1>
		<hr>
	</div>
	
	
	
	
	<div class="row" style="background:white;"> <!-- NEW STUDENT BUTTON-->
		<div class="col-lg-12" style="text-align:left;" >
			<a href="../homepage.php" class="" title="Back to homepage"><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> &nbsp &nbsp <a href="../admin/admin_insert_form.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-plus"></span> &nbsp Add a new user to the portal</a>
		
		</div>
		
		
		
		
		
		
		
		
		
		<div style="margin-top:20px;">
		<script>
			$(document).ready(function(){
             $rowCount = $("#table1 tr").length-1;
			 document.getElementById('count').innerHTML="Total Users: "+$rowCount;
          });
        
		</script>
		<b><span id="count"></span></b>
	</div>
	
	
	
	
	
	<div class="col-md-6" style="margin-top:20px;">
		<input type="text" id="myInput" class="form-control col-md-6 " title="Enter the keywords to search.." onkeyup="myFunction()" placeholder="Search by any column name">
		</div>
		
		<div class="row" style="background:white; margin-top:30px;"> <!-- STUDENT LIST-->
			<table id="table1" class="table table-bordered searchable sortable">
				<?php if(isset($_SESSION['msg'])){
					echo "string";
					exit();
					?>
                      <div class="alert alert-danger"> <i class="mdi mdi-book-multiple"></i><?php echo $_SESSION['msg'];?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                        </div>
                    <?php   unset($_SESSION['msg']);
                   }?>
				   
				<script>
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

    if (td1 && td2 && td3 && t4) {
      txtValue1 = td1.textContent || td1.innerText;
	  txtValue2 = td2.textContent || td2.innerText;
	  txtValue3 = td3.textContent || td3.innerText;
	   txtValue4 = td4.textContent || td4.innerText;

      if (txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1
	  ||txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
				</script>				
				   
			  <tr class="item">
				<th>Admin Number<i class='fa fa-fw fa-sort'></th>
				<th>First Name<i class='fa fa-fw fa-sort'></th>
				<th>Last Name<i class='fa fa-fw fa-sort'></th>
				<th>University ID<i class='fa fa-fw fa-sort'></th>
				<th>Status<i class='fa fa-fw fa-sort'></th>
				<th>Comment</th>
				<th>Action</th>
				
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
				<input type="text" placeholder="Add a comment" required name="comment_section"
				value= "<?php echo $st['comments'];?>" style="width:100%; border-style:hidden"><input style="color:green; border-style:hidden; background-color:white;" type="submit" value="Add">&nbsp &nbsp <a href="admin_comment_remove.php?id=<?php echo $st['admin_id']; ?>">Remove</a>
				</form>
				
				</td>
				<td>
					<!-- <a href="instructors_edit_form.php?InstructorId=<?php echo $st['instructor_id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> -->
                  <a href="admin_status_change.php?id=<?php echo $st['admin_id']; ?>" onclick="return confirm('Chaning status to Inactive. If the status is alredy Inactive, it will not change. User will have no access to the website content Are you sure you want to proceed?')"><span class="glyphicon glyphicon-remove" style="color:red"></span></a> &nbsp &nbsp <a onclick="return confirm('Chaning status to Active. If the status is alredy Active, it will not change. User will haev access to teh contents of the website. Are you sure you want to proceed?')" href="admin_status_change.php?other_id=<?php echo $st['admin_id']; ?>"><span class="glyphicon glyphicon-ok" style="color:green"></span></a>
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