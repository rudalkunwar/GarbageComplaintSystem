<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Register</title>
  <link rel="stylesheet" href="../style.css">
  <script src="https://kit.fontawesome.com/62f9066fa7.js" crossorigin="anonymous"></script>
  <script>
        function validate() {
            var name = document.forms["form"]["name"].value;
            var email = document.forms["form"]["email"].value;
            var address = document.forms["form"]["address"].value;
            var contact = document.forms["form"]["contact"].value;
            var password = document.forms["form"]["password"].value;
            var cpassword = document.forms["form"]["cpassword"].value;

            // Check if any field is empty
            if (name === '' || email === '' || address === '' || contact === '' || password === '' || cpassword === '') {
                alert("Please fill in all the fields.");
                return false;
            }

            // Check if the email is valid
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Check if the contact number is valid (using a simple pattern)
            var contactRegex = /^\d{10}$/; // Assumes a 10-digit phone number
            if (!contactRegex.test(contact)) {
                alert("Please enter a valid 10-digit contact number.");
                return false;
            }

            // Check if the password match the required length
            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false;
            }

            // Check if the password and confirm password match
            if (password !== cpassword) {
                alert("Password and Confirm Password do not match.");
                return false;
            }
            return true; 
        }
    </script>
</head>

<body class="backdrop-blur-sm bg-cover" style="background-image: url('regback.jpg');">
  <!-- component -->
  <div class="min-h-screen flex flex-col ">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
      <div class="bg-blue-300 px-8 py-8 rounded shadow-md text-black w-full">
        <a href="../index.php" class="float-right px-2 py-1 hover:bg-red-600 cursor-pointer"><i class="fa-sharp fa-solid fa-xmark"></i></a>
        <h1 class="mb-8 text-3xl text-center">Sign up</h1>
        <form name="form" action="" method="POST" onsubmit=" return validate()">
          <input type="text" class="block w-full p-2 rounded mb-4" name="name" placeholder="Full Name" required />
          <input type="text" class="block w-full p-2 rounded mb-4" name="email" placeholder="Email" required />
          <input type="text" class="block w-full p-2 rounded mb-4" name="address" placeholder="Address" required />
          <input type="text" class="block w-full p-2 rounded mb-4" name="contact" placeholder="Contact Number" required />
          <input type="password" class="block w-full p-2 rounded mb-4" name="password" placeholder="Password" required />
          <input type="password" class="block w-full p-2 rounded mb-4" name="cpassword" placeholder="Confirm Password" required />
          <input type="submit" value="Create Account" class="w-full text-center py-3 rounded bg-green-600 text-white hover:bg-green-500 focus:outline-none my-1 cursor-pointer" name="register">
        </form>
        <div class="text-center text-s mt-4">
          By signing up, you agree to the
          <a class="no-underline" href="#">
            Terms of Service
          </a> and
          <a class="no-underline" href="#">
            Privacy Policy
          </a>
        </div>
      </div>

      <div class="text-white mt-6">
        Already have an account?
        <a class="no-underline border-b border-blue-400 text-blue" href="ulogin.php">
          Log in
        </a>.
      </div>
    </div>
  </div>
</body>

</html>
<?php
if (isset($_POST['register'])) {
  $con = mysqli_connect("localhost", "root", "", "project_gcs");
    if ($con === false) {
        die("Error connection ");
    }
  $name = $_POST['name'];
  $email = $_POST['email'];
  $addr = $_POST['address'];
  $contact = $_POST['contact'];
  $pass = md5($_POST['password']);

  //encrypting password
  // $hpass = md5($pass);
  // $chpass = md5($cpass);

  $qry1 = "SELECT user_id FROM users where email = '$email' ";
  $result = mysqli_query($con, $qry1);
  if (mysqli_num_rows($result) > 0) {
    echo '<script> alert("Email already Exits") </script> ';
  } else {
    $qry = "INSERT INTO users(user_name,email,password,address,contact) values('$name','$email','$pass','$addr','$contact')";
    $r = mysqli_query($con, $qry);
    if ($r > 0) {
      echo '<script> alert("You are Registered.Now you Can login") </script> ';
      echo '<script>window.location.href = "ulogin.php";</script>';
    }
  }
}
?>