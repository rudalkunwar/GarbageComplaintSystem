<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include 'driverdashlayout.php'; ?>
    <div class="h-full w-full p-5 ml-14 md:ml-64">
        <div class="w-full p-5 border-b-2 border-blue-600">
            <h2 class="text-3xl  ">Notifications</h2>
        </div>
        <div class="w-full p-5 border">
            <div class="bg-yellow-300 text-xl px-2"><span>Recent Notifications</span></div>
            <?php
            // Query to retrieve notifications
            $query = "SELECT * FROM notification WHERE to_id=$driverid AND status=0";
            $result = mysqli_query($con, $query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="border p-3 mb-4">
                        <div class="flex mb-4">
                            <div>
                                <h3><?php echo $row['time']; ?></h3>
                            </div>
                            <div class="ml-4 flex">
                                <h3 class="text-xl"><?php echo $row['message']; ?></h3>
                                <div class="flex mb-4">
                                    <a href="assignedtask.php?nid=<?php echo $row['id']; ?>" class="px-2 my-4 mx-2 rounded bg-green-400 ">Visit.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <h3 class="px-2">No Notifications</h3>
            <?php
            }
            ?>
        </div>

        <div class="w-full p-5 border">
            <div class="bg-blue-300 text-xl px-2"><span>Past Notifications</span></div>
            <?php
            // Query to retrieve notifications
            $query = "SELECT * FROM notification WHERE to_id=$driverid AND status=1";
            $result = mysqli_query($con, $query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="border p-3 mb-4">
                        <div class="flex mb-4">
                            <div>
                                <h3><?php echo $row['time']; ?></h3>
                            </div>
                            <div class="ml-4 flex">
                                <h3 class="text-xl"><?php echo $row['message']; ?></h3>
                                <div class="flex mb-4">
                                    <a href="assignedtask.php?nid=<?php echo $row['id']; ?>" class="px-2 my-4 mx-2 rounded bg-green-400 ">Visit.</a>
                                    <a href="deletenotification.php?nid=<?php echo $row['id']; ?>" class="px-2 my-4 mx-2 rounded bg-red-500 text-white ">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <h3 class="px-2">No Notifications</h3>
            <?php
            }
            ?>
        </div>
    </div>

    </div>
</body>

</html>