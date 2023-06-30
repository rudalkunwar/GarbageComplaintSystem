<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints Report</title>
    <link rel="stylesheet" href="../style.css">

</head>

<body>
    <?php
    $comid = $_GET['complainid'];
    $uid = $_GET['userid'];
    ?>

    <?php include('userdashlayout.php') ?>
    <?php
    $uqry = "SELECT * FROM assigned_bin a RIGHT JOIN complaints c ON a.complain_id = c.complain_id WHERE c.complain_id= $comid";
    $res =  mysqli_query($con, $uqry);
    $data = mysqli_fetch_assoc($res);
    $assignid = $data['assign_id'];

    $uquery = "SELECT user_name,email,contact from users WHERE user_id = $uid";
    $ures = mysqli_query($con, $uquery);
    $udata = mysqli_fetch_assoc($ures);

    // from driver on collection
    $cqry = "SELECT * FROM collections WHERE complain_id = $comid";
    $cres = mysqli_query($con, $cqry);
    $cdata = mysqli_fetch_assoc($cres);
    ?>
    <div class="h-full w-full p-5 ml-14 md:ml-64 ">
        <div class="w-full p-5 ">
            <h2 class="text-3xl border-b-2 border-blue-600">Complain Details</h2>
        </div>
        <div class="container max-w-full px-4 mx-auto sm:px-8">

            <!-- Repeat the following code block for each data item -->
            <div class="bg-white rounded-lg shadow mb-4">
                <div class="p-4">
                    <table class="min-w-full">
                        <tbody>
                            <tr>
                                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Complained Bin Picture
                                </th>
                                <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap w-9/12 pb-[50%] relative">
                                        <img src="../user/<?php echo $data['bin_picture']; ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Report Date
                                </th>
                                <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                                    <?php echo $data['timestamp']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Bin ID
                                </th>
                                <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                                    <?php echo $data['bin_id']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    User Name
                                </th>
                                <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                                    <?php echo $udata['user_name']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Email
                                </th>
                                <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                                    <?php echo $udata['email']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    User Contact
                                </th>
                                <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                                    <?php echo $udata['contact']; ?>
                                </td>
                            </tr>

                            <tr>
                                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Complain Message
                                </th>
                                <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                                    <?php echo $data['description']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                    Status
                                </th>
                                <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                                    <?php echo $data['complain_status']; ?>
                                </td>
                            </tr>
                            <!-- Add any additional data rows as needed -->
                        </tbody>
                    </table>
                </div>
                <?php
                if (empty($assignid)) {
                    $assignid = 0;
                }
                if ($assignid != 0) {
                    $cqry = "SELECT * FROM collections WHERE assign_id = $assignid";
                    $cres = mysqli_query($con, $cqry);
                    $cdata = mysqli_fetch_assoc($cres);
                ?>
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
                                        <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Assigned Date
                                        </th>
                                        <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                                            <?php echo $data['assignment_date']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Assigned Driver
                                        </th>
                                        <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                                            <?php echo $data['assigned_driver']; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php
                    if (empty(!$cdata)) {
                    ?>
                        <div class="py-3 bg-green-200">
                            <div class="text-center">
                                <p class="font-normal text-3xl uppercase">Collection Report</p>
                            </div>
                        </div>
                        <div class="bg-gray-100">
                            <div class="">
                                <table class="min-w-full">
                                    <tbody>
                                        <tr>
                                            <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                Completed Date
                                            </th>
                                            <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                                                <?php
                                                if ($cdata !== null) {
                                                    echo $cdata['collection_date'];
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                Driver Message
                                            </th>
                                            <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                                                <?php
                                                if ($cdata !== null) {
                                                    echo $cdata['collection_des'];
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                Collected Picture
                                            </th>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap w-9/12 pb-[50%] relative">

                                                    <img src="../driver/<?php if ($cdata !== null) {
                                                                            echo $cdata['collected_picture'];
                                                                        } ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                                                </p>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                                Collection Status
                                            </th>
                                            <td class="px-5 py-3 text-sm bg-white border-b border-gray-200">
                                                <?php
                                                if ($cdata !== null) {
                                                    echo $cdata['collection_status'];;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <!-- Add any additional data rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>

        </div>


    </div>

    </div>
    </div>
</body>

</html>