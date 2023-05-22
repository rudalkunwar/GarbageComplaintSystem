<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location:dashboard.php');
}
?>
<? include('../layout/header.php') ?>

<!DOCTYPE html>
<html lang="eng">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="font-sans antialiased">
    <div class="flex flex-col md:flex-row h-screen">
        <!-- Admin Login Form -->
        <div class="w-full flex justify-center items-center bg-gray-200">
            <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
                <div class="text-center mb-8 rounded">
                    <img src="../images/adminlog.jpg" alt="adminlogo" class="w-32 mx-auto rounded-lg">
                    <h2 class="text-2xl font-bold mt-2">Welcome Back!</h2>
                    <p class="text-gray-600">Log in to manage your account.</p>
                </div>

                <form class="space-y-4" method="post" action="">
                    <div>
                        <label class="block text-gray-700 font-bold mb-2" for="username">Username</label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="username" type="text" placeholder="Enter your username" required="">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2" for="password">Password</label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Enter your password" required="">
                    </div>

                    <div>
                        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit" name="login">Log In</button>
                    </div>

                    <div class="text-center">
                        <a class="text-blue-500" href="#">Forgot your password?</a>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>

<?php
if (isset($_POST['login'])) {
    $con = mysqli_connect("localhost", "root", "", "gcs_database");
    if ($con === false) {
        die("Error connection ");
    }
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $qry  = "SELECT * FROM admin WHERE name = '$user' AND password=md5('$pass')";

    if ($reslt = mysqli_query($con, $qry)) {
        if (mysqli_num_rows($reslt) > 0) {
            $_SESSION['admin'] = $user;
            $_SESSION['auth'] = "yes";
            // header('location:dashboard.php');
            header('location:dashboard.php');
        }
    }
}
?>