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

    <?php
    $myid = $_GET['editid'];
    $con = mysqli_connect('localhost', 'root', '', 'gcs_database');
    if ($con === false) {
        die("Error connection");
    }
    $qry = "SELECT * FROM drivers WHERE id = $myid";
    $data = mysqli_query($con, $qry);
    $result = mysqli_fetch_assoc($data);
    ?>
    <div class="w-full container mx-auto ">
        <div class="flex justify-center px-6 my-12 ">
            <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                <h3 class="pt-4 text-2xl text-center">Add New Driver</h3>
                <form method="post" action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full md:w-[50%] m-[30px_auto] flex flex-wrap">
                    <div class="mb-4 w-full md:w-[50%] pr-1">
                        <label for="driverid" class="block text-gray-700 text-sm font-bold mb-2">
                            Driver ID
                        </label>
                        <input type="text" id="driverid" name="driverid" value="<?php echo $result['id'] ?>" placeholder="Driver ID" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full md:w-[50%] pl-1">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                            Name
                        </label>
                        <input type="email" id="name" name="drivername" value="<?php echo $result['name'] ?>" placeholder="Name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full md:w-[50%] pl-1">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                            Email
                        </label>
                        <input type="email" id="email" name="email" value="<?php echo $result['email'] ?>" placeholder="Email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full md:w-[50%] pl-1">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">
                            Address
                        </label>
                        <input type="text" id="address" name="address" value="<?php echo $result['address'] ?>" placeholder="Address" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full md:w-[50%] pl-1">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                            Password
                        </label>
                        <input type="password" id="password" name="password" value="<?php echo $result['password'] ?>" placeholder="*********" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required />
                    </div>
                    <div class="mb-4 w-full md:w-[50%] pl-1 text-center">
                        <input type="submit" value="Add Driver" class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>

<?php
if (isset($_POST['updatedriver'])) {


    $did = $_POST['driverid'];
    $dname = $_POST['drivername'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $addr = $_POST['address'];

    $con = mysqli_connect('localhost', 'root', '', 'gcs_database');
    if ($con === false) {
        die("Eroor connection");
    }

    $qry = "UPDATE drivers SET id=$did,name='$dname',password='$pass',email='$email',address='$addr' WHERE id=$myid";

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