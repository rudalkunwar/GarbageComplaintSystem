<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../style.css">
  <script src="https://kit.fontawesome.com/62f9066fa7.js" crossorigin="anonymous"></script>

</head>

<body class="backdrop-blur-sm bg-cover" style="background-image: url('regback.jpg');">
  <!-- component -->
  <div class="min-h-screen flex flex-col ">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2">
      <div class="bg-blue-300 px-8 py-8 rounded shadow-md text-black w-full">
        <a href="../index.php" class="float-right px-2 py-1 hover:bg-red-600 cursor-pointer"><i class="fa-sharp fa-solid fa-xmark"></i></a>
        <h1 class="mb-8 text-3xl text-center">Sign up</h1>
        <form name="form" action="" method="POST" onsubmit=" return validate()">
          <input type="text" class="block w-full p-2 rounded mb-4" name="name" placeholder="Full Name" required/>
          <input type="text" class="block w-full p-2 rounded mb-4" name="email" placeholder="Email" required/>
          <input type="text" class="block w-full p-2 rounded mb-4" name="address" placeholder="Address" required/>
          <input type="text" class="block w-full p-2 rounded mb-4" name="contact" placeholder="Contact Number" required/>
          <input type="password" class="block w-full p-2 rounded mb-4" name="password" placeholder="Password" required/>
          <input type="password" class="block w-full p-2 rounded mb-4" name="cpassword" placeholder="Confirm Password" required/>
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
<script>
  function validate() {
    var pass = document.forms['form']['password'].value;
    var cpass = document.forms['form']['cpassword'].value;

    if (pass != cpass) {
      alert('password doesnot match');
      return false;
    }
  }
</script>
<?php
if (isset($_POST['register'])) {
  $con = mysqli_connect('localhost', 'root', '', 'gcs_database');
  if (!$con) {
    die("Unable to connect to the database");
  }
  $name = $_POST['name'];
  $email = $_POST['email'];
  $addr = $_POST['address'];
  $contact = $_POST['contact'];
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];
  $qry1 = "SELECT id FROM users where email = '$email' ";
  $result = mysqli_query($con, $qry1);
  if (mysqli_num_rows($result) > 0) {
    echo '<script> alert("Email already Exits") </script> ';
  } else {
    $qry = "INSERT INTO users(name,email,password,cpassword,address,contact) values('$name','$email',md5('$pass'),md5('$cpass'),'$addr','$contact')";
    $r = mysqli_query($con, $qry);
    if ($r > 0) {
      echo '<script> alert("You are Registered.Now you Can login") </script> ';
      echo '<script>window.location.href = "ulogin.php";</script>';

    }
  }
}
?>