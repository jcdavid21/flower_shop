<?php require_once("../backend/config/config.php") ?>
<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../styles/general.css">
  <link rel="stylesheet" href="../styles/login.css">
    <link rel="stylesheet" href="../styles/navbar.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
<?php include("./navbar.php"); ?>

    <div class="container">
        <div class="login form" style="color:black;">
            <header>Login</header>
            <form action="#">
                <input type="email" id="email" placeholder="Enter your email">
                <input type="password" id="password" placeholder="Enter your password">
                <input type="button" class="button" id="submit" value="Login">
            </form>
            <div class="signup">
                <span class="signup">Don't have an account?
                <a href="./signup.php"><label for="check">Signup</label></a>
                </span>
            </div>
        </div>
    </div>

    <script src="../jquery/login.js"></script>
</body>
</html>