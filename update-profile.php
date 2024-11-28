

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
    $profile = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   


    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "images/". $filename;
    move_uploaded_file($tempname, $folder);
 
    $update =" UPDATE `pateint reg` SET `id`='$id',`email`='$email',`name`= '$profile',`password`='$password',`image`='$filename' WHERE id = '$id'";
    $run = mysqli_query($connect , $update);
    if($run){
     header('location:admin/patient/patient_profile.php');
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
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
    <title>Update Profile</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center " href="index.php">
                <div class="sidebar-brand-icon ">
                    <img src="admin/img/logo.png" class="w-100 d-block" alt="">
                </div>
                <div class="sidebar-brand-text mx-3 text-light">karachi Hospital</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed " href="admin/patient/patient_profile.php" >
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
                <a class="nav-link" href="admin/patient/view_appointment.php">
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
                                    src="/hospital/patient/img/<?php echo $user_image ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="admin/patient/patient_profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-500"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>


             <?php
             
                $id = $_GET['id'];
                $select= "select * from `pateint reg` where id= '$id'";
                $save= mysqli_query($connect,$select);
                $row= mysqli_fetch_assoc($save) 
                
            ?>
             <div class="container">
                    <form method="post"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label >Email address</label>
                            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control"  placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label >Create Password</label>
                            <input type="password" name="password" value="<?php echo $row['password'] ?>" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label >Name</label>
                            <input type="text" class="form-control" value="<?php echo $row['name'] ?>" name="name"  placeholder="your name">
                        </div>
                        <div class="form-group">
                            <label >Image</label>
                            <input type="file" name="image" class="form-control" value="<?php echo $row['image'] ?>"  placeholder="your image">
                        </div>
                          <!-- Divider -->
                         <hr class="sidebar-divider my-0">
                        <button type="submit" name="submit" id="submit" class="btn btn-danger ">Update Profile</button>
                        
                    </form>
                </div>

            

        

   <!-- Bootstrap core JavaScript-->
   <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/datatables-demo.js"></script>

</body>

</html>