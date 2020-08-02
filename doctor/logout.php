<?php 
include("../includes/db.php");
session_start();
$status=0;
$id=$_SESSION['d_id'];
$insert=mysqli_query($con,"update doctorslog set logout=NOW(),status='$status' where uid='$id'");
session_destroy();
echo "<script>alert('You are Logged out')</script>";
echo "<script>window.open('../index.php','_self')</script>";
 ?>