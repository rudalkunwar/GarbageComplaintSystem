<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints Report</title>
    <link rel="stylesheet" href="../style.css">

</head>

<body class="">
    <?php $asinid = $_GET['aid']; ?>

    <?php include('driverdashlayout.php') ?>
    <?php
    $aqry = "SELECT * FROM assigned_bin a JOIN complaints c ON a.complain_id = c.complain_id WHERE assign_id = $asinid";
    $res =  mysqli_query($con, $aqry);
    $data = mysqli_fetch_assoc($res);
    $uid = $data['user_id'];

    // For bin details
    $binid = $data['bin_id'];
    $uquery = "SELECT* FROM garbagebins WHERE bin_id = $binid";
    $bres = mysqli_query($con, $uquery);
    $bdata = mysqli_fetch_assoc($bres);


    //For user details
    $uquery = "SELECT user_name,email,contact from users WHERE user_id = $uid";
    $ures = mysqli_query($con, $uquery);
    $udata = mysqli_fetch_assoc($ures);
    $useremail = $udata['email'];
    ?>
    <div class="h-full w-full p-5 ml-14 md:ml-64 ">
        <div class="w-full p-5 ">
            <h2 class="text-3xl border-b-2 border-blue-600">Complain Details</h2>
        </div>
        <div class="container max-w-full px-4 mx-auto sm:px-8">

            <!-- Repeat the following code block for each data item -->
            <div class="rounded-lg shadow mb-4">
                <div class="p-4 ">
                    <table class="min-w-full">
                        <tbody>
                            <tr>
                                <th class="px-5 py-3 text-lg font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Complained Bin Picture
                                </th>
                                <td class="px-5 py-5 text-lg bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap w-9/12 pb-[50%] relative">
                                        <img src="../user/<?php echo $data['bin_picture']; ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 py-3 text-lg font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Report Date
                                </th>
                                <td class="px-5 py-3 text-lg bg-white border-b border-gray-200">
                                    <?php echo $data['timestamp']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 py-3 text-lg font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Bin ID
                                </th>
                                <td class="px-5 py-3 text-lg bg-white border-b border-gray-200">
                                    <?php echo $data['bin_id']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 py-3 text-lg font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Bin Location
                                </th>
                                <td class="px-5 py-3 text-lg bg-white border-b border-gray-200 text-yellow-500">
                                    <?php echo $bdata['location']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 py-3 text-lg font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    User Name
                                </th>
                                <td class="px-5 py-3 text-lg bg-white border-b border-gray-200">
                                    <?php echo $udata['user_name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 py-3 text-lg font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Email
                                </th>
                                <td class="px-5 py-3 text-lg bg-white border-b border-gray-200">
                                    <?php echo $udata['email']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 py-3 text-lg font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    User Contact
                                </th>
                                <td class="px-5 py-3 text-lg bg-white border-b border-gray-200">
                                    <?php echo $udata['contact']; ?>
                                </td>
                            </tr>

                            <tr>
                                <th class="px-5 py-3 text-lg font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    User Complain Message
                                </th>
                                <td class="px-5 py-3 text-lg bg-white border-b border-gray-200">
                                    <?php echo $data['description']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 py-3 text-lg font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Status
                                </th>
                                <td class="px-5 py-3 text-lg bg-white border-b border-gray-200">
                                    <?php echo $data['complain_status']; ?>
                                </td>
                            </tr>
                            <!-- Add any additional data rows as needed -->
                        </tbody>
                    </table>
                </div>
                <div class="py-3 bg-green-200">
                    <div class="text-center">
                        <p class="font-normal text-3xl uppercase">Tracking History</p>
                    </div>
                </div>
                <div class="bg-gray-100">
                    <div class="">
                        <table class="min-w-full">
                            <tbody>
                                <tr>
                                    <th class="px-5 py-3 text-lg font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Assigned Date
                                    </th>
                                    <td class="px-5 py-3 text-lg bg-white border-b border-gray-200">
                                        <?php echo $data['assignment_date']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="px-5 py-3 text-lg font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Assigned Driver
                                    </th>
                                    <td class="px-5 py-3 text-lg bg-white border-b border-gray-200">
                                        <?php echo $data['assigned_driver']; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="px-5 py-3 text-lg font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Admin Update Message
                                    </th>
                                    <td class="px-5 py-3 text-lg bg-white border-b border-gray-200">
                                        <?php echo $data['assign_des']; ?>
                                    </td>
                                </tr>
                                <!-- Add any additional data rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="py-3">
                    <div class="text-center">
                        <button onclick="openPopupForm(<?php echo $data['assign_id']; ?>,<?php echo $data['complain_id']; ?>,'<?php echo $useremail ?>')" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Submit Work</button>
                    </div>
                </div>
            </div>
            <!-- End of code block -->

        </div>

    </div>
    </div>


    <div id="popupForm" class="hidden">
        <div class="fixed inset-0 z-10 flex items-center justify-center backdrop-blur-md bg-gray-600 bg-opacity-40">
            <div class=" w-2/5 bg-pink-100 rounded-md shadow-lg">
                <div class="px-10 py-5 w-full ">
                    <div class="flex justify-between">
                        <h3 class="text-gray-900 text-xl font-semibold">Update Complain</h3>
                        <span onclick="closePopupForm()"> <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="default-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button> </span>
                    </div>
                    <form method="POST" action="" enctype="multipart/form-data">
                        <input name="assign_id" id="assignid" type="hidden" value="">
                        <input name="complain_id" id="complainid" type="hidden" value="">
                        <input name="user_email" id="useremail" type="hidden" value="">
                        <select id="complain_status" name="collection_status" class="w-1/2  px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500" required>
                            <option value="Completed">Accept</option>
                            <option value="Rejected">Reject</option>
                        </select>
                        <div class="my-4">
                            <label for="updateMessage" class="block text-gray-700 font-medium mb-2">Update Message:</label>
                            <textarea name="description" id="updateMessage" class="w-full px-4 py-2 rounded-lg border focus:ring-blue-500" rows="6" required></textarea>
                        </div>
                        <div class="flex justify-between my-4">
                            <label for="" class="block text-gray-700 font-medium mb-2">Completed Work Picture</label>
                            <input id="bin_picture" type="file" name="bin_photo" class="w-1/2  px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="flex justify-between my-4">
                            <label for="date" class="block text-gray-700 font-medium mb-2">Completed Date:</label>
                            <input type="date" id="date" name="complete_date" class="w-1/2  px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="text-right mt-2 mb-5">
                            <input type="submit" value="Submit" name="update" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openPopupForm(x, y, z) {
            document.getElementById('assignid').value = x;
            document.getElementById('complainid').value = y;
            document.getElementById('useremail').value = z;
            const popupForm = document.getElementById('popupForm');
            popupForm.classList.remove('hidden');
        }

        function closePopupForm() {
            const popupForm = document.getElementById('popupForm');
            popupForm.classList.add('hidden');
        }
    </script>
    <!-- To updload picture -->

    <?php
    $con = mysqli_connect('localhost', 'root', '', 'project_gcs');
    if (isset($_POST['update'])) {
        $collectionstatus = $_POST['collection_status'];
        $user_email = $_POST['user_email'];
        $assign = $_POST['assign_id'];
        $complain = $_POST['complain_id'];
        $drivermsg = $_POST['description'];
        $completed_date = $_POST['complete_date'];
        //for photo
        $filename = $_FILES["bin_photo"]["name"];
        $tempname = $_FILES["bin_photo"]["tmp_name"];
        $folder = "completedtask/" . $filename;
        move_uploaded_file($tempname, $folder);

        // if collected
        $qrya = "INSERT INTO collections (complain_id,assign_id,collected_picture,collection_des,collection_date,collection_status) 
        VALUES($complain,$assign,'$folder','$drivermsg','$completed_date','$collectionstatus')";

        // if rejected
        $qryna = "INSERT INTO collections (complain_id,assign_id,collection_des,collection_status) 
        VALUES($complain,$assign,'$drivermsg','Rejected by Driver')";

        if (strcmp($collectionstatus, 'Rejected') == 0) {
            if (mysqli_query($con, $qryna)) {
                

                //update driver status
                $updriver = "UPDATE drivers SET driver_status = 'Free' WHERE driver_id = $driverid";
                mysqli_query($con, $updriver);

                //update complain status
                $rsql = "UPDATE complaints set complain_status = 'Rejected by Driver.' WHERE complain_id = $complain";
                mysqli_query($con, $rsql);

                echo '<script>alert("Collection Rejected")</script>';
            }
        } 
        else 
        {
            if (mysqli_query($con, $qrya)) {

                //update driver status
                $updriver = "UPDATE drivers SET driver_status = 'Free' WHERE driver_id = $driverid";
                mysqli_query($con, $updriver);

                //update assign status
                $upassign = "UPDATE assigned_bin SET assign_status = 'Completed' WHERE assign_id =  $assign ";
                mysqli_query($con,  $upassign);

                //update complain status
                $rsql2 = "UPDATE complaints set complain_status = 'Completed' WHERE complain_id = $complain";
                mysqli_query($con, $rsql2);

                //send mail to the user 
                $to = $email;
                $message = "I hope this email finds you well. I am writing to inform you that I have successfully collected the garbage bins from your address as per your complaint registered in our system. It is my pleasure to provide you with an update on the status of your request.";
                $subject = "New Garbage Complaint System";
                $header = "From:drivergcs@gmail.com";
                if (mail($to, $subject, $message, $header)) {
                    echo '<script>alert("Bin Collection Completed")</script>';
                }
                header('location:driverdashboard.php');
            }
        }
    }
    $con->close();
    ?>

</body>

</html>