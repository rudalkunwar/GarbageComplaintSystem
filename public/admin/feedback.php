<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="flex">
        <?php include('dashlayout.php'); ?>

        <div class="h-full w-full p-5 ml-14 md:ml-64 ">
            <!-- Feedback data table -->
            <div class="w-full p-5 ">
                <h2 class="text-3xl border-b-2 border-blue-600">Users Feedbacks</h2>
            </div>
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Timestamp</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 bg-gray-100 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM feedback";
                    $res = mysqli_query($con, $sql);
                    while ($data = mysqli_fetch_assoc($res)) {
                        $timestamp = $data['timestamp']; 
                        $date = date('F j, Y', strtotime($timestamp));
                    ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap"> <?php echo $date ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $data['name'] ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $data['email'] ?></td>
                            <td class="px-6 py-4 whitespace-wrap"><?php echo $data['message'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>