
<?php
session_start();
include 'dbconnect.php';


if(isset($_POST['submit']))
{
    
    $service = $_POST['service'];
    $doctor = $_POST['doctor'];
    $detail = $_POST['detail'];

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "img/". $filename;
    move_uploaded_file($tempname,$folder);
 
    $query = "INSERT INTO `services` VALUES ('','$filename','$service','$detail','$doctor')";
    $save = mysqli_query($connect,$query);
    

}
if (isset($_SESSION['user_id'])) {
        
    $name = $_SESSION['user_name'];
    $user_image = $_SESSION['user_image'];
  
  }




?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Service</title>

    <!-- Custom fonts for this template-->
    <link href="/hospital/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/hospital/admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center " href="/hospital/index.php">
                <div class="sidebar-brand-icon ">
                    <img src="/hospital/admin/img/logo.png" class="w-100 d-block" alt="">
                </div>
                <div class="sidebar-brand-text mx-3 text-light">karachi Hospital</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed " href="admin-profile.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Profile</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed " href="docter_reg.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Docter Registration</span>
                </a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="add_service.php" >
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Add Service</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            
            
            


            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="view_appointment.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>View Appointments</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="view_patient.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>View Patient</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="view_doctor.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>View Doctor</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="view-service.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>View Services</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn bg-gradient-danger" type="button">
                                    <i class="fas fa-search fa-sm text-gray-100 "></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                          


                        <!-- Divider -->
                         <hr class="sidebar-divider d-none d-md-block">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/<?php echo $user_image ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="admin-profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/hospital/logout.php" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-500"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>



    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



     <!-- add service form -->

     <form action="" method="post" class="container" enctype="multipart/form-data">

      <label for="">Service</label>
      <select class="form-control" name="service">
        <option value="Emergency Services" >Emergency Services</option>
        <option value="Inpatient Care" >Inpatient Care</option>
        <option value="Diagnostic Services" >Diagnostic Services</option>
        <option value="Surgical Services" >Surgical Services</option>
        <option value="Outpatient Services" >Outpatient Services</option>
        <option value="Maternal and Child Health Services" >Maternal and Child Health Services</option>
        <option value="Rehabilitation Services" >Rehabilitation Services</option>
        <option value="Specialty Services" >Specialty Services</option>
        <option value=" Supportive Services" > Supportive Services</option>
        <option value="Administrative and Ancillary Services" >Administrative and Ancillary Services</option>
       
      </select>
   
      <label for="">Docter</label>
      <select class="form-control" name="doctor">
      <?php
      $select = "select name from `docter_reg`";
      $query = mysqli_query($connect,$select);
      while($row  = mysqli_fetch_assoc($query)){
      ?>
        <option value="<?php echo $row['name'] ?>" ><?php echo $row['name'] ?></option>
        
        <?php } ?>
      </select>

    
     <label for="" >Image</label>
     <input type="file" name="image" class="form-control" value="">

     <label for="">Detail</label>
     <textarea name="detail" class="form-control" id=""></textarea>


     <button type="submit" name="submit" class="btn bg-gradient-danger mt-4 text-gray-100">add service</button>
    </form>





    <!-- Bootstrap core JavaScript-->
    <script src="/hospital/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/hospital/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/hospital/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/hospital/admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/hospital/admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/hospital/admin/js/demo/chart-area-demo.js"></script>
    <script src="/hospital/admin/js/demo/chart-pie-demo.js"></script>


</body>

</html>