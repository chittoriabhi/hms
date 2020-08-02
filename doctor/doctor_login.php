<?php 
session_start();

include("../includes/db.php");
include("../functions/user_log.php");
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Doctors Login</title>
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
#but{
	margin-top: 19%;
}
	body{
		background-image: url("../img/bg-banner.jpg");
	}
</style>
</head>
<body>
	
	<div class="container col-md-4"></div>
	<div class="container col-md-4">
		<div class="container col-md-4"></div>
		
			<div class="text-center col-md-6 disp">
	<!-- Button HTML (to Trigger Modal) -->
				<a href="#myModal" class="trigger-btn btn btn-primary" data-toggle="modal">Click here to login </a>
			</div></div>
			
 <!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Doctors Login</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">

				<form action="doctor_login.php" method="post">
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="email" class="form-control" placeholder="Email" required="required" name="d_email">
					</div>
					<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" class="form-control" placeholder="Password" required="required" name="d_password">					
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block btn-lg" value="Login" name="login">
					</div>
				</form>				
				
			</div>
			<div class="modal-footer">
				<a href="#">Forgot Password?</a>
			</div>
		</div>
	</div>
</div>     
</body>
</html>    

<?php 
if (isset($_POST['login'])) {
	$d_email=$_POST['d_email'];
	$d_pass=$_POST['d_password'];
	$d_query="select * from doctors where d_email='$d_email' AND d_password='$d_pass' ";
	$d_run=mysqli_query($con,$d_query);
	$d_row=mysqli_num_rows($d_run);
	if ($d_row==1) {
		$drow=mysqli_fetch_array($d_run);
		$_SESSION['d_email']=$drow['d_email'];
		$e=$drow['d_email'];
		$_SESSION['d_contact']=$drow['d_contact'];
		$_SESSION['d_name']=$drow['d_name'];
		$_SESSION['d_specilization']=$drow['d_specilization'];
		$_SESSION['d_id']=$drow['d_id'];
		$id=$prow['d_id'];
		$ip=getUserIP();
		$status=1;
		$insert=mysqli_query($con,"insert into doctorslog (uid,useremail,userip,loginTime,status) values('$id','$e','$ip',NOW(),'$status')");

		echo "<script> alert('you are logged in')</script>";
		echo "<script>window.open('doctor_dashboard.php','_self')</script>";
		
	}else{
		echo "<script> alert('Invalid Ascess')</script>";
		echo "<script>window.open('doctor_login.php','_self')</script>";


	}



	
}






 ?>                        
