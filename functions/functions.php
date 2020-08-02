<?php 
include("../includes/db.php");

	if(!empty($_POST["specilizationid"])) 
{

 $sql=mysqli_query($con,"select doctorName,id from doctors where d_specilization='".$_POST['specilizationid']."'");?>
 <option selected="selected">Select Doctor </option>
 <?php
 while($row=mysqli_fetch_array($sql))
 	{?>
  <option value="<?php echo htmlentities($row['d_id']); ?>"><?php echo htmlentities($row['d_name']); ?></option>
  <?php
}
}


if(!empty($_POST["doctor"])) 
{

 $sql=mysqli_query($con,"select docFees from doctors where d_id='".$_POST['doctor']."'");
 while($row=mysqli_fetch_array($sql))
 	{?>
 <option value="<?php echo htmlentities($row['d_fees']); ?>"><?php echo htmlentities($row['d_fees']); ?></option>
  <?php
}
}

?>