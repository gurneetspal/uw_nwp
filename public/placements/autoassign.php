<?php
include "../../private/db.php";

$trun = "TRUNCATE TABLE tmp_placements";
mysqli_query($conn, $trun);


$sql1 = "Select * from excel_student";
$result1 = mysqli_query($conn, $sql1);
$count1=mysqli_num_rows($result1);
echo $count1;
$counter = 0;


//while($counter<=$count1)
//{

//STUDENT
$sql = "SELECT * FROM excel_student";
$sqle = mysqli_query($conn, $sql);
$sqlr = mysqli_fetch_all($sqle, MYSQLI_ASSOC);
foreach($sqlr as $sr)
{
	//check if unique
	
	
			echo $tmp_student = $sr['name'];
			$counter++;
		
	
//}
//INSTRUCTOR
$sqlin = "SELECT * FROM excel_instructor ORDER BY RAND() LIMIT 1";
$sqlein = mysqli_query($conn, $sqlin);
$sqlrin = mysqli_fetch_all($sqlein, MYSQLI_ASSOC);
foreach($sqlrin as $srin)
{
	echo $tmp_instructor = $srin['name'];
}
//HOSPITAL
				$hospitals = "SELECT * FROM excel_hospital ORDER BY RAND() LIMIT 1";
				$ehospitals = mysqli_query($conn, $hospitals);
				$rhospitals = mysqli_fetch_all($ehospitals, MYSQLI_ASSOC);
				foreach($rhospitals as $h)
				{
				echo $tmp_hname = $h['hospital_name'];
						$dept = explode(",", $h['dept_name']);
						$value_count = count($dept);
						
					
					for($x = 0; $x < $value_count; $x++)
					{
					
						 echo $tmp_dname = $dept[$x];
					
					}
					
					
				
						$unit = explode(",", $h['unit_name']);
						$value_count1 = count($unit);
					
					for($xz = 0; $xz < $value_count1; $xz++)
					{					
					echo $tmp_uname = $unit[$xz]; 
					
							}		
				}
				
echo $h_result = $tmp_hname.','.$tmp_dname.','.$tmp_uname;
$in = "INSERT INTO tmp_placements (student, instructor, hospital) VALUES ('$tmp_student','$tmp_instructor','$h_result')";
mysqli_query($conn, $in);

//$counter++;		
}			
		
header("LOCATION:autoassign_view.php");

?>