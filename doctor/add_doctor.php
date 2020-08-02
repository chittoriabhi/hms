<?php 

include("../includes/db.php");
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Doctor</title>
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-login {
		color: #636363;
		width: 350px;
	}
	.modal-login .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-login .modal-header {
		border-bottom: none;
		position: relative;
		justify-content: center;
	}
	.modal-login h4 {
		text-align: center;
		font-size: 26px;
	}
	.modal-login  .form-group {
		position: relative;
	}
	.modal-login i {
		position: absolute;
		left: 13px;
		top: 11px;
		font-size: 18px;
	}
	.modal-login .form-control {
		padding-left: 40px;
	}
	.modal-login .form-control:focus {
		border-color: #00ce81;
	}
	.modal-login .form-control, .modal-login .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-login .hint-text {
		text-align: center;
		padding-top: 10px;
	}
	.modal-login .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}
	.modal-login .btn {
		background: #00ce81;
		border: none;
		line-height: normal;
	}
	.modal-login .btn:hover, .modal-login .btn:focus {
		background: #00bf78;
	}
	.modal-login .modal-footer {
		background: #ecf0f1;
		border-color: #dee4e7;
		text-align: center;
		margin: 0 -20px -20px;
		border-radius: 5px;
		font-size: 13px;
		justify-content: center;
	}
	.modal-login .modal-footer a {
		color: #999;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
	.box{
    background: rgba(255, 255, 255, 0.2);
    margin: 0 0 30px;
    border: solid 1px #e6e6e6;
    padding: 20px;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
    
}
#left{
	text-align: center;
}
	body{
		background-image: url("../img/bg-banner.jpg");
	}
</style>
</head>
<body>
	
	
<div class="container col-md-12">
	

<div  id="left">
<a href="#mModal" class="trigger-btn btn btn-primary" data-toggle="modal">Click here to Register </a> </div>


</div>


<!-- register modal -->
<div id="mModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">ADD DOCTOR</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="add_doctor.php" method="post">
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" class="form-control" placeholder="Full Name" required="required" name="p_name">
					</div>
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" class="form-control" placeholder="Specilization" required="required" name="p_specilization">
					</div>
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" class="form-control" placeholder="Address" required="required" name="p_address">
					</div>		
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" class="form-control" placeholder="Contact" required="required" name="p_contact">
					</div>
						<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" class="form-control" placeholder="fee" required="required" name="p_fee">
					</div>
					<div class="form-group">
								<label class="block">
									Gender
								</label>
								<div class="clip-radio radio-primary">
									<input type="radio" id="rg-female" name="p_gender" value="female" >
									<label for="rg-female">
										Female
									</label>
									<input type="radio" id="rg-male" name="p_gender" value="male">
									<label for="rg-male">
										Male
									</label>
								</div>
							</div>
							<p>
								Enter account details below:
							</p>
						<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" class="form-control" placeholder="Email" required="required" name="p_email">					
					</div>														
					<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" class="form-control" placeholder="Password" required="required" name="p_password">					
					</div>
					<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" class="form-control" placeholder="Confirm Password" required="required" name="p_c_password">					
					</div>
										
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Register" name="submit">
					</div>
				</form>				
				
			</div>
			<div class="modal-footer">
				<a href="#">Thanks </a>
			</div>
		</div>
	</div>
</div>     
</body>
</html>    

<?php 
if (isset($_POST['submit'])) {
	
	$p_name=$_POST['p_name'];
	$p_specilization=$_POST['p_specilization'];
	$p_email=$_POST['p_email'];
	$p_password=$_POST['p_password'];
	$p_c_password=$_POST['p_c_password'];
	$p_gender=$_POST['p_gender'];
	$p_fee=$_POST['p_fee'];
	$p_contact=$_POST['p_contact'];
	$p_address=$_POST['p_address'];
  
	if($p_c_password==$p_password){
		

		$insert_doctor="insert into doctors(d_specilization,d_name,d_address,d_contact,d_fees,d_gender,d_email,d_password) values('$p_specilization','$p_name','$p_address','$p_contact','$p_fee','$p_gender','$p_email','$p_password') ";
		$run_patient=mysqli_query($con,$insert_doctor);
		$fetch_id=mysqli_query($con,"select d_id from doctors where d_email='$p_email' ");
		$fetch=mysqli_fetch_array($fetch_id);
		$pid=$fetch['d_id'];
		$p_image="logo.jpg";
		$inset_image=mysqli_query($con,"insert into doctor_images (d_id,d_image) values('$pid','$p_image')");
		echo "<script>alert('Registerd')</script>";
	}else{
		echo "<script>alert('Password didnt match')</script>";
		echo "<script>window.open('add_doctor.php','_self')</script>";
	}
	
}






 ?>                        