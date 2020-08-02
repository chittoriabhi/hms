<?php 
session_start();

if (!isset($_SESSION['p_email'])) {
    echo "<script>window.open('../user_login.php','_self')</script>";
}else{
  include("../includes/db.php");
    $id=$_SESSION['p_id'];
  $sql=mysqli_query($con,"select p_image from patient_images where p_id='$id' ");
  $row=mysqli_fetch_array($sql);
  $image=$row['p_image'];
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
	            <a href="user_dashboard.php"  aria-expanded="false" ><?php echo $_SESSION['p_name']; ?></a>
	          </li>
	          
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">My History</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="appointment_history.php">Appointments</a>
                </li>
                
                <li>
                    <a href="medical_history.php">Medical</a>
                </li>
              </ul>
	          </li>
	          <li>
              <a href="book_appointment.php">Book Appointment</a>
	          </li>
	          <li>
              <a href="#">Contact Doctor</a>
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
                    <a class="nav-link" href="#">Welcome <?php echo $_SESSION['p_email'] ?></a>
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
							$p_id=$_SESSION['p_id'];
							$sql=mysqli_query($con,"select * from patients where p_id='$p_id'");
							$row=mysqli_fetch_array($sql);



								$p_name =$row['p_name'];
							
								$p_address=$row['p_address'];
								$p_contact=$row['p_contact'];
								$p_city=$row['p_city'];
				
								$p_email=$row['p_email'];
								$p_password=$row['p_password'];
								$p_date=$row['p_date'];
								$p_username=$row['p_username'];

								$sqli=mysqli_query($con,"select p_image from patient_images where p_id='$p_id'");
							    $rowi=mysqli_fetch_array($sqli);
							    $pimage=$rowi['p_image'];

							 ?>
							<h4><?php echo $p_name ?>'s Profile</h4>
							<p><b>Profile Reg. Date: </b><?php echo $p_date ?></p>
							<hr />
							<form role="form" name="edit" method="post" enctype="multipart/form-data">
								
								<div class="form-group">
									<label for="fname">
										User Name
									</label>
									<input type="text" name="username" class="form-control" value="<?php echo $p_username ?>" >
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
										City
									</label>
									<input type="text" name="city" class="form-control" required="required"  value="<?php echo $p_city ?>" >
								</div>
								
								
								<div class="form-group">
									<label for="fess">
										User Email
									</label>
									<input type="email" name="email" class="form-control"  readonly="readonly"  value="<?php echo $p_email ?>">
									
								</div>
								<div class="form-group">
								<label > Customer Image</label>
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
$username=$_POST['username'];
$address=$_POST['address'];
$city=$_POST['city'];
$contact=$_POST['contact'];
$email=$_POST['email'];
$image=$_FILES['image']['name'];
$tmp_image=$_FILES['image']['tmp_name'];
$id=$_SESSION['p_id'];
move_uploaded_file($tmp_image, "images/$image");

$sql=mysqli_query($con,"Update patients set p_username='$username',p_address='$address',p_contact='$contact',p_city='$city',p_email='$email' where p_id='$id'");
if ($sql) {
	echo "<script>alert('Details Updated')</script>";
}
if (isset($_FILES['image']['name'])) {
	$sqli=mysqli_query($con,"update  patient_images set p_image='$image' where p_id='$id'");
	echo "<script>window.open('user_dashboard.php','_self')</script>";
}
	
}

 ?>