<?php
include "../../private/db.php";

$trun = "TRUNCATE TABLE temp_placements";
mysqli_query($conn, $trun);


//$sql1 = "Select * from students";
//$result1 = mysqli_query($conn, $sql1);
//$count1=mysqli_num_rows($result1);
///echo $count1;
//$counter = 0;


//while($counter<=$count1)
//{
$ids_array = array();
$hospitalsids = "SELECT placement_id FROM imp_placements";
$result = mysqli_query($conn, $hospitalsids);
while($row = mysqli_fetch_array($result))
{
    $ids_array[] = $row['placement_id'];
}
$id_array_length = count($ids_array);
//STUDENT
$sql = "SELECT * FROM students";
$sqle = mysqli_query($conn, $sql);
$sqlr = mysqli_fetch_all($sqle, MYSQLI_ASSOC);
foreach($sqlr as $sr)
{
	//check if unique
	$tmp_student_number = $sr['student_number'];
	echo $tmp_student = $sr['last_name'];
	echo $tmp_student_f = $sr['first_name'];

//INSTRUCTOR
$sqlin = "SELECT * FROM instructors ORDER BY RAND() LIMIT 1";
$sqlein = mysqli_query($conn, $sqlin);
$sqlrin = mysqli_fetch_all($sqlein, MYSQLI_ASSOC);
foreach($sqlrin as $srin)
{
	$tmp_instructor_id = $srin['instructor_id'];
	echo $tmp_instructor = $srin['last_name'];
}
//////////////////////HOSPITAL
//$selected_id = rand(0,$id_array_length);
shuffle($ids_array);
//while($element = array_pop($ids_array)){
	//echo "To pop:".$element;
$sele =  end($ids_array);
  echo $selected_id = $sele;

				$hospitals = "SELECT * FROM imp_placements where placement_id = ".$selected_id."";
				$ehospitals = mysqli_query($conn, $hospitals);
				//$rhospitals = mysqli_fetch_all($ehospitals, MYSQLI_ASSOC);
				while($row2 = mysqli_fetch_array($ehospitals))
				//foreach($rhospitals as $h)
				{
					$tmp_pid = $row2['placement_id'];
				echo $tmp_hname = $row2['location'];
				echo $tmp_time = $row2['time'];	
				echo $tmp_term = $row2['term'];
				}

	//}			
echo $h_result = $tmp_hname.','.$tmp_time,','.$tmp_term;
$in = "INSERT INTO temp_placements (placement_id, student_number, instructor_id,location,instructor,student_last_name,student_first_name) VALUES ('$tmp_pid','$tmp_student_number','$tmp_instructor_id','$tmp_hname','$tmp_instructor','$tmp_student','$tmp_student_f')";
mysqli_query($conn, $in);
array_pop($ids_array);
}
//$counter++;		
//}			
		
header("LOCATION:autoassign_view.php");

?>