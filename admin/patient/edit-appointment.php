

<?php

session_start();
include 'dbconnect.php';




if (isset($_SESSION['user_id'])) {
        
    $user_name = $_SESSION['user_name'];
    $user_image = $_SESSION['user_image'];
   
  }
 
if(isset($_POST['submit']))
{
    $id = $_GET['id'];
    $department = $_POST['department'];
    $drname = $_POST['dr,name'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $email = $_POST['email'];


   
    $update =" UPDATE `appointment` SET `id`='',`department`='$department',`dr name`='dr,name',`name`='$name',`number`='$number',`time`='$time',`date`='$date',`email`='$email' WHERE id ='$id'";
    $run = mysqli_query($connect , $update);
    if($run){
     header('location:view_appointment.php');
    }else{


    }
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

    <title>Profile</title>

    <!-- Font-awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/hospital/admin/css/sb-admin-2.min.css" rel="stylesheet">
    <title>Profile</title>
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
                <a class="nav-link collapsed " href="patient_profile.php" >
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Profile</span>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user_name ?></span>
                                <img class="img-profile rounded-circle"
                                    src="/hospital/images/<?php echo $user_image ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="patient_profile.php">
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
                <?php 
                  
                  $id = $_GET['id'];
                  $select = "select * from `appointment` where id = '$id' ";
                  $save = mysqli_query($connect,$select);
                  $row = mysqli_fetch_assoc($save)
                  ?>
           <!-- Update appointment form -->

           <form method="post" class="container" enctype="multipart/form-data">

           <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationServer03">Date</label>
                <input type="date" class="form-control " value="<?php echo $row['date'] ?>" id="validationServer03" name="date" placeholder="Name" aria-describedby="validationServer03Feedback" required>
                
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationServer04">Time</label>
                <input type="time" value="" placeholder="Number" value="<?php echo $row['time'] ?>" class="form-control " name="time" id="validationServer03">
                
              </div>
            </div>
           <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationServer03">Name</label>
                <input type="text" class="form-control " value="<?php echo $row['name'] ?>" name="name" id="validationServer03" placeholder="Name" aria-describedby="validationServer03Feedback" required>
                
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationServer04">Number</label>
                <input type="text" value="<?php echo $row['number'] ?>" placeholder="Number" name="number" class="form-control " id="validationServer03">
                
              </div>
            </div>
            <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Department</label>
                <input type="text" class="form-control" name="department" placeholder="Department" id="validationServer01" value="<?php echo $row['department'] ?>" required>
                
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationServer04">email</label>
                <input type="email" value="<?php echo $row['email'] ?>" placeholder="email" name="email" class="form-control " id="validationServer03">
                
              </div>
            </div>
            <div class="form-row">
             
              <div class="col-md-6 mb-3">
                <label for="validationServer01">Dr Name</label>
                <select  id="" name="dr,name" class="form-control ">
                <option value="<?php echo $row['dr name'] ?>" ><?php echo $row['dr name'] ?></option>
                <?php
              $select = "select name from `docter_reg`";
              $query = mysqli_query($connect,$select);
              while($row  = mysqli_fetch_assoc($query)){
              ?>
              <option value="<?php echo $row['name'] ?>" ><?php echo $row['name'] ?></option>
              
              <?php } ?>

                </select>
              </div>
            </div>
            
            
            
            <div class="button">
              <button class="btn btn-danger mt-3" name='submit' type="submit">update</button>
            </div>
          </form>

        

   <!-- Bootstrap core JavaScript-->
   <script src="/hospital/admin/vendor/jquery/jquery.min.js"></script>
    <script src="/hospital/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/hospital/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/hospital/admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/hospital/admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/hospital/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/hospital/admin/js/demo/datatables-demo.js"></script>

</body>

</html>