<?php
include('../includes/db.php');
if(isset($_POST['specilizationid'])) 
{
	$d_specilization=$_POST['specilizationid'];
	$sql="select d_name,d_id from doctors where d_specilization ='$d_specilization' ";
 $run_sql=mysqli_query($con,$sql);?>
 <option selected="selected">Select Doctor </option>
 <?php
 while($row=mysqli_fetch_array($run_sql))
 	{?>
  <option value="<?php echo ($row['d_id']); ?>"><?php echo ($row['d_name']); ?></option>
  <?php
}
}

if(isset($_POST['doctor'])) 
{
	$d_id=$_POST['doctor'];
	$sql="select d_fees from doctors where d_id='$d_id' ";
 $run_sql=mysqli_query($con,$sql);?>
 <?php
 while($row=mysqli_fetch_array($run_sql))
 	{?>
  <option value="<?php echo htmlentities($row['d_fees']); ?>"><?php echo htmlentities($row['d_fees']); ?></option>
  <?php
}
}


?>

