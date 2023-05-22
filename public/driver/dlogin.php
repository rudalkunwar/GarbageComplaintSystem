<?php session_start();
if (isset($_SESSION['driverid'])) {
  header('location:ddash.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="../style.css" />
</head>

<body>
  <div class="bg-yellow-300 h-screen w-screen">
    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
      <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
        <div class="flex flex-col w-full md:w-1/2 p-4 bg-violet-200">
          <div class="flex flex-col flex-1 justify-center mb-8">
            <h1 class="text-4xl text-center font-thin">Log In to continue</h1>
            <div class="w-full mt-4">
              <form class="form-horizontal w-3/4 mx-auto" method="POST" action="">
                <div class="flex flex-col mt-4">
                  <input id="driverid" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="driverid" value="" placeholder="Driver ID" />
                </div>
                <div class="flex flex-col mt-4">
                  <input id="email" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400" name="email" value="" placeholder="Email" />
                </div>
                <div class="flex flex-col mt-4">
                  <input id="password" type="password" class="flex-grow h-8 px-2 rounded border border-grey-400" name="password" required placeholder="Password" />
                </div>
                <div class="flex flex-col mt-8">
                  <input type="submit" value="Login" name="login" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded" />
                </div>
              </form>
              <div class="text-center mt-4">
                <a class="no-underline hover:underline text-blue-dark text-xs" href="">
                  Forgot Your Password?
                </a>
              </div>
              <div class="text-center mt-2">
                <a class="no-underline hover:underline text-blue-dark text-xs" href="../index.php">
                  Go back?
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class=" md:block md:w-1/2 rounded-r-lg " style="background:url('driver.png'); background-size:cover; background-position:center;">
        </div>
      </div>
    </div>
  </div>

</body>

</html>
<?php
if (isset($_POST['login'])) {
  $con = mysqli_connect('localhost', 'root', '', 'gcs_database');
  if (!$con) {
    die("Unable to connect to the database");
  }
  $did = $_POST['driverid'];
  $email = $_POST['email'];
  $pass = $_POST['password'];
  $qry = "SELECT * from drivers WHERE id=$did AND email='$email' AND password='$pass'";
  if ($result = mysqli_query($con, $qry)) {
    if (mysqli_num_rows($result) > 0) {
      $data = mysqli_fetch_assoc($result);
      $_SESSION['drivername'] = $data['name'];
      $_SESSION['email'] = $data['email'];
      $_SESSION['driverid'] = $data['id'];
      header('location:ddash.php');
    } else {
      echo '<script> alert("Error username or password"); </script>';
    }
  }
}
?>