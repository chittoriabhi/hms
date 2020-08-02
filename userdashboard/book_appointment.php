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
		<title>Sidebar 01</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
				<script>
function getdoctor(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'specilizationid='+val,
	success: function(data){
		$("#doctor").html(data);
	}
	});
}
</script>	


<script>
function getfee(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'doctor='+val,
	success: function(data){
		$("#fees").html(data);
	}
	});
}
</script>
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
				<h2 class="mb-4">Appointment Form</h2>
				<div class="container-fluid container-fullw bg-white">
					<div class="row">
						<div class="col-md-12">
							
							<div class="row margin-top-30">
								<div class="col-lg-8 col-md-12">
									<div class="panel panel-white">
										<div class="panel-heading">
											<h5 class="panel-title">Book Appointment</h5>
										</div>
										<div class="panel-body">
											<p style="color:red;">								</p>
											<form role="form" name="book" method="post" >
												
												<div class="form-group">
													<label for="DoctorSpecialization">
														Doctor Specialization
													</label>
													<select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
														<option value="">Select Specialization</option>
														<?php 
															$sql="select * from doctorspecilization ";
															$run_sql=mysqli_query($con,$sql);
															while ($row=mysqli_fetch_array($run_sql)) {
																?> <option value="<?php echo htmlentities($row['specilization']);?>">
																	<?php echo htmlentities($row['specilization']);?></option><?php 
															}

														 ?>
														
													</select>
												</div>
												<div class="form-group">
													<label for="doctor">
														Doctors
													</label>
													<select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
														<option value="">Select Doctor</option>
													</select>
												</div>
												<div class="form-group">
													<label for="consultancyfees">
														Consultancy Fees
													</label>
													<select name="fees" class="form-control" id="fees"  readonly>
														
													</select>
												</div>
												
												<div class="form-group">
													<label for="AppointmentDate">
														Date
													</label>
													<input class="form-control datepicker" name="appdate"  required="required" data-date-format="yyyy-mm-dd">
													
												</div>
												
												<div class="form-group">
													<label for="Appointmenttime">
														
														Time
														
													</label>
													<input class="form-control" name="apptime" id="timepicker1" required="required">eg : 10:00 PM
												</div>
												
												<button type="submit" name="submit" class="btn btn-o btn-primary">
												Submit
												</button>
											</form>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						
					</div>
				</div>
				
				<!-- end: BASIC EXAMPLE -->
			</div>
			<script src="js/jquery.min.js"></script>
			<script src="js/popper.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/main.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
						<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
			<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
			<script>
				jQuery(document).ready(function() {
					Main.init();
					FormElements.init();
				});
				$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			startDate: '-3d'
			});
			</script>
			<script type="text/javascript">
			$('#timepicker1').timepicker();
			</script>
		</body>
	</html>
	<?php
	if (isset($_POST['submit'])) {
		$d_specilization=$_POST['Doctorspecialization'];
		$d_id=$_POST['doctor'];
		$userid=$_SESSION['p_id'];
		$d_fees=$_POST['fees'];
		$appdate=$_POST['appdate'];
		$time=$_POST['apptime'];
		$userstatus=1;
		$d_status=1;
		$query="insert into appointment(d_specilization,d_id,p_id,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$d_specilization','$d_id','$userid','$d_fees','$appdate','$time','$userstatus','$d_status')";
		$run_query=mysqli_query($con,$query);
		if ($run_query) {
			echo "<script>alert('Your appointment successfully booked');</script>";
		}
		
	}


	?>