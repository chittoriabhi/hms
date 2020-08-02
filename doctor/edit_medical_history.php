<?php 
session_start();

if (!isset($_SESSION['d_email'])) {
  echo "<script>window.open('doctor_login.php','_self')</script>";
    
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

        <h2 class="mb-4">Edit Medical History</h2>
        <div class="container-fluid container-fullw bg-white">
          <form method="post" action="edit_medical_history.php">
            <?php 
              $pa_id=$_GET['id'];
            

              
              $sql=mysqli_query($con,"select * from pmedicalhis where p_id='$pa_id'");
              $row=mysqli_fetch_array($sql);



                $p_contact =$row['p_contact'];
              
                $p_diagnose=$row['p_diagnose'];
                $p_laboratory=$row['p_laboratory'];
                $p_weight=$row['p_weight'];
        
                $p_temprature=$row['p_temprature'];
                $p_bloodgroup=$row['p_bloodgroup'];
                  

               ?>
               <div class="form-group">
             ID: <input type = "text" name = "di" class="form-control" value="<?php echo $pa_id ?>" readonly />
             </div><br>
            <div class="form-group">
             Contact Number: <input type = "text" name = "p_contact" class="form-control" value="<?php echo $p_contact ?>" />
             </div>
             <br>
             <div class="form-group">
               <label>Diagnose</label>    : <input type = "text" name = "p_diagnose" class="form-control" value="<?php echo $p_diagnose ?>" /></div>
             <br>
             <div class="form-group">
              <label>Laboratory</label>    : <input type = "text" name = "p_laboratory" class="form-control" value="<?php echo $p_laboratory ?>"/></div>
             <br>
             <div class="form-group">
                  <label>Weight</label>    : <input type = "text" name = "p_weight" class="form-control" value="<?php echo $p_weight ?>"/></div>
             <br>
             <div class="form-group">
             <label>Temprature</label>     : <input type = "text" name = "p_temprature" class="form-control" value="<?php echo $p_temprature ?>"/></div>
             <br>
             <div class="form-group">
              <label>Blood Group</label>   : <input type = "text" name = "p_bloodgroup" class="form-control" value="<?php echo $p_bloodgroup ?>"/></div>
             <br>
             <button type="submit" name="submit" class="btn btn-o btn-primary">Submit
                </button>
           </form>
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
 
  $p_contact=$_POST['p_contact'];
    $p_id=$_POST['di'];

    $p_diagnose=$_POST['p_diagnose'];
    $p_laboratory=$_POST['p_laboratory'];
    $p_weight=$_POST['p_weight'];
    $p_temprature=$_POST['p_temprature'];
    $p_bloodgroup=$_POST['p_bloodgroup'];
    $query=mysqli_query($con,"select * from pmedicalhis where p_id='$id' ");
    if ($query) {
 $sql="UPDATE pmedicalhis SET p_diagnose='$p_diagnose',p_contact='$p_contact', p_laboratory='$p_laboratory',p_weight='$p_weight',p_temprature='$p_temprature',p_bloodgroup='$p_bloodgroup' where p_id='$p_id' ";
      $run=mysqli_query($con ,$sql);
      echo "<script>alert('MedicalUpdated')</script>";
      echo "<script>window.open('manage_patients.php','_self')</script>";
      
       } else{
      $create=mysqli_query($con," insert into pmedicalhis(p_id,p_contact,p_diagnose,date,p_laboratory,p_weight,p_temprature,p_bloodgroup) values('$id','$p_contact','$p_diagnose',NOW(),'$p_laboratory','$p_weight','$p_temprature','$p_bloodgroup')");
      echo "<script>alert('Medical Created')</script>";
      echo "<script>window.open('manage_patients.php','_self')</script>";
    }
    
  
    
}

 ?>
 
    
    
     
     
     
  