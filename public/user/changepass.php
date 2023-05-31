<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <?php include('userdashlayout.php'); ?>

    <div class="h-full w-full p-5 ml-14 md:ml-64 ">
        <div class="w-full my-5">
            <h2 class="text-3xl border-b-2 border-blue-600">Change Password</h2>
        </div>
        <div class="flex justify-center">
            <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                <form name="form" class="px-8 pt-2 pb-8 mb-4 bg-white rounded" method="post" action="" onsubmit="return validate();">
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="old-pass">
                            Old Password
                        </label>
                        <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="old-pass" name="oldpass" type="password" placeholder="Old Password" required />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="new-pass">
                            New Password
                        </label>
                        <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="new-pass" name="newpass" type="password" placeholder="New Password" required />
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="cnew-pass">
                            Conform New Password
                        </label>
                        <input class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" id="cnew-pass" name="cnewpass" type="password" placeholder="Conform New Password" required />
                    </div>
                    <div class="mb-6 text-center">
                        <input type="submit" value="Update Password" class="btn w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700" name="updatepass">
                    </div>
                </form>
            </div>

        </div>
    </div>
    <script>
        function validate() {
            var pass = document.forms['form']['new-pass'].value;
            var cpass = document.forms['form']['cnew-pass'].value;
            // if (cpass.length < 8) {
            //     alert('Password Must be 8 character long');
            //     return false;
            // }
            if (pass != cpass) {
                alert('New Password doesnot match');
                return false;
            }

        }
    </script>
</body>

</html>

<?php
if (isset($_POST['updatepass'])) {
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $cnewpass = $_POST['cnewpass'];

    $qry1  = "SELECT id FROM users WHERE password=md5('$oldpass')";
    if ($reslt = mysqli_query($con, $qry1)) {
        if (mysqli_num_rows($reslt) > 0) {
            $qry = "UPDATE users SET password = md5('$newpass') WHERE password = md5('$oldpass')";
            $result = mysqli_query($con, $qry);
            if ($result) {
                echo '<script> alert("Password Updated Sucessfully"); </script> ';
                echo '<script>window.location.href = "userdashboard.php";</script>';
            }
        } else {
            echo '<script> alert("Old password doesnot Match.Please Try again"); </script> ';
        }
    }
}
?>