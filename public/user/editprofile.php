<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include('userdashlayout.php'); ?>
    <?php
    $username = $_SESSION['username'];
    $qry = "SELECT * FROM users WHERE user_name = '$username'";
    $result = mysqli_query($con, $qry);
    $data = mysqli_fetch_assoc($result);
    $userid = $data['user_id'];
    ?>
    <div class="h-full w-full p-5 ml-14 md:ml-64 ">
        <div class="w-full my-5">
            <h2 class="text-3xl border-b-2 border-blue-600">Change Profile</h2>
        </div>
        <div class="flex justify-center">
            <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                <form name="form" class="px-8 pt-2 pb-8 mb-4 bg-white rounded" method="post" action="" onsubmit="return validate();" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="name">
                            Name
                        </label>
                        <input value="<?php echo $data['user_name']; ?>" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="name" name="name" placeholder="Name" type="text" required />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Email
                        </label>
                        <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="email" value="<?php echo $data['email']; ?>" name="email" type="email" placeholder="Email" required />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="address">
                            Address
                        </label>
                        <input value="<?php echo $data['address']; ?>" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="address" name="address" placeholder="Address" type="text" required />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="contact">
                            Contact Number
                        </label>
                        <input value="<?php echo $data['contact']; ?>" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="contact" name="contact" placeholder="Contact Number" type="text" required />
                    </div>
                    <div class="mb-4">
                        <div class="w-full h-1/2 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none">
                            <img src="<?php echo $data['profilepic']; ?>" alt="">
                        </div>
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Profile Picture
                        </label>
                        <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="file" name="photo" id="uploadfile">
                        <div class="w-full h-1/2 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none">
                            <img src="<?php echo $folder ?>" alt="">
                        </div>
                    </div>
                    <div class="mb-6 text-center">
                        <input type="submit" value="Update Profile" class="btn w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700" name="updateprofile" onclick="return confirm('Are You Sure To Edit Profile ?')">
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>

</html>

<?php
if (isset($_POST['updateprofile'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $addr = $_POST['address'];
    $contact = $_POST['contact'];

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $filename = $_FILES["photo"]["name"];
        $tempname = $_FILES["photo"]["tmp_name"];
        $folder = "profilepic/" . $filename;
        move_uploaded_file($tempname, $folder);

        $qry = "UPDATE users SET user_name='$name',email = '$email',address='$addr',contact='$contact',profilepic='$folder' WHERE user_id=$userid ";
        if ($reslt = mysqli_query($con, $qry)) {

            echo '<script> alert("Profile Updated Sucessfully,Session Expired!!!"); </script> ';
            session_unset();
            session_destroy();
            echo '<script>window.location.href = "ulogin.php";</script>';
        } else {
            echo '<script> alert("Unable to Update Profile"); </script> ';
        }
    } else {
        $qry = "UPDATE users SET user_name='$name',email = '$email',address='$addr',contact='$contact' WHERE user_id=$userid ";
        if ($reslt = mysqli_query($con, $qry)) {

            echo '<script> alert("Profile Updated Sucessfully,Session Expired!!!"); </script> ';
            session_unset();
            session_destroy();
            echo '<script>window.location.href = "ulogin.php";</script>';
        } else {
            echo '<script> alert("Unable to Update Profile"); </script> ';
        }
    }
}
?>
</body>

</html>