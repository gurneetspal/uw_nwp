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
		<h1>Insert details for new school</h1>
	</div>
	
	
	<div class="row" style="background:white">
	<a href="school.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
	<small style="margin-top:10px" ><p><i>Note:</i> <span style="color:red;">*</span><i> means a required field.</i></p></small>
	</div>
	<div class="row" style="background:white">
		<div class="col-lg-12" >
		  <form action="school_insert_db.php" method="post" encrypt="multipart/form-data">
		  
					<div class="row">
                        <div class="form-group col-lg-6">
                            <label><span style="color:red;">*</span>School Name</label>
                            <input  name="school_name" class="form-control" required placeholder="Enter the school name.." required>
                        </div>
					
					
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>School Abbrevation</label>
                            <input name="school_abb" class="form-control" placeholder="School abbrivaion should be unique" required>
                           
                        </div>
					</div>	
                     
					 
					 <div class="row">
                        <div class="form-group col-lg-4">
                            <label><span style="color:red;">*</span>School Address</label>
                            <textarea type="text" name="school_address" class="form-control" placeholder="Should not be more than 50 words" required></textarea>
                     
                        </div>
                        <div class="form-group col-lg-2">
                            <label><span style="color:red;">*</span>City</label>
                            <input type="text" name="city" class="form-control" placeholder="Enter city name" required>
                      
                        </div>
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Province</label>

                            <!-- <input type="text" name="province" class="form-control" placeholder="Enter province" required> -->
                            <select class="form-control" name="province">
                        <option value="">Select Province</option>
                        <?php
                        require_once "../../private/db.php";
                        $result = mysqli_query($conn,"SELECT * FROM provinces");
                        while($row = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $row['province_name'];?>"><?php echo $row["province_name"];?></option>
                        <?php
                     }
                     ?>
                  </select>
                        </div>
					</div>
<div class="row">					
                        <div class="col-lg-3">
                            <label><span style="color:red;">*</span>Postal Code</label>
                            <input type="text" name="postalcode" class="form-control" placeholder="Enter postal code" required>
                            
                        </div>
                             
                        </div>
						<div class="col-lg-2">
                        <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
						
                    </form>
			
		</div>
	</div>
 
 </main>
	
</body>

</html>