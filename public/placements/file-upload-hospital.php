<?php
session_start();
include "../../private/db.php";

echo $uploadfile=$_FILES['uploadfile']['tmp_name'];

require '../../private/PHPExcel/Classes/PHPExcel.php';
require_once '../../private/PHPExcel/Classes/PHPExcel/IOFactory.php';

$objExcel=PHPExcel_IOFactory::load($uploadfile);
foreach($objExcel->getWorksheetIterator() as $worksheet)
{
	echo $highestrow=$worksheet->getHighestRow();

	for($row=0;$row<=$highestrow;$row++)
	{
		echo $location=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
		echo $time=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
		echo $term=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
		echo '<br>';

		if($location!='')
		{
			$insertqry="INSERT INTO `imp_placements`( `location`, `time`,`term`) VALUES ('$location','$time','$term')";
			$insertres=mysqli_query($conn,$insertqry);
		}
	}
}
$_SESSION['status'] = "Students added successfully";
header('Location: auto_place.php');
?>