<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bin Complaint Form</title>
    <link rel="stylesheet" href="../style.css">
</head>
<?php include('userdashlayout.php') ?>

<body class="bg-gray-100">
    <?php
    $binid = $_GET['binid'];
    $con = mysqli_connect('localhost', 'root', '', 'gcs_database');
    if ($con === false) {
        die("Eroor connection");
    }
    $qry = "SELECT * FROM garbagebins WHERE bin_id = $binid";
    $result = mysqli_query($con, $qry);
    $row = mysqli_fetch_assoc($result);
    $binid= $row['bin_id'] ?>
    ?>
    <div class=" w-full h-full p-5 ml-14 md:ml-64">
        <div class="w-full">
            <h2 class="text-3xl border-b-2 border-blue-600">Complain Bin</h2>
        </div>
        <div class="w-1/2 md:w-96 md:max-w-full mx-auto">
            <div class="px-4 py-8 rounded-lg shadow-md p-6 mb-6">
                <div class="">
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2 ">Bin ID</label>
                        <span class=" block border border-gray-300 p-2 w-full bg-violet-100"><?php echo $row['bin_id'] ?></span>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 font-semibold mb-2 ">Location</label>
                        <span class=" block border border-gray-300 p-2 w-full bg-violet-100"><?php echo $row['location'] ?></span>

                    </div>
                    <div class="mb-4">
                        <label for="capacity" class="block text-gray-700 font-semibold mb-2">Bin Type</label>
                        <span class=" block border border-gray-300 p-2 w-full bg-violet-100"><?php echo $row['type'] ?></span>

                    </div>
                    <div class="mb-4">
                        <label for="capacity" class="block text-gray-700 font-semibold mb-2">Capacity</label>
                        <span class=" block border border-gray-300 p-2 w-full bg-violet-100"><?php echo $row['capacity'] ?></span>

                    </div>
                </div>
                <form class="" method="post" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label for="complaint_message" class="block text-gray-700 font-semibold mb-2">Complaint Message</label>
                        <textarea id="complaint_message" name="complaint_message" class="border border-gray-300 p-2 w-full h-24" placeholder="Enter your complaint message" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="bin_picture" class="block text-gray-700 font-semibold mb-2">Upload Bin Picture</label>
                        <input id="bin_picture" type="file" name="bin_photo" class="border border-gray-300 p-2 w-full" required>
                    </div>
                    <div class="text-center">
                        <input type="submit" value="Submit Complaint" name="submit" class="w-full bg-blue-500 text-white font-semibold px-4 py-2 rounded hover:bg-blue-600">
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
<?php
if(isset($_POST['submit']))
{
    $filename = $_FILES["bin_photo"]["name"];
    $tempname = $_FILES["bin_photo"]["tmp_name"];
    $folder = "binpic/" . $filename;
    move_uploaded_file($tempname, $folder);

    $comp_msg = $_POST['complaint_message'];

    // $qry2 = "INSERT INTO complaints VALUES(1,$uid,$binid,'$comp_msg','$folder')";
    $qry2 = "INSERT INTO complaints (user_id, bin_id, description, bin_picture, timestamp) VALUES ($uid, $binid, '$comp_msg', '$folder', CURRENT_TIMESTAMP)";

    if(mysqli_query($con,$qry2))
    {
        echo '<script> alert("Bin Complain Sucessfully"); </script> ';
        echo '<script>window.location.href = "userdashboard.php";</script>';
    }else{
        echo '<script> alert("Error:Please try agian."); </script>';
    }
}
?>