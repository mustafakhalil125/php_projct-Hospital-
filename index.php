<?php


session_start();

include 'dbconnect.php';

if (isset($_SESSION['user_id'])) {

  $email = $_SESSION['user_email'];
  $user_name = $_SESSION['user_name'];
  $user_image = $_SESSION['user_image'];


    // Assume user table with common fields to identify the user and role
    $sql_patient = "SELECT email FROM `pateint reg` ";
    $sql_doctor = "SELECT email FROM `docter_reg` ";
    $sql_admin = "SELECT email FROM `admin login` ";
  
    $result_patient = $connect->query($sql_patient);
    $result_doctor = $connect->query($sql_doctor);
    $result_admin = $connect->query($sql_admin);
  
    $row = mysqli_fetch_assoc($result_patient);
    $run = mysqli_fetch_assoc($result_doctor);
    $save = mysqli_fetch_assoc($result_admin);


  
   
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


if(isset($_POST['submit'])) {

  $email = $_SESSION['user_email'];
  $department = $_POST['department'];
  $dr_name= $_POST['dr,name'];
  $name = $_POST['name'];
  $number = $_POST['number'];
  $date = $_POST['date'];
  $time = $_POST['time'];


  $query = "INSERT INTO `appointment` VALUES ('','$department','$dr_name','$name','$number','$time','$date','$email')";
  $save = mysqli_query($connect,$query);
  if($email ==  $save)
  {
    echo "<script>
    alert('Appoitment book Susseccfully.');
    window.location.href = 'index.php';  // Wapis usi page per redirect karain
    </script>";
  }else{
    echo "<script>
    alert('Please login before booking an appointment.');
    window.location.href = 'patient-login.php';  // Wapis usi page per redirect karain
    </script>";
  }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo.png">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- CSS link -->
     <link rel="stylesheet" href="style.css">

     <!-- font awsomne cdn link -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>HOME PAGE</title>

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
          <ul class="navbar-nav ml-auto">
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
        <li class="nav-item active dropdown float-right ml-4">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $user_name ; ?> 
          <img src="admin/admin/img/<?php echo $user_image ; ?>" alt="" class="rounded-circle ml-2 " width="45" height="45">
            
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo $profile_link ?>">Profile</a>
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </li>
        <?php else: ?>

        
        <li class="nav-link active ml-4">
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


      <!-- slider  -->

      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/slider-1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption  d-md-block">
              <h5 class="text-mute">Compassionate Care ,Close to Home</h5>
              <p >"At <b>Karachi Hospital</b>, we provide top-tier medical care with a personal touch. "</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/slider-2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption  d-md-block">
              <h5>Advanced Medical Technology</h5>
              <p>Our state-of-the-art facilities and cutting-edge technology ensure that you receive the best possible care."</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/slider-2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption  d-md-block">
              <h5>Your Health, Our Mission</h5>
              <p>"Committed to excellence, we strive to enhance your well-being through compassionate care, innovative treatments, and a patient-centered approach."</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <!-- Appointment forms  -->

       <div  class="container-fluid mt-5">
        <div class="row">
          <div class="col-md-3"></div>
          <div class="appoint col-md-6 ">
              <h1>Appointment</h1>
          </div>
          <div class="col-md-3"></div>
        </div>
       </div>

      <div class="container-fluid mt-5 ">
        <div class="appointment row">
          <div class="time col-md-3">
              <h4>MONDAY TO SATURDAY</h4>
              <h5>09:00 AM TO 10:00 PM</h5>
              <p>All faculties under the group of Karachi hospital. It also serves as a teaching hospital for Dow univercity of health Science </p>
              <a href="find_doctor.php"><button class="btn btn-danger mt-3" type="submit">find Doctor</button></a>
            </div>

          
          <div class="emergency col-md-3 ">
              <h5>Emergency</h5>
              <h6>UNA : 021-114-444-224</h6>
              <h6>Cliften: 021-114-444-224</h6>
              <h6>Kmari : 021-114-444-224</h6>
              <h6>North : 021-114-444-224</h6>
              <button class="btn btn-danger mt-5" type="submit">03351256817</button>
          </div>  
           <div class="form col-md-5 ">
           <form method="post" enctype="multipart/form-data">
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationServer01">Department</label>
                  <input type="text" class="form-control" name="department" placeholder="Department" id="validationServer01" value="OPO" required>
                  
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationServer01">Dr Name</label>
                  <select  id="" name="dr,name" class="form-control ">

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
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationServer03">Name</label>
                  <input type="text" class="form-control " name="name" id="validationServer03" placeholder="Name" aria-describedby="validationServer03Feedback" required>
                  
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationServer04">Number</label>
                  <input type="text" value="" placeholder="Number" name="number" class="form-control " id="validationServer03">
                  
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationServer03">Date</label>
                  <input type="date" class="form-control " id="validationServer03" name="date" placeholder="Name" aria-describedby="validationServer03Feedback" required>
                  
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationServer04">Time</label>
                  <input type="time" value="" placeholder="Number" class="form-control " name="time" id="validationServer03">
                  
                </div>
              </div>
              
              <div class="button">
                <button class="btn btn-danger mt-3" name='submit' type="submit">Submit form</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Docter-list -->
      
        <div class="row">
          <div class="img col-md-12 mt-5">
            <img src="images/docter-list.png"  class="d-block w-100" srcset="">
          </div>
        </div>
        

      <!-- our trusted team -->

      <div class="container-fluid">
        <div class="row mt-5">
          <div class="col-md-3"></div>
          <div class=" our-team col-md-6">
            <h4>Our Tusted Team</h4>
            <p>
              The medical team at Karachi Hospital consists of highly qualified and experienced doctors specializing in various fields of medicine. These doctors are dedicated to providing quality healthcare services to the patients
            </p>
            <img src="images/ou-team.jpg" alt="" class="d-block w-100" srcset="">
          </div>
          <div class="col-md-3"></div>
        </div> 
      </div>

       <!-- Home Service -->

      <div class="container-fluid">
        <div class="row mt-5">
          <div class="col-md-6">
           <img src="images/DZH-Clifton-Buiding-2.jpg" class="d-block w-100" alt="" srcset="">
          </div>
          <div class="home-service col-md-6">
            <h3>Home Service</h3>
            <p>
              At <b>Karachi Hospital</b>, we understand that healing is most effective in the comfort of your own home. That’s why we offer comprehensive home healthcare services designed to provide you with the highest quality of care in a familiar and supportive environment.
            </p>
            <h4>Our Home Services Include:</h4>
            <p>
              <b>Skilled Nursing Care:</b> Professional and compassionate nurses available to manage medical needs, administer medications, and provide wound care.
            </p>
            <p>
              <b>Physical Therapy:</b> Customized therapy programs to help you recover mobility and strength, tailored to your specific needs
            </p>
            <p>
              <b>Occupational Therapy:</b> We offer therapy to assist with daily activities, helping you adapt your environment and develop skills to enhance your quality of life.
            </p>
            <p><b>Speech Therapy:</b> Our speech-language pathologists work with you to improve communication skills and address swallowing disorders, promoting better interaction and nutrition.

            </p>

            <button class=" btn btn-danger">UNA : 021-985-545-798</button>
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