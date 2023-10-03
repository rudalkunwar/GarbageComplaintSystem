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
    <script>
        function validate() {
            var email = document.forms["form"]["email"].value;
            var password = document.forms["form"]["password"].value;

            // Check if any field is empty
            if (email === '' || password === '') {
                alert("Please fill in all the fields.");
                return false;
            }

            // Check if the email is valid
            var emailRegex = /^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/;
            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            return true;
        }
    </script>
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
                        <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="text" placeholder="Enter your Email" required="">
                    </div>

                    <div>
                        <label class="block text-gray-700 font-bold mb-2" for="password">Password</label>
                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" name="password" type="password" placeholder="Enter your password" required="">
                    </div>

                    <div>
                        <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit" name="login">Log In</button>
                    </div>

                    <div class="text-center">
                        <a class="text-blue-500" href="../index.php">Home</a>
                    </div>
                </form>
            </div>
        </div>
</body>

</html>

<?php
if (isset($_POST['login'])) {
    $con = mysqli_connect("localhost", "root", "", "project_gcs");
    if ($con === false) {
        die("Error connection ");
    }
    $user = $_POST['email'];
    $pass = $_POST['password'];

    $qry  = "SELECT * FROM admin WHERE email = '$user' AND password=md5('$pass')";

    if ($res = mysqli_query($con, $qry)) {
        if (mysqli_num_rows($res) > 0) {
            $_SESSION['admin'] = $user;
            $_SESSION['auth'] = "yes";
            header('location:dashboard.php');
        } else {
            echo '<script> alert("Invalid email or Password"); </script> ';
        }
    }
    mysqli_close($con);
}
?>