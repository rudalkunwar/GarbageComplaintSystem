<?php
session_start();
?>
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
    $con = mysqli_connect('localhost', 'root', '', 'gcs_database');
    if ($con === false) {
        die("Eroor connection");
    }
    $qry = "SELECT id,name,address,email FROM drivers";
    $result = mysqli_query($con, $qry);
    ?>
    <div class="h-full w-full p-5 ml-14 md:ml-64 ">
        <div class="w-full my-5">
            <h2 class="text-3xl border-b-2 border-blue-600">Drivers</h2>
        </div>
        <div class="px-4 float-right">

        </div>

        <!-- Table for Driver -->
        <div class="w-full px-4 mb-8 ">
            <div class="bg-indigo-200 rounded-lg shadow-md p-6">
                <div class="flex justify-between p-2">
                    <!-- <h2 class="text-3xl font-semibold mb-1">Drivers</h2> -->
                    <div>
                        <a href="adddriver.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded">Add Driver</a>
                    </div>
                    <?php if (isset($_SESSION['message'])) {
                        $dmsg = $_SESSION['message'];
                    ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 text-center flex px-4 py-2 justify-between w-1/5 rounded relative" role="alert">
                            <span class="block sm:inline"><?php echo $dmsg ?></span>
                        </div>
                    <?php
                        unset($_SESSION['message']);
                    }
                    ?>
                </div>
                <div class="mt-10">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border-gray-400 py-2 px-4 text-left">Driver Id</th>
                                <th class="border-gray-400 py-2 px-4 text-left">Name</th>
                                <th class="border-gray-400 py-2 px-4 text-left">Address</th>
                                <th class="border-gray-400 py-2 px-4 text-left">Email</th>
                                <th class="border-gray-400 py-2 px-4 text-left">Alter</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td class="border-gray-400 py-2 px-4"><?php echo $data['id']; ?></td>
                                    <td class="border-gray-400 py-2 px-4"><?php echo $data['name']; ?></td>
                                    <td class="border-gray-400 py-2 px-4"><?php echo $data['address']; ?></td>
                                    <td class="border-gray-400 py-2 px-4"><?php echo $data['email']; ?></td>
                                    <td class="border-gray-400 py-3 px-4">
                                        <a href="editdriver.php?editid=<?php echo $data['id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        <a href="deletedriver.php?id=<?php echo $data['id'] ?>" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    </div>

</body>

</html>