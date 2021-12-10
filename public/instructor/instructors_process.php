<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/db.php";

if (isset($_POST['submitInstructor'])) 
  {
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
    $city_prov=$city.','.$province;

    $sql = "INSERT INTO instructors 
      (
      first_name,
      last_name,
      uwin_email, 
      address, 
      city_prov,
      postal_code,
      instructor_phone1,
      instructor_ext1,
      phone_type1, 
      instructor_phone2,
      phone_type2, 
      gender
      ,employee_num 
     ,highest_degree_completed
     ,cno
     ,health_status_date
     ,tb_test_date
     ,immunization_submitted
     ,mask_fit_testing_date
     ,bls_cpr_expiry_date
     ,smg_training
     ,extended_police_clearance
     ,comments
     ,created_at
      )
      VALUES 
      (
      '$f_name',
      '$l_name',
      '$u_email',
      '$h_address',
      '$city_prov',
      '$p_code',
      '$phone1',
      '$phone1_ext',
      '$phone1_type',
      '$phone2',
      '$phone2_type',
      '$gender',
      '$employee_num',
     '$highest_degree_completed',
     '$cno',
     '$health_status_date',
     '$tb_test_date',
     '$immunization_submitted',
     '$mask_fit_testing_date',
     '$bls_cpr_expiry_date',
     '$smg_training',
     '$extended_police_clearance',
     '$comments',
     '$created_at'
 
      )";
              
            if(mysqli_query($conn, $sql)){
              $_SESSION['message']="1 Instructor added successfully.";		  
              header("Location:instructor.php");//redirection after inserting the value 
                      // Close connection
            } else{
                echo "ERROR: Hush! Sorry $sql. " 
                    . mysqli_error($conn);
            }
    //       echo $f_name;
    // exit();    
    
            mysqli_close($conn);
          }

if (isset($_GET['DeleteInstructorId'])) {
    $DeleteInstructorId = $_GET['DeleteInstructorId'];
    if($conn->query("delete from instructors where instructor_id='$DeleteInstructorId'")){
      $_SESSION['msg'] = 'Instructor Deleted successfully.';
      echo "<script>window.location.href='instructor.php';</script>";
    }
    //$conn->query("update instructors set status='0' WHERE instructor_id = '$DeleteInstructorId'");
    // exit();
    else{

    }
    
  }





?>