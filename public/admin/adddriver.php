<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    <script>
        function validate() {
            var driverId = document.forms["driverForm"]["driverid"].value;
            var driverName = document.forms["driverForm"]["drivername"].value;
            var email = document.forms["driverForm"]["email"].value;
            var address = document.forms["driverForm"]["address"].value;
            var password = document.forms["driverForm"]["password"].value;

            // Check if any field is empty
            if (driverId === '' || driverName === '' || email === '' || address === '' || password === '') {
                alert("Please fill in all the fields.");
                return false;
            }

            // Check if Driver ID is an integer
            if (!Number.isInteger(Number(driverId))) {
                alert("Driver ID must be an integer.");
                return false;
            }

            // Check if Password is at least 8 characters long
            if (password.length < 8) {
                alert("Password must be at least 8 characters long.");
                return false;
            }
            var emailRegex = /^[A-Za-z\._\-0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/;
            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            return true; // Form will be submitted if all validations pass
        }
    </script>
</head>

<body>
    <div class="flex">
        <?php include('dashlayout.php') ?>
        <div class="h-full w-full p-5 ml-14 md:ml-64">
            <div class="flex justify-center">
                <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                    <h3 class="pt-4 text-2xl text-center">Add New Driver</h3>
                    <form name="driverForm" method="POST" action="" class="shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full flex flex-wrap" onsubmit="return validate();">
                        <div class="mb-4 w-full md:w-full pr-1">
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
                            <input type="submit" name="adddriver" value="Add Driver" class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline" onclick="return confirm('Are You Sure To Add New Driver ?')">
                        </div>
                    </form>
                </div>
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

    $checkQuery = "SELECT * FROM drivers WHERE driver_id = $did OR driver_name = '$dname' OR email  = '$email'";
    $res = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($res) > 0) {
        echo '<script>alert("Driver already exists.")</script>';
    } else {
        $qry = "INSERT INTO drivers(driver_id,driver_name,password,email,address) VALUES($did,'$dname',md5('$pass'),'$email','$addr')";

        if (mysqli_query($con, $qry)) {
            $_SESSION['message'] = "Driver Added successfully!";

            echo '<script>window.location.href = "driver.php";</script>';
        } else {
            echo '<script>alert("An error occurred while adding the bin.")</script>';
        }
    }
}
$con->close();
?>