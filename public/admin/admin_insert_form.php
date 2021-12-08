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
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1><span style="color:grey">Admin Staff / </span>Add details of new Admin</h1>
		<hr>
	</div>
	
	<a href="../admin/admin_list.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a> 
	
	<div class="row" style="background:white; margin-top:20px;">
	<small><p><i>Note:</i> <span style="color:red;">*</span><i> means a required field.</i></p></small>
	</div>
	<div class="row" style="background:white">
		<div class="col-lg-12" >
		  <form action="admin_process.php" method="post" encrypt="multipart/form-data">
                    <div class="row">    
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>First Name</label>
                            <input name="first_name" class="form-control" placeholder="First name of the Admin" style="width:100%;" required>
                           
                        </div>
                        
                        <div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Last Name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last name of the Admin" style="width:100%;" required>
                            
                        </div>
					</div>
					
                        <div class="form-group">
                            <label><span style="color:red;">*</span>Uwin Email</label>
                            <input type="email" name="uwin_email" class="form-control" placeholder="University of Windsor Email id" style="width:30%;" required>
                        </div>
						<div class="row">
						<div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Set a password" style="width:100%;" required>
                        </div>
						<div class="form-group col-lg-3">
                            <label><span style="color:red;">*</span>Re-type password</label>
                            <input type="password" name="pass" class="form-control" placeholder="Re-type password" style="width:100%;" required>
                        </div>
						</div>
						
						
						
						
                        
                        <input type="submit" class="btn btn-primary" name="submitadmin" value="Submit">
            
                    </form>
			
		</div>
	</div>
 
 </main>
	
</body>

</html>