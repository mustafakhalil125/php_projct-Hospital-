<?php
session_start();
include 'dbconnect.php';


if(isset($_POST['submit']))
{
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "images/". $filename;
    move_uploaded_file($tempname, $folder);
 
    $query = "INSERT INTO `pateint reg` VALUES ('','$email','$name','$password','$filename')";
    $save = mysqli_query($connect,$query);
    if($save == true)
    {

     header('location:patient-login.php');
 

    }else{
      
        echo "<script>
        alert('Please Check Your Password and Email.');
        window.location.href = 'register-page.php';  // Wapis usi page per redirect karain
        </script>";
    
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-size: cover;
            background-image: url(images/login-background.jpg);
        }
        .register-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }
        .register-container button{
            border-radius: 6px;
        }
        .register-container button a{
            color: white;
        }
        
        .register-container h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <h2 class="text-center">Patient Registration</h2>
            <form method="post" id="registerForm`" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Create Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password">Name</label>
                    <input type="text" class="form-control" name="name" id="password" placeholder="your name">
                </div>
                <div class="form-group">
                    <label for="password">Image</label>
                    <input type="file" name="image" class="form-control" id="password" placeholder="your image">
                </div>
                <button type="submit" name="submit" id="submit" class="btn btn-danger btn-block">Create Account</button>
                <p class="text-center mt-3">
                    <a href="patient-login.php">Patient Login</a>
                </p>
             </form>
        </div>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', function(event) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (email || password) {
        alert('Please fill in both the email and password fields.');
        event.preventDefault(); // Prevent form submission
    }
   });

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
