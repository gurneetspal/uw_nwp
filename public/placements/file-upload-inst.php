<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
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
		echo  $Last_name=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
		echo  $First_name=$worksheet->getCellByColumnAndRow(1,$row)->getValue();

echo  $Employee_Number=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
echo  $Home_Address=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
echo  $City_prov=$worksheet->getCellByColumnAndRow(5,$row)->getValue();
//echo  $prov_id=$worksheet->getCellByColumnAndRow(5,$row)->getValue();
echo  $Postal_Code=$worksheet->getCellByColumnAndRow(6,$row)->getValue();
echo  $Phone=$worksheet->getCellByColumnAndRow(7,$row)->getValue();
echo  $Email=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
echo  $Gender=$worksheet->getCellByColumnAndRow(9,$row)->getValue();
echo  $Highest_degree_completed=$worksheet->getCellByColumnAndRow(8,$row)->getValue();
echo  $CNO=$worksheet->getCellByColumnAndRow(10,$row)->getValue();
echo  $Health=$worksheet->getCellByColumnAndRow(11,$row)->getValue();
echo  $TBtest=$worksheet->getCellByColumnAndRow(12,$row)->getValue();
echo  $Immunizations=$worksheet->getCellByColumnAndRow(13,$row)->getValue();
echo  $Mask_fit_testing_date=$worksheet->getCellByColumnAndRow(14,$row)->getValue();
echo  $BLS=$worksheet->getCellByColumnAndRow(15,$row)->getValue();
echo  $SMG=$worksheet->getCellByColumnAndRow(16,$row)->getValue();
echo  $Extended_police_clearance=$worksheet->getCellByColumnAndRow(17,$row)->getValue();
echo  $Comments=$worksheet->getCellByColumnAndRow(18,$row)->getValue();

		echo '<br>';

		if($Email!='')
		{
			$insertqry="INSERT INTO `instructors`(`first_name`,
`last_name`,
`employee_num`,
`address`,
`city_prov`,
`postal_code`,
`instructor_phone1`,
`uwin_email`,
`gender`,
`highest_degree_completed`,
`cno`,
`health_status_date`,
`tb_test_date`,
`immunization_submitted`,
`mask_fit_testing_date`,
`bls_cpr_expiry_date`,
`smg_training`,
`extended_police_clearance`,
`comments`) 
VALUES ('$First_name',
'$Last_name',
'$Employee_Number',
'$Home_Address',
'$City_prov',
'$Postal_Code',
'$Phone',
'$Email',
'$Gender',
'$Highest_degree_completed',
'$CNO',
'$Health',
'$TBtest',
'$Immunizations',
'$Mask_fit_testing_date',
'$BLS',
'$SMG',
'$Extended_police_clearance',
'$Comments'
)";
			$insertres=mysqli_query($conn,$insertqry);
		}
	}
}
$_SESSION['status'] = "Instructors added successfully";
header('Location: auto_place.php');
?>