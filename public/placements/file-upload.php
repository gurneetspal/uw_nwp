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
//echo $name=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
echo $id=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
	echo $Last_Name=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
echo $First_Name=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
echo $Uwindsor_Email=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
echo $HOME_Address_1=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
echo $HOME_City=$worksheet->getCellByColumnAndRow(5,$row)->getValue();
echo $HOME_Province_descr=$worksheet->getCellByColumnAndRow(6,$row)->getValue();
echo $HOME_Postal_Code=$worksheet->getCellByColumnAndRow(7,$row)->getValue();
echo $ca =date("Y/m/d");
echo $up =date("Y/m/d"); 
		echo '<br>';

		if($Uwindsor_Email!='')
		{
			$insertqry="INSERT INTO `students`(`student_number`,`first_name`,`last_name`,`uwin_email`,`home_address`,`home_city`,`prov_id`,`home_postal_code`,`created_at`,`updated_at`) VALUES ('$id','$First_Name','$Last_Name','$Uwindsor_Email','$HOME_Address_1','$HOME_City','$HOME_Province_descr','$HOME_Postal_Code','$ca','$up')";
			$insertres=mysqli_query($conn,$insertqry);
		}
	}
}
$_SESSION['status'] = "Students added successfully";
header('Location: auto_place.php');
?>