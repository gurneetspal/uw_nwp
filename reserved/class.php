<?php
include "header.php";
include "db.php";

$sql = "SELECT * FROM class_lessons c inner join courses co on co.course_id=c.course_id 
inner join instructors i on i.instructor_id=c.instructor_id 
INNER JOIN placements p on p.placement_id=c.placement_id;";
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
			 document.getElementById('count').innerHTML="No. of Rows : "+$rowCount;
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

</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1>Class Portal</h1>
		<hr>
	</div>
	
	<div class="row" style="background:white"> <!-- NEW STUDENT BUTTON-->
		<div class="col-lg-12" >
			<a href="index.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> &nbsp &nbsp <a href="class_insert_form.php" class="btn btn-primary btn-md active"><span class="glyphicon glyphicon-plus"></span> &nbsp Add a new class</a>
		</div>	
		
		
		<div class="form-group row" style="background:white; margin-top:30px;"> 
		<div class="col-md-6">
		<input type="text" id="myInput" class="form-control col-md-6 " onkeyup="myFunction()" placeholder="Search by Instructor Id, First Name or Last Name...">
		</div>
		<div class="col-md-6 " style="display: flex;justify-content: flex-end;">
		<label class="input-group-text" id="count"></label>
		</div>
			<table id="table1" class="table searchable sortable">
				<?php if(isset($_SESSION['msg'])){
					echo "string";
					exit();
					?>
                      <div class="alert alert-danger"> <i class="mdi mdi-book-multiple"></i><?php echo $_SESSION['msg'];?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                        </div>
                    <?php   unset($_SESSION['msg']);
                   }?>
			  <tr class="item">
				<th class="mt-head"></i>Class Number<i class='fa fa-fw fa-sort'></th>
				<th class="mt-head">Course Id<i class='fa fa-fw fa-sort'></th>
				<th class="mt-head">Class Section<i class='fa fa-fw fa-sort'></th>
				<th class="mt-head">Instructor</th>
				<th class="mt-head" style="width:20%">Placement</th>
				<th class="mt-head">Action</th>

			  </tr>
			  <?php foreach($students as $st) {?>
			  <tr>
				<td>  <?php echo $st['class_number']; ?>  </td>
				<td><?php echo $st['course_title']; ?></td>
				<td><?php echo $st['class_section']; ?></td>
				
				<td><?php echo $st['first_name']; ?> <?php echo $st['last_name']; ?></td>
				<td><?php echo $st['address']; ?></td>

				<td>
				<a href="class_update.php?class_number=<?php echo $st['class_number']; ?>"><span class="glyphicon glyphicon-remove" style="color:red;"></span></a>&nbsp &nbsp
				<a href="class_view.php?class_number=<?php echo $st['class_number'];?>"><span class="glyphicon glyphicon-eye-open" style="color:blue"></</a> &nbsp 
				<a href="class_update_form.php?class_number=<?php echo $st['class_number']; ?>"><span style="color:green" class="glyphicon glyphicon-pencil" style="color:blue"></</a>
				

                                                        </td>
			  </tr>
			  <?php } ?>
			
			</table>
		
		</div>
	</div>
 
 </main>
	
</body>

</html>