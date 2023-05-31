<?php
$eid = $_GET['eid'];
$con = mysqli_connect('localhost', 'root', '', 'gcs_database');
if ($con === false) {
    die("Eroor connection");
}
$qry = "SELECT * FROM garbagebins WHERE id=$eid";
$result = mysqli_query($con, $qry);
$updata = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit bins</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include('../layout/dashlayout.php') ?>
    <div class="h-full w-full p-5 ml-14 md:ml-64 ">
        <div class="flex justify-center">
            <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                <h3 class="pt-4 text-2xl text-center ">Update Bin</h3>
                <form class="px-8 pt-2 pb-8 mb-4 bg-white rounded" method="post" action="">

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="binid">
                            Bin Id
                        </label>
                        <input value="<?php echo $updata['id'] ?>" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="binid" name="binid" type="text" placeholder="Bin Id" required />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="bintype">Bin Type</label>
                        <select class="block w-full px-4 py-2 rounded-md border shadow focus:outline-none focus:shadow-outline" name="bintype" id="bintype">
                            <option value="Organic">Organic</option>
                            <option value="Inorganic">Inorganic</option>
                            <option value="Metallic">Metallic</option>

                        </select>

                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="capacity">
                            Capacity
                        </label>
                        <input value="<?php echo $updata['capacity'] ?>" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="capacity" name="capacity" type="text" placeholder="Capacity" required />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="location">
                            Location
                        </label>
                        <input value="<?php echo $updata['location'] ?>" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="location" name="location" type="text" placeholder="Address" required />
                    </div>

                    <div class="mb-6 text-center">
                        <input type="submit" value="Update Bin" class="btn w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700" name="addbin">
                    </div>
                </form>
            </div>
        </div>

</body>

</html>
<?php
if (isset($_POST['addbin'])) {
    $id = $_POST['binid'];
    $type = $_POST['bintype'];
    $capacity = $_POST['capacity'];
    $location = $_POST['location'];

    $qry = "UPDATE garbagebins set id=$bin_id,type='$type',location='$location',capacity='$capacity' WHERE id=$eid";
    if (mysqli_query($con, $qry)) {


        // After processing the form and performing necessary actions
        $_SESSION['message'] = "Bin Updated successfully!";
        echo '<script>window.location.href = "bins.php";</script>';
    }
    mysqli_close($con);
}
?>