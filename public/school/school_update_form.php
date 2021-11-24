<?php
include "../../private/header.php";
include "../../private/db.php";
$id = $_GET['id'];
$sql = "SELECT * FROM schools where school_id ='$id'";
$result = mysqli_query($conn, $sql);

$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>

</head>

<body >
 <main id="main" class="main">
	<div class="row">
		<h1>Edit Details</h1>
		<hr>
	</div>
	
	
	<div class="row" style="background:white">
	<a href="school.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
	<small style="margin-top:10px;"><p><i>Note:</i> <span style="color:red;">*</span><i> means a required field.</i></p></small>
	</div>
	<div class="row" style="background:white">
		<div class="col-lg-12" >
        <?php foreach($students as $st) {?>

		  <form action="school_update_insert.php?st_id=<?php echo $st['school_id']?>" method="post" encrypt="multipart/form-data">
          
		  
                        <div class="form-group">
                            <label><span style="color:red;">*</span>School Id : </label>
                            <td><?php echo $st['school_id'];?></td>
                        </div>
		<div class="row">				
                        <div class="form-group col-lg-4">
                            <label><span style="color:red;">*</span>School Name</label>
                            <input  name="school_name" value="<?php echo $st['school_name']; ?>" class="form-control" required >
                        </div>
						
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>School Abbrevation</label>
                            <input name="school_abb" value="<?php echo $st['school_abbreviation']; ?>" class="form-control"  required>
                           
                        </div>
						
		</div>				
                     <div class="row">
                        <div class="form-group col-lg-5">
                            <label><span style="color:red;">*</span>School Address</label>
                            <textarea type="text"  name="school_address" class="form-control"  value="<?php echo $st['school_address']; ?>"></textarea>
                     
                        </div>
					</div>
					
					
					<div class="row">
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>City</label>
                            <input type="text"value="<?php echo $st['school_city']; ?>" name="city" class="form-control" >
                      
                        </div>
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Province</label>

                            <select class="form-control" name="province">
                        <option value="">Select Province</option>
                        <?php
                        $result = mysqli_query($conn,"SELECT * FROM provinces");
                        while($row = mysqli_fetch_array($result)) {
                        $selected=($st['prov_id']==$row['prov_id']?"selected":"");
                        ?>
                        <option value="<?php  echo $row['prov_id'];?>" <?php if($row['prov_id']==$st['prov_id']) echo "selected"?>><?php echo $row["province_name"];?></option>
                        <?php
                     }
                     ?>
                  </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Postal Code</label>
                            <input type="text" value="<?php echo $st['school_postal_code']; ?>" name="postalcode" class="form-control"  required>
                            
                        </div>
				</div>		
                        <?php } ?>

                        </div>
                        <div class="row">
							<div class="col-lg-2">
							 <input type="submit" class="btn btn-primary" value="Submit">
							</div>
						</div>
                       
                    </form>
			
		</div>
	</div>
 
 </main>
	
</body>

</html>