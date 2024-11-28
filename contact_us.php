<?php


session_start();

include 'dbconnect.php';


  // Assume user table with common fields to identify the user and role
  $sql_patient = "SELECT email FROM `pateint reg` ";
  $sql_doctor = "SELECT email FROM docter_reg ";
  $sql_admin = "SELECT email FROM `admin login` ";

  $result_patient = $connect->query($sql_patient);
  $result_doctor = $connect->query($sql_doctor);
  $result_admin = $connect->query($sql_admin);

  $row = mysqli_fetch_assoc($result_patient);
  $run = mysqli_fetch_assoc($result_doctor);
  $save = mysqli_fetch_assoc($result_admin);




if (isset($_SESSION['user_id'])) {

  $email = $_SESSION['user_email'];
  $user_name = $_SESSION['user_name'];
  $user_image = $_SESSION['user_image'];

  if ($email == $row['email']) {
    $profile_link = "admin/patient/patient_profile.php";
  } elseif ($email == $run['email']) {
    $profile_link = "admin/docter/doctor_profile.php";
  } elseif ($email ==  $save['email']) {
    $profile_link = "admin/admin/admin-profile.php";
  } else {
    // Default fallback, if role is not recognized
    $profile_link = "patient-login.php";
  }



}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Latest compiled and minified CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- font awsomne cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- CSS link -->
     <link rel="stylesheet" href="style.css">

    <title>Contact Us</title>

</head>
<body>

    <!-- Navbar -->
     
    <nav id="navbar" class="navbar navbar-expand-lg fixed-top" >
       <div class="container-fluid">

        <img src="images/logo.png" class=" navbar-brand image" alt="Hospital Logo">
        <span class="name"><a href="index.php">KARACHI HOSPITAL</a></span>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa-solid fa-bars"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-5">
            <li class="nav-link active">
              <a class="nav-link" href="about_us.php">About US <span class="sr-only"></span></a>
            </li>
            <li class="nav-link active">
              <a class="nav-link" href="service.php">Services<span class="sr-only"></span></a>
            </li>
            <li class="nav-link active">
              <a class="nav-link" href="appointment.php">Appointment<span class="sr-only"></span></a>
            </li>
           
            <li class="nav-link active dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownDoctors" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  For patient
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownDoctors">
                  <a class="dropdown-item" href="find_doctor.php">Find Doctor</a>
                  <a class="dropdown-item" href="speclist.php">Specialists</a>
                </div>
              </li>
              <li class="nav-link active">
                <a class="nav-link" href="contact_us.php">Contact US <span class="sr-only"></span></a>
              </li>
              <?php
             if (isset($user_name) && isset($user_image)) :
           
                ?>

             <!-- Dropdown for user profile -->
        <li class="nav-item dropdown ml-3">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $user_name ; ?> 
          <img src="admin/admin/img/<?php echo $user_image ; ?>" alt="" class="rounded-circle ml-2" width="45" height="45">
            
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo $profile_link ?>">Profile</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
        <?php else: ?>

        
        <li class="nav-link active  ml-4">
          <a class="nav-link text-primary" href="patient-login.php">Login</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link btn btn-danger  text-white mr-3" href="register-page.php">Register</a>
        </li>

        <?php endif; ?>

          </ul>
        </div>
       </div>
      </nav>
       <!-- contact -->
      
           <div class="row">
              <img src="images/map.avif" class="map-img d-block w-100 " alt="" srcset="">
           </div>

          <div class="container-fluid">
            <div class="contact_us row">
              <div class= "contact-icon-text col-md-4 mt-4 mb-4">
               <div class="contact-icon-2 row">
                <div class="contact-icon col-md-3 mt-5">
                  <h6 ><i class="fa-solid fa-location-dot"></i></h6>
                  <h6 ><i class="fa-solid fa-phone-volume mt-5"></i></h6>
                  <h6 ><i class="fa-brands fa-whatsapp mt-5"></i></h6>
                  <h6 ><i class="fa-solid fa-envelope mt-5"></i></h6>

                </div>
                <div class="contact-text col-md-10 text-light">
                  <h6 class="mt-5">ADDRERSS :</h6>
                  <span>1730/898 North Nazimabad karachi</span>
                  <h6 class="mt-4">PHONE :</h6>
                  <span>03351256817</span>
                  <h6 class="mt-5">WHATSUP :</h6>
                  <span>03351256817</span>
                  <h6 class="mt-5">EMAIL :</h6>
                  <span>karachi@gmail.com</span>
                </div>
               </div>
              </div>

              <!-- location -->

                <div class="location-set col-md-7 mt-4 mb-4">
                  <div class="container">
                    <h3 class="text-left mb-4">Find Us on the Map</h3>
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28953.401942776134!2d67.0417553!3d24.8920034!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33edc8e0a1b45%3A0x95854329956118e7!2sThe%20Aga%20Khan%20University%20Hospital%20(AKUH)!5e0!3m2!1sen!2s!4v1722925086266!5m2!1sen!2s"
                            width="600"
                            height="450"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"></iframe>
                    </div>
                  </div>
                </div>
            </div>  
          </div>
           
       
    





      <!-- Footer -->

      <footer>
        <div class="container-fluid">
          <div class=" row">
            <div class="footer-1 col-md-3 mt-5">
              <span class="name">KARACHI HOSPITAL</span>
              <p>
                All faculties under the group of Karachi hospital. It also serves as a teaching hospital for Dow univercity of health Science we understand that healing is most effective in the comfort of your own home. That’s why we offer comprehensive home healthcare services.
              </p>
              <p>
                We offer therapy to assist with daily activities, helping you adapt your environment and develop skills to enhance your quality of life.
              </p>

            </div>
            <div class="footer-2 col-md-3 mt-5">
              <h4 >QUICK LINKS</h4>
              <h6><a href="find_doctor.php">Find Docter</a></h6>
              <h6><a href="speclist.php">Speclist</a></h6>
              <h6><a href="about_us.php">Abouit Us</a></h6>
              <h6><a href="appointment.php">Appointment</a></h6>
            </div>
            <div class="footer-3 col-md-3 mt-5">
              <h4 >KARACHI GROUP</h4>
              <h6><a href="index.php">Karachi Hospital</a></h6>
              <h6><a href="https://uok.edu.pk/">Karachi University</a></h6>
              <h6><a href="about_us.php">Abouit Us</a></h6>
              <h6><a href="contact_us.php">Contact Us</a></h6>
            </div>
            <div class="footer-4 col-md-3 mt-5">
              <h4>GET IN TOUCH</h4>
              <h6>UNA : 021-114-444-224</h6>
              <h6>Cliften: 021-114-444-224</h6>
              <h6>Kmari : 021-114-444-224</h6>
              <h6>North : 021-114-444-224</h6>
              
              <h6>karachi@gmail.com</h6>
              <h6>www.karachi.com</h6>
              <h6>Head Office: Block-B, <br>
                North Nazimabad, Karachi 74700, <Pakistan class="br"></Pakistan>
                Clifton: ST-4/B, Shahrah-e-Ghalib, Block-6, Scheme 5, Clifton, Karachi 75600, Pakistan. <br>
                Keamari: Plot No. 33, Behind KPT Hospital, Keamari, Karachi 75620, Pakistan. <br>
                Boat Basin: F-6, Block-5, Khayaban-e-Saadi, Clifton, Karachi 75600, Pakistan.</h6>
            </div>
          </div>
        </div>
      </footer>

      <script>
            document.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) { // Adjust the scroll value as needed
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        });

      </script>
      

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

   </body>
</html>