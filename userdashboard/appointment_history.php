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
if(isset($_GET['cancel']))
{
mysqli_query($con,"update appointment set userStatus='0' where id = '".$_GET['id']."'");
echo "<script>alert('Appointment canceled');</script>";
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
        <h2 class="mb-4">Appointments</h2>
        <div class="table-responsive">
          
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Sr.No</th>
                <th>Doctor Name</th>
                <th>Specialisation</th>
                <th>Consultency Fees</th>
                <th>Appointment Date / Time</th>
                <th>Appointment Creation Date</th>
                <th>Current Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql=mysqli_query($con,"select doctors.d_name as doc_name,appointment.*  from appointment join doctors on doctors.d_id=appointment.d_id where appointment.p_id='".$_SESSION['p_id']."'");
              $c=0;
              while($row=mysqli_fetch_array($sql))
              {$c++;$id=$row['id'];
              
              ?>
              <tr>
                <td class="center"><?php echo $c;?>.</td>
                <td class="hidden-xs"><?php echo $row['doc_name'];?></td>
                <td><?php echo $row['d_specilization'];?></td>
                <td><?php echo $row['consultancyFees'];?></td>
                <td><?php echo $row['appointmentDate'];?> / <?php echo
                  $row['appointmentTime'];?>
                </td>
                <td><?php echo $row['postingDate'];?></td>
                <td>
                  <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))
                  {
                  echo "Active";
                  }
                  if(($row['userStatus']==0) && ($row['doctorStatus']==1))
                  {
                  echo "Cancel by You";
                  }
                  if(($row['userStatus']==1) && ($row['doctorStatus']==0))
                  {
                  echo "Cancel by Doctor";
                  }
                ?></td>
                <td>
                  <div class="visible-md visible-lg hidden-sm hidden-xs">
                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))
                    { ?>
                    <a href="appointment_history.php?id=<?php 
                    echo $row['id']?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')"class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
                    <?php } else {
                    echo "Canceled";
                    } ?>
                  </div>
                </td>
              </tr>
              <?php
              
              }?>
            </tbody>
            
            
            
          </div>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
      </body>
    </html>