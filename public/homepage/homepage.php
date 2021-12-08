<?php
session_start();
if(!isset($_SESSION['login']))
{
	header("LOCATION:../../index.php");
}
include "../../private/header.php";
include"../../private/db.php" 
?>

<!DOCTYPE html>
<html lang="en">

<head>
<body>

  <main id="main" class="main">

    <div class="pagetitle">
      
      <nav>
        <ol class="breadcrumb">
		
		<?php
			$sql = "Select * from students";
			$result = mysqli_query($conn, $sql);
			$count=mysqli_num_rows($result);
			
			$sql1 = "Select * from instructors";
			$result1 = mysqli_query($conn, $sql1);
			$count1=mysqli_num_rows($result1);
			
			$sql3 = "Select * from admin_users";
			$result3 = mysqli_query($conn, $sql3);
			$count3=mysqli_num_rows($result3);
			?>
			
			 

		
          <p>HOMEPAGE</p>
		  
          <li class="breadcrumb-item active"></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>
				
				
				
				 <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Summary <span></span></h5>

                  <table class="table table-borderless datatable">
                   
                    <tbody>
                      <tr>
                        <th scope="row">Total Students</th>
                        <td><?php echo $count; ?></td>                
                      </tr>
					   <tr>
                        <th scope="row">Total Instructors</th>
                        <td><?php echo $count1; ?></td>                
                      </tr>
					   <tr>
                        <th scope="row">Total Admin Users</th>
                        <td><?php echo $count3; ?></td>                
                      </tr>
					  
					  
					  
					   <tr>
                        <th scope="row">Total Placements</th> <!-- STATIC --> 
                       
					   <td>
						<?php
								$placements = "Select * from placements where status=1";
								$eplacements = mysqli_query($conn, $placements);
								$count4=mysqli_num_rows($eplacements);
								echo $count4;
						?>
					   </td>                
                      </tr>
					   <tr>
                        <th scope="row">Students not placed</th>
                        <td>
						<?php 
							$notplaced = "Select * from placements where status=0";
							$enotplaced = mysqli_query($conn, $notplaced);
							$count5=mysqli_num_rows($enotplaced);
							echo $count5;
						?>
						</td>                
                      </tr>
					   <tr>
                        <th scope="row">Placements On Hold</th>
                        <td>
						<?php
								$onhold = "Select * from placements where status = 3 ";
								$eonhold = mysqli_query($conn, $onhold);
								$count6=mysqli_num_rows($eonhold);
								echo $count6;
						?>
						</td>                
                      </tr>
					 
                     
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
				
				
				
				
				
				 <div class="col-12">
              <div class="card recent-sales">

                <div class="filter">
               <a href="#task"style="margin-right:10px;"><span style="color:green; margin-right:10px;" class="glyphicon glyphicon-plus"></span> Add a new task </a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">To Do List <span></span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Task</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
					  <?php
						$com = "SELECT * FROM dashboadr_tasks ORDER BY id DESC";
						$ecom = mysqli_query($conn, $com);
						$rcom = mysqli_fetch_all($ecom, MYSQLI_ASSOC);
						foreach($rcom as $rcc)
						{
					  ?>
                      <tr>
					  
					  
                    
                        <td>
						<?php echo $rcc['note']; ?>	
						</td>
						
						
						
                        <td><a href="../public/dashboard/remove_note.php?id=<?php echo $rcc['id']; ?>"><span class="glyphicon glyphicon-remove" style="color:red;"></span></a></td>                       
                      </tr>
                     <?php
						}
						?>
					 
                     
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales -->
				
				
				

                <div class="card-body" id="task">
                  <h5 class="card-title">Add a note</h5>
				  <form action="../public/dashboard/note.php" method="post">
					<input type="text" name="note" placeholder = "Enter a new note" style="width: 80%; border-style:hidden;" >
					<input type="submit" value="Add">
				  </form>

        
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

           

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Recent Activities <span></span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">28/10</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                   Added Jack as a new student
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">28/10</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    Added new instructor
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">27/10</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    Deleted a Record
                  </div>
                </div><!-- End activity item-->

               
              </div>

            </div>
          </div><!-- End Recent Activity -->

   




          <!-- News & Updates Traffic -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Create a new notification <span></span></h5>

              <div class="news">
                <div class="post-item clearfix">
                  <h4><a href="#">Create a notice for HOMEPAGE users</a></h4>
                  <p>The notice will be visible to all the visitos of the website.</p>
                </div>

                <div class="post-item clearfix">
                  <h4><a href="#">Create a notice for STUDENTS</a></h4>
                  <p>This notice will be visible to the registered students.</p>
                </div>

                <div class="post-item clearfix">
         
                  <h4><a href="#">Create a notice for INSTRUCTORS</a></h4>
                  <p>This notice will be visible to the registered instructors.</p>
                </div>

              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>