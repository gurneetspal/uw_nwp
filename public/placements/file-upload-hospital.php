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
		echo $name=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
		echo $email=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
		echo $emaile=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
		echo '<br>';

		if($email!='')
		{
			$insertqry="INSERT INTO `excel_hospital`( `hospital_name`, `dept_name`,`unit_name`) VALUES ('$name','$email','$emaile')";
			$insertres=mysqli_query($conn,$insertqry);
		}
	}
}
$_SESSION['status'] = "Students added successfully";
header('Location: auto_place.php');
?>