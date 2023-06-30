<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints Report</title>
    <link rel="stylesheet" href="../style.css">
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables CSS and JavaScript files -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <?php include('driverdashlayout.php') ?>
    <?php

    // $dqry = "SELECT * FROM assigned_bin WHERE assigned_driver = '$driver'";
    $dqry = "SELECT * FROM assigned_bin WHERE assigned_driver = '$driver' AND assign_status='none' ";
    $dres = mysqli_query($con, $dqry);
    ?>
    <div class="h-full w-full p-5 ml-14 md:ml-64 ">
        <div class="w-full p-5 ">
            <h2 class="text-3xl border-b-2 border-blue-600">Complain Reports</h2>
        </div>
        <div class="container max-w-full px-4 mx-auto sm:px-8">
            <!-- popup-form -->

            <div class="py-8 ">
                <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                        <table class="min-w-full leading-normal" id="myTable">
                            <thead>
                                <tr class="bg-gray-400">
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase  border-b border-gray-200">
                                        #
                                    </th>

                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase  border-b border-gray-200">
                                        Assigned Date
                                    </th>

                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase border-b border-gray-200">
                                        Assigned Driver
                                    </th>

                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase border-b border-gray-200">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $a = 1;
                                while ($data = mysqli_fetch_assoc($dres)) {
                                ?>
                                    <tr>
                                    <td class="px-5 py-5 text-sm border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $a ?>
                                            </p>
                                            </p>
                                        </td>
                                        
                                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $data['assignment_date'] ?>
                                            </p>
                                            </p>
                                        </td>


                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $data['assigned_driver'] ?>

                                            </p>
                                        </td>


                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <a href="manageassigntask.php?aid=<?php echo $data['assign_id'] ?>" class="px-3 py-1 font-semibold leading-tight text-green-500">View Details</a>
                                            </p>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <script>
                            $(document).ready(function() {
                                // Initialize the DataTable
                                $('#myTable').DataTable();
                            });
                        </script>
                    </div>
                </div>

            </div>




        </div>
    </div>
    </div>