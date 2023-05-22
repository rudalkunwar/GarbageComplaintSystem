<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include('../layout/dashlayout.php') ?>
    <div class="w-full container mx-auto">
        <div class="flex justify-center px-6 my-12">
            <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                <h3 class="pt-4 text-2xl text-center">Add New Driver</h3>
                <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" method="post" action="">
                    <div class="mb-4 md:mr-2 md:mb-0">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="driverid">
                            Driver ID
                        </label>
                        <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="driverid" name="driverid" type="text" placeholder="Driver ID" required />
                    </div>
                    <div class="mb-5 md:mr-2 md:mb-0">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="Name">
                            Name
                        </label>
                        <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="Name" name="drivername" type="text" placeholder="Name" required />
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Email
                        </label>
                        <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email" required />
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="pass">
                            Password
                        </label>
                        <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="pass" name="password" type="password" placeholder="********" required />
                    </div>
                    <div class="mb-5">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="addr">
                            Address
                        </label>
                        <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="addr" name="address" type="text" placeholder="Address" required />
                    </div>
                    <div class="mb-5 text-center">
                        <input type="submit" value="Add Driver" name="adddriver" class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['adddriver'])) {


    $did = $_POST['driverid'];
    $dname = $_POST['drivername'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $addr = $_POST['address'];

    $con = mysqli_connect('localhost', 'root', '', 'gcs_database');
    if ($con === false) {
        die("Eroor connection");
    }

    $qry = "INSERT INTO drivers VALUES($did,'$dname','$pass','$email','$addr')";

    if (mysqli_query($con, $qry)) {
        $_SESSION['message'] = "Driver Added successfully!";
        echo '<script>window.location.href = "driver.php";</script>';
    } else {
        echo '<script>alert("Error Adding Driver");</scritp>';
    }
}


?>
</body>

</html>