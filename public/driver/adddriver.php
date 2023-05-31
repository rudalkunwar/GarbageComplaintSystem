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
    <div class="w-full container mx-auto ">
        <div class="flex justify-center px-6 my-12 ">
            <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                <h3 class="pt-4 text-2xl text-center">Add New Driver</h3>
                <form method="POST" action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full md:w-[50%] m-[30px_auto] flex flex-wrap">
                    <div class="mb-4 w-full md:w-fullpr-1">
                        <label for="driverid" class="block text-gray-700 text-sm font-bold mb-2">
                            Driver ID
                        </label>
                        <input type="text" id="driverid" name="driverid" placeholder="Driver ID" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full md:w-full pl-1">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                            Name
                        </label>
                        <input type="text" id="name" name="drivername" placeholder="Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full md:w-full pl-1">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" placeholder="Email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full md:w-full pl-1">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">
                            Address
                        </label>
                        <input type="text" id="address" name="address" placeholder="Address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full md:w-full pl-1">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                            Password
                        </label>
                        <input type="password" id="password" name="password" placeholder="*********" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full md:w-full pl-1 text-center">
                        <input type="submit" name="adddriver" value="Add Driver" class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline">
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

    $qry = "INSERT INTO drivers(driver_id,driver_name,password,email,address) VALUES($did,'$dname',md5('$pass'),'$email','$addr')";

    if (mysqli_query($con, $qry)) {
        $_SESSION['message'] = "Driver Added successfully!";
        echo '<script>window.location.href = "driver.php";</script>';
    } else {
        echo '<script>alert("Error Adding Driver");</scritp>';
    }
    $con->close();
}


?>
</body>

</html>