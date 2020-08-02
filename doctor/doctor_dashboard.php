<?php 
session_start();

if (!isset($_SESSION['d_email'])) {
  echo "<script>window.open('doctor_login.php','_self')</script>";
    
}else{
  include("../includes/db.php");
  $id=$_SESSION['d_id'];
  $sql=mysqli_query($con,"select d_image from doctor_images where d_id='$id' ");
  $row=mysqli_fetch_array($sql);
  $image=$row['d_image'];
}

 ?>


<!doctype html>
<html lang="en">
  <head>
  	<title>User Panel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/<?php echo $image ?>);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="doctor_dashboard.php"  aria-expanded="false" ><?php echo $_SESSION['d_name']; ?></a>
	          </li>
            <li>
              <a href="doctor_appointment.php">Appointments</a>
            </li>
	          
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Patients</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="../patient_registeration.php">Add Patient</a>
                </li>
                
                <li>
                    <a href="manage_patients.php">Manage Patient</a>
                </li>
              </ul>
	          </li>
	          
	         <li>
                <a href="search.php">
                  <div class="item-content">
                    <div class="item-media">
                      <i class="ti-search"></i>
                    </div>
                    <div class="item-inner">
                      <span class="title"> Search </span>
                    </div>
                  </div>
                </a>
              </li>
	        </ul>

	        

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Welcome <?php echo $_SESSION['d_email'] ?></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>

        <h2 class="mb-4">Doctor's Dashboard</h2>
        <div class="container-fluid container-fullw bg-white">
              <div class="row">
                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
                      <h2 class="StepTitle">My Profile</h2>
                      
                      <p class="links cl-effect-1">
                        <a href="update_doctor.php">
                          Update Profile
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="panel panel-white no-radius text-center">
                    <div class="panel-body">
                      <span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
                      <h2 class="StepTitle">My Appointments</h2>
                    
                      <p class="cl-effect-1">
                        <a href="doctor_appointment.php">
                          View Appointment History
                        </a>
                      </p>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
        
      </div>

		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php 










 ?>