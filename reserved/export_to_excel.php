<?php
include "db.php";


if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if($id=="student"){
$filename = "Registrar_".date("Y/m/d:hh:ss").".xls"; // File Name
// Download file
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");
header("Pragma: no-cache");

// Write data to file
$flag = false;
$sql = "SELECT student_number,first_name,last_name,uwin_email,home_address,home_city,province_name,home_postal_code FROM students s
inner join provinces p on p.prov_id=s.prov_id";
$result_data = $conn->query($sql);
$results=array();

while ($row = mysqli_fetch_assoc($result_data)){ 
    if (!$flag) {
        // display field/column names as first row
        echo implode("\t", array_keys($row)) . "\r\n";
        $flag = true;
    }
    echo implode("\t", array_values($row)) . "\r\n";
}
}

if($id=="instructor"){
    $filename = "instructor_".date("Y/m/d:hh:ss").".xls"; // File Name
    // Download file
    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");
    header("Pragma: no-cache");
    
    // Write data to file
    $flag = false;
    $sql = "SELECT `first_name`, `last_name`, `employee_num`, `address`, `city`, `province_name`, `postal_code`, `instructor_phone1`, `instructor_ext1`, `phone_type1`, `instructor_phone2`, `instructor_ext2`, `phone_type2`, `uwin_email`, `other_email`, `gender`, `highest_degree_completed`, `cno`, `health_status_date`, `tb_test_date`,CASE WHEN immunization_submitted=0 THEN 'Yes' ELSE 'No' END as 'immunization_submitted', `mask_fit_testing_date`, `bls_cpr_expiry_date`, `smg_training`, CASE WHEN extended_police_clearance=0 THEN 'Yes' ELSE 'No' END as `extended_police_clearance`, `comments` FROM instructors s
    inner join provinces p on p.prov_id=s.prov_id";
    $result_data = $conn->query($sql);
    $results=array();
    
    while ($row = mysqli_fetch_assoc($result_data)){ 
        if (!$flag) {
            // display field/column names as first row
            echo implode("\t", array_keys($row)) . "\r\n";
            $flag = true;
        }
        echo implode("\t", array_values($row)) . "\r\n";
    }
    }
?>