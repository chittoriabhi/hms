<?php 
session_start();

include("includes/db.php");
include("functions/user_log.php");

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Patient Login</title>
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
		background-image: url("img/bg-banner.jpg");
	}
</style>
</head>
<body>
	
	<div class="container">
		<div class="box">
			<div class="text-center col-md-6 disp">
	<!-- Button HTML (to Trigger Modal) -->
				<a href="#myModal" class="trigger-btn btn btn-primary" data-toggle="modal">Click here to login </a>
			</div>
		<div class="container">
			<div class="text-center col-md-6 disp"> 

				<?php include("patient_registeration.php") ?>
			</div>
		</div></div> </div>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
	<div class="modal-dialog modal-login">
		<div class="modal-content">
			<div class="modal-header">				
				<h4 class="modal-title">Patient Login</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form action="user_login.php" method="post">
					<div class="form-group">
						<i class="fa fa-user"></i>
						<input type="text" class="form-control" placeholder="Username" required="required" name="p_username">
					</div>
					<div class="form-group">
						<i class="fa fa-lock"></i>
						<input type="password" class="form-control" placeholder="Password" required="required" name="p_password">					
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
	$p_user=$_POST['p_username'];
	$p_pass=$_POST['p_password'];
	$p_query="select * from patients where p_username='$p_user' AND p_password='$p_pass' ";
	$p_run=mysqli_query($con,$p_query);
	$p_row=mysqli_num_rows($p_run);
	if ($p_row==1) {
		$prow=mysqli_fetch_array($p_run);
		$e=$prow['p_email'];
		$_SESSION['p_email']=$prow['p_email'];
		$_SESSION['p_contact']=$prow['p_contact'];
		$_SESSION['p_name']=$prow['p_name'];
		$_SESSION['p_username']=$prow['p_username'];
		$u=$prow['p_username'];
		$_SESSION['p_id']=$prow['p_id'];
		$id=$prow['p_id'];
		$ip=getUserIP();
		$status=1;
		$insert=mysqli_query($con,"insert into userlog (uid,username,useremail,userip,loginTime,status) values('$id','$u','$e','$ip',NOW(),'$status')");



		echo "<script> alert('you are logged in')</script>";
		echo "<script>window.open('userdashboard/user_dashboard.php','_self')</script>";
	}else{
		echo "<script> alert('Invalid Ascess')</script>";
		echo "<script>window.open('user_login.php','_self')</script>";


	}



	
}






 ?>                        
