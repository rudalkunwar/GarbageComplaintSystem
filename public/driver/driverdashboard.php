<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Driver Dashboard</title>
    <link rel="stylesheet" href="../style.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body class="">
    <?php include('driverdashlayout.php'); 
    $qry1 = "SELECT * FROM assigned_bin  WHERE assign_status = 'none' AND assigned_driver = '$driver'";
    $res1 = mysqli_query($con, $qry1);
    $row1 = mysqli_num_rows($res1);

    $qry2 = "SELECT * FROM assigned_bin  WHERE assign_status = 'Completed' AND assigned_driver = '$driver'";
    $res2 = mysqli_query($con, $qry2);
    $row2 = mysqli_num_rows($res2);


    $qry3 = "SELECT * FROM assigned_bin  WHERE assign_status = 'Rejected' AND assigned_driver = '$driver'";
    $res3 = mysqli_query($con, $qry3);
    $row3 = mysqli_num_rows($res3);
    ?>
    <div class="h-full w-full p-5 ml-14 md:ml-64">
        <div class="w-full my-5">
            <h2 class="text-3xl border-b-2 border-blue-600">Dashboard</h2>
        </div>
        <div class="flex flex-wrap -mx-4">
            <!-- Card for pending pickups -->
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" onclick="window.location.href='assignedtask.php'">
                <div class="bg-white rounded-lg shadow-md p-6 hover:bg-red-100">
                    <h2 class="text-lg font-semibold mb-4">Pending Pickups</h2>
                    <div class="flex justify-between">
                        <div class="text-gray-500">Total</div>
                        <div class="text-2xl font-bold"><?php echo $row1 ?></div>
                    </div>
                </div>
            </div>

            <!-- Card for collected pickups -->
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" onclick="window.location.href='workhistory.php'">
                <div class="bg-white rounded-lg shadow-md p-6 hover:bg-green-100">
                    <h2 class="text-lg font-semibold mb-4">Collected Pickups</h2>
                    <div class="flex justify-between">
                        <div class="text-gray-500">Total</div>
                        <div class="text-2xl font-bold"><?php echo $row2 ?></div>
                    </div>
                </div>
            </div>

            <!-- Card for cancelled pickups -->
            <div class="w-full md:w-1/2 lg:w-1/3 px-4 mb-8" onclick="window.location.href='workhistory.php'">
                <div class="bg-white rounded-lg shadow-md p-6 hover:bg-gray-200">
                    <h2 class="text-lg font-semibold mb-4">Cancelled Pickups</h2>
                    <div class="flex justify-between">
                        <div class="text-gray-500">Total</div>
                        <div class="text-2xl font-bold"><?php echo $row3 ?></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
</body>

</html>