

<?php
include 'dbconnect.php';
session_start();

if(isset($_POST['submit']))
{
   $email = $_POST['email'];
   $password = $_POST['password'];


   $query = "select * from `pateint reg` where email = '$email' AND password = '$password'";
   $run = mysqli_query($connect,$query);
   if(mysqli_num_rows($run)>0)
   {
    
    $user = $run->fetch_assoc();
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_image'] = $user['image'];
    header('location:index.php');

   }else{
    echo "<script>
    alert('Please Check Your Password and Email');
    window.location.href = 'patient-login.php';  // Wapis usi page per redirect karain
    </script>";
   }

}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-size: cover;
            background-image: url(images/login-background.jpg);
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background: white;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
        }
        .login-container button{
            border-radius: 6px;
        }
        .login-container button a{
            color: white;
        }
        .login-container h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2 class="text-center">Patient Login</h2>
            <form method="post">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <button type="submit" name="submit" class="btn btn-danger btn-block">Login</button>
                <p class="text-center mt-3">
                    <a href="#">Forgot Password?</a>
                </p>
                <p class="text-center mt-3">
                    <a href="register-page.php">Create Account</a>
                </p>
                <button type="text" class="btn btn-danger btn-block"><a href="doctor_login.php">Doctor Login</a></button>
                <button type="text" class="btn btn-danger btn-block"><a href="admin_login.php">Admin Login</a></button>

            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
