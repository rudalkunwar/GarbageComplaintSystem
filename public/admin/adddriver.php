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
    <div class="flex">
    <?php include('dashlayout.php') ?>
    <div class="h-full w-full p-5 ml-14 md:ml-64">
        <div class="flex justify-center">
            <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
            <h3 class="pt-4 text-2xl text-center">Add New Driver</h3>
            <form method="POST" action="" class="shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full flex flex-wrap">
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

<!--  <form class="px-8 pt-2 pb-8 mb-4 bg-white rounded" method="post" action="">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="binid">
                            Bin Id
                        </label>
                        <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="binid" name="binid" type="text" placeholder="Bin Id" required />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="address">Bin Type</label>
                        <select class="block w-full px-4 py-2 rounded-md border shadow  focus:outline-none focus:shadow-outline" name="bintype" id="">
                            <option value="Organic">Organic</option>
                            <option value="Inorganic">Inorganic</option>
                            <option value="Metallic">Metallic</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="capacity">
                            Capacity
                        </label>
                        <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="capacity" name="capacity" type="text" placeholder="Capacity" required />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="location">
                            Location
                        </label>
                        <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="location" name="location" type="text" placeholder="Address" required />
                    </div>
                    <div class="mb-6 text-center">
                        <input type="submit" value="Add Bin" class="btn w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700" name="addbin" onClick="return confirm('Are You Sure To Add New Bin ?')">
                    </div>
                </form>
                > -->



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
        $to = $email;
        $message = "I am reaching out to inform you that you have been selected as our new garbage complaint system.Your login: Driver id =$did,email=$email and password=$pass.You can login here to see your work,http://localhost/gcsproject/public/driver/dlogin.php";
        $subject = "New Garbage Complaint System";
        $header = "From:admingcs@gmail.com";
        mail($to, $subject, $message, $header);
        $_SESSION['message'] = "Driver Added successfully! and Mail also sent to driver";
        echo '<script>window.location.href = "driver.php";</script>';
    } else {
        echo '<script>alert("Error Adding Driver");</scritp>';
    }
    $con->close();
}


?>
</body>

</html>