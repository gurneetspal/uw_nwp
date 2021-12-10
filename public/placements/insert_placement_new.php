<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script  type="text/javascript">
debugger;
let dropdown = $('#locality-dropdown');

dropdown.empty();

dropdown.append('<option selected="true" disabled>Choose State/Province</option>');
dropdown.prop('selectedIndex', 0);

// const url = 'https://api.myjson.com/bins/7xq2x';

// // Populate dropdown with list of provinces
// $.getJSON(url, function (data) {
//   $.each(data, function (key, entry) {
//     dropdown.append($('<option></option>').attr('value', entry.abbreviation).text(entry.name));
//   })
// });


</script>
</head>

<body >
 <main id="main" class="main">
	<div class="row">
		<h1>Insert details for new placements</h1>
	</div>
	
	
	<div class="row" style="background:white">
	<a href="viewMasterPlacements.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
	<small style="margin-top:10px" ><p><i>Note:</i> <span style="color:red;">*</span><i> means a required field.</i></p></small>
	</div>
	<div class="row" style="background:white">
		<div class="col-lg-12" >
		  <form action="new_placement_db.php" method="post" encrypt="multipart/form-data">
		  
					<div class="row">
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Location</label>
                            <input  name="location" class="form-control" required placeholder="Enter the location.." required>
                        </div>
					</div>
					<div class="row">
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Timings</label>
                            <input name="timings" type="text" class="form-control" placeholder="Eg.(2:00 - 7:00 M/W/F)" required>
                           
                        </div>
					</div>	
                 
					 
					 <div class="row">
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Term</label>
                            <input type="text" name="term" class="form-control" placeholder="Enter the term name.." required>
                     
                        </div>
                     </div>
						<div class="row">
						<div class="col-lg-2">
                        <input type="submit" onclick="return(confirm('Are you sure you want to submit?'))" class="btn btn-primary" value="Submit">
                        </div>
						</div>
						   </div> 
						
                    </form>
			
		</div>
	</div>
 
 </main>
	
</body>

</html>