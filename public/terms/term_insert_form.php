<?php
include "../../private/header.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>

<body>
 <main id="main" class="main">
	<div class="row">
		<h1>Insert details of new Term</h1>
		<hr>
	</div>
	
	
	<div class="row" style="background:white">
	<a href="term.php" class=""><span class="glyphicon glyphicon-arrow-left"></span> &nbsp Back</a>
	<small style="margin-top:10px;"><p><i>Note:</i> <span style="color:red;">*</span><i>it means a required field.</i></p></small>
	</div>
	<div class="row" style="background:white">
		<div class="col-lg-12" >
		  <form action="term_insert_db.php" method="post" encrypt="multipart/form-data">
		  
		  
		  
		  <div class="row">
                        <div class="form-group col-lg-4">
                            <label><span style="color:red;">*</span>Term ID:</label>
                            <input type="number" name="term_id" class="form-control" required placeholder="the term number should be unique.." required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label><span style="color:red;">*</span>Term Name</label>
                            <input name="term_name" class="form-control" placeholder="the name of the term" required>
                        </div>
		</div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <!--<a href="index.php" class="btn btn-secondary ml-2">Cancel</a>-->
                    </form>
			
		</div>
	</div>
 
 </main>
	
</body>

</html>