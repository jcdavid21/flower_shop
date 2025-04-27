<?php require_once("../backend/config/config.php") ?>
<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
     <link rel="stylesheet" href="../styles/general.css">
        <link rel="stylesheet" href="../styles/navbar.css">
     <link rel="stylesheet" href="../styles/signup.css">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   </head>
<body>

    <?php include("./navbar.php"); ?>

  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First name</span>
            <input type="text" name="fname" id="fname" placeholder="Enter your first name" required>
          </div>
          <div class="input-box">
            <span class="details">Middle name</span>
            <input type="text" name="mname" id="mname" placeholder="Enter your middle name">
          </div>
          <div class="input-box">
            <span class="details">Last name</span>
            <input type="text"name="lname" id="lname" placeholder="Enter your last name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" name="address" id="address" placeholder="Enter your address" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" name="contact" id="phoneNum" placeholder="Enter your number" oninput="this.value = this.value.replace(/\D/g, '').slice(0, 11)" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="confirmPass" id="confirmPass" placeholder="Confirm your password" required>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register" id="submit">
        </div>
      </form>
    </div>
  </div>

  <script src="../jquery/signup.js"></script>
</body>
</html>