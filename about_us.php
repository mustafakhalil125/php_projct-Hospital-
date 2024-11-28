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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  
     <!-- font awsomne cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


     <!-- CSS link -->
    <link rel="stylesheet" href="style-1.css">
    <link rel="stylesheet" href="style.css">

    <title>About Us</title>

    <style>
      /* about us page style */

      .hospital-about-us{
          padding: 60px 0;
      }
      .hospital-about-us h3 {
          margin-bottom: 35px;
          color: rgb(156, 0, 0);
      }
      .hospital-about-us p {
          font-size: 1.2rem;
          line-height: 1.7;
      }
    </style>

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
     <!-- about_us slider image -->
  
      <div class="slid-image">
        <div class="slid-text">
            <h1>About Us</h1>
            <p class="lead text-dark">Welcome to Karachi Hospital, a premier healthcare institution dedicated to providing exceptional medical services to our community. Established with a commitment to excellence, we offer a wide range of specialized medical care, supported by cutting-edge technology and a team of highly skilled professionals.</p>
              
        </div>
      </div>

      <section class="hospital-about-us container">
        <div class="row">
            <div class="col-lg-6">
                
                 <h3>Our Mission</h3>
                <p>Our mission is to deliver compassionate, high-quality healthcare services while maintaining the highest standards of medical practice. We are dedicated to improving the health and well-being of our patients through innovative treatments, personalized care, and continuous advancements in medical science.</p>
                <h3>Our Vision</h3>
                <p>Our vision is to be the leading healthcare provider in Karachi, known for our commitment to patient care, medical excellence, and community service. We strive to create an environment where patients feel valued, and our staff is empowered to deliver the best possible outcomes.</p>
                <h3>Our Values</h3>
                <ul>
                    <li><strong>Compassion:</strong> We approach every patient with empathy and respect, providing care that addresses both physical and emotional needs.</li>
                    <li><strong>Excellence:</strong> We are dedicated to achieving the highest standards in medical practice and patient care.</li>
                    <li><strong>Integrity:</strong> We uphold the principles of honesty, transparency, and ethical conduct in all aspects of our work.</li>
                    <li><strong>Innovation:</strong> We embrace advancements in medical technology and treatments to offer the best care possible.</li>
                </ul>
                <h3>Our Facilities</h3>
                <p>Our hospital is equipped with state-of-the-art facilities, including advanced diagnostic tools, modern operating rooms, and comfortable patient care areas. We offer a wide range of services, including emergency care, surgical procedures, outpatient services, and specialized treatments.</p>
                <h3>Our Team</h3>
                <p>Our team of doctors, nurses, and healthcare professionals is dedicated to providing personalized care and treatment. We pride ourselves on our collaborative approach, ensuring that each patient receives comprehensive and coordinated care tailored to their individual needs.</p>
                <h3>Community Engagement</h3>
                <p>At Karachi Hospital, we believe in giving back to the community. We are involved in various outreach programs, health awareness campaigns, and community services to promote overall health and well-being.</p>
            </div>
            <div class="col-lg-6">
                <img src="images/about-side-image-1.jpg" alt="Hospital" class=" d-block w-100">
                <img src="images/about-side-image.jpg" alt="Hospital" class=" d-block w-100">
            </div>
        </div>
    </section>

   



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