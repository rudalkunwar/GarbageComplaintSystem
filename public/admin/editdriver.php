<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Driver</title>
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
    <?php
    $myid = $_GET['editid']; 
    include('dashlayout.php') ?>
    <?php
    $qry = "SELECT * FROM drivers WHERE driver_id = $myid";
    $data = mysqli_query($con, $qry);
    $result = mysqli_fetch_assoc($data);
    ?>
    <div class="w-full container mx-auto ">
        <div class="flex justify-center px-6 my-12 ">
            <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                <h3 class="pt-4 text-2xl text-center">Edit Driver</h3>
                <form method="post" action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full md:w-[50%] m-[30px_auto] flex flex-wrap" onsubmit="return validate();">
                    <div class="mb-4 w-full pr-1">
                        <label for="driverid" class="block text-gray-700 text-sm font-bold mb-2">
                            Driver ID
                        </label>
                        <input type="text" id="driverid" name="driverid" value="<?php echo $result['driver_id'] ?>" placeholder="Driver ID" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full pl-1">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                            Name
                        </label>
                        <input type="text" id="name" name="drivername" value="<?php echo $result['driver_name'] ?>" placeholder="Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full pl-1">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="<?php echo $result['email'] ?>" placeholder="Email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full pl-1">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">
                            Address
                        </label>
                        <input type="text" id="address" name="address" value="<?php echo $result['address'] ?>" placeholder="Address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full pl-1 text-center">
                        <input type="submit" name="editdriver" value="Edit Driver" class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>

<?php
if (isset($_POST['editdriver'])) {


    $did = $_POST['driverid'];
    $dname = $_POST['drivername'];
    $email = $_POST['email'];
    $addr = $_POST['address'];

    $con = mysqli_connect('localhost', 'root', '', 'project_gcs');
    if ($con === false) {
        die("Eroor connection");
    }

    $qry = "UPDATE drivers SET driver_id=$did,driver_name='$dname',email='$email',address='$addr' WHERE driver_id=$myid";

    if (mysqli_query($con, $qry)) {

        $_SESSION['message'] = "Driver Updated successfully!";
        echo '<script>window.location.href = "driver.php";</script>';
    } else {
        echo '<script>Error Upadting</scritp>';
    }
}


?>
</body>

</html>