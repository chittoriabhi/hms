<?php 
session_start();

if (!isset($_SESSION['d_email'])) {
    echo "<script>window.open('../user_login.php','_self')</script>";
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

        <h2 class="mb-4">Edit Profile</h2>
        <div class="container-fluid container-fullw bg-white">
	<div class="row">
		<div class="col-md-12">
			<h5 style="color: green; font-size:18px; ">
			</h5>
			<div class="row margin-top-30">
				<div class="col-lg-8 col-md-12">
					<div class="panel panel-white">
						<div class="panel-heading">
							<h5 class="panel-title">Edit Profile</h5>
						</div>
						<div class="panel-body">
							<?php 
							$d_id=$_SESSION['d_id'];
							$sql=mysqli_query($con,"select * from doctors where d_id='$d_id'");
							$row=mysqli_fetch_array($sql);



								$p_name =$row['d_name'];
							
								$p_address=$row['d_address'];
								$p_contact=$row['d_contact'];
								$p_city=$row['d_fees'];
				
								$p_email=$row['d_email'];
								$p_password=$row['d_password'];
								$p_date=$row['d_date'];
								$p_specilization=$row['d_specilization'];

								$sqli=mysqli_query($con,"select d_image from doctor_images where d_id='$d_id'");
							    $rowi=mysqli_fetch_array($sqli);
							    $pimage=$rowi['d_image'];

							 ?>
							<h4><?php echo $p_name ?>'s Profile</h4>
							<p><b>Profile Reg. Date: </b><?php echo $p_date ?></p>
							<hr />
							<form role="form" name="edit" method="post" enctype="multipart/form-data">
								
								<div class="form-group">
									<label for="fname">
									 Name
									</label>
									<input type="text" name="name" class="form-control" value="<?php echo $p_name ?>" >
								</div>
								<div class="form-group">
									<label for="specilization">
										Specialization
									</label>
									<textarea name="specilization" class="form-control"><?php echo $p_specilization ?></textarea>
								</div>
								<div class="form-group">
									<label for="address">
										Address
									</label>
									<textarea name="address" class="form-control"><?php echo $p_address ?></textarea>
								</div>
								<div class="form-group">
									<label for="Contact numaber">
										Contact
									</label>
									<textarea name="contact" class="form-control"><?php echo $p_contact ?></textarea>
								</div>
								<div class="form-group">
									<label for="city">
										Fees
									</label>
									<input type="text" name="fees" class="form-control" required="required"  value="<?php echo $p_city ?>" >
								</div>
								
								
								<div class="form-group">
									<label for="fess">
										User Email
									</label>
									<input type="email" name="email" class="form-control"  readonly="readonly"  value="<?php echo $p_email ?>">
									
								</div>
								<div class="form-group">
								<label >Image</label>
								<input type="file" name="image" class="form-control
								"value="<?php echo $pimage ?>">
								<br>
								<img src="images/<?php echo $pimage; ?>" class="img-responsive" height="100" width="100">
							</div>
								
								
								
								
								<button type="submit" name="submit" class="btn btn-o btn-primary">
								Update
								</button>
							</form>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div class="col-lg-12 col-md-12">
			<div class="panel panel-white">
				
				
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


if (isset($_POST['submit'])) {
$name=$_POST['name'];
$address=$_POST['address'];
$specilization=$_POST['specilization'];
$contact=$_POST['contact'];
$fees=$_POST['fees'];

$email=$_POST['email'];
$image=$_FILES['image']['name'];
$tmp_image=$_FILES['image']['tmp_name'];
$id=$_SESSION['d_id'];
move_uploaded_file($tmp_image, "images/$image");

$sql=mysqli_query($con,"Update doctors set d_name='$name',d_address='$address',d_contact='$contact',d_specilization='$specilization',d_email='$email',d_fees='$fees' where d_id='$id'");
if ($sql) {
	echo "<script>alert('Details Updated')</script>";
}
if (isset($_FILES['image']['name'])) {
	$sqli=mysqli_query($con,"Update  doctor_images set d_image='$image' where d_id='$id'");
	echo "<script>window.open('doctor_dashboard.php','_self')</script>";
}
	
}

 ?>