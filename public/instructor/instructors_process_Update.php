<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";

  if (isset($_GET['UpdateInstructorId'])) {
    $UpdateInstructorId = $_GET['UpdateInstructorId'];

  $f_name = $_POST['first_name'];
$l_name = $_POST['last_name'];
$u_email = $_POST['uwin_email'];
$h_address = $_POST['home_address'];
$city = $_POST['city'];
$province = $_POST['province'];
$p_code = $_POST['postalcode'];
$phone1 = $_POST['phone1'];
$phone1_type = $_POST['phone1_type'];
$phone1_ext = $_POST['phone1_ext'];
$phone2 = $_POST['phone2'];
$phone2_type = $_POST['phone2_type'];
$gender = $_POST['gender'];
$employee_num =$_POST['employee_number'];
$highest_degree_completed=$_POST['Degree'];
$cno=$_POST['Cno'];
$health_status_date=$_POST['Health_status_dt'];
$tb_test_date=$_POST['tb_Test_dt'];
$immunization_submitted=$_POST['immunization'];
$mask_fit_testing_date=$_POST['mask_testing_dt'];
$bls_cpr_expiry_date=$_POST['bls_dt'];
$smg_training=$_POST['smg_dt'];
$extended_police_clearance=$_POST['police'];
$comments=$_POST['comment'];
$created_at=date("Y/m/d");





    $sql="UPDATE instructors SET 
    first_name='$f_name',
      last_name='$l_name',
      uwin_email='$u_email',
      address='$h_address',
      city='$city',
      prov_id='$province',
      postal_code='$p_code',
      instructor_phone1='$phone1',
      instructor_ext1='$phone1_ext',
      phone_type1 ='$phone1_type',
      instructor_phone2='$phone2',
      phone_type2='$phone2_type',
      gender='$gender',
      employee_num ='$employee_num',
      highest_degree_completed='$highest_degree_completed',
      cno='$cno',
      health_status_date='$health_status_date',
      tb_test_date='$tb_test_date',
      immunization_submitted='$immunization_submitted',
      mask_fit_testing_date='$mask_fit_testing_date',
      bls_cpr_expiry_date='$bls_cpr_expiry_date',
      smg_training='$smg_training',
      extended_police_clearance='$extended_police_clearance',
      comments='$comments',
      updated_at='$created_at' WHERE instructor_id = '$UpdateInstructorId'";

if(mysqli_query($conn, $sql)){
            
} else{
    echo "ERROR: Hush! Sorry $sql. " 
        . mysqli_error($conn);
}
  
    // exit();
    $_SESSION['msg'] = 'Instructor updated successfully.';
    echo "<script>window.location.href='instructor.php';</script>";
  }

?>