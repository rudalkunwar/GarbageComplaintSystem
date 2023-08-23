<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints Report</title>
    <link rel="stylesheet" href="../style.css">
    <!-- JQuery -->

    <!-- DataTables CSS and JavaScript files -->
    <link rel="stylesheet" type="text/css" href="../../node_modules/datatables.net-dt/css/jquery.dataTables.min.css">

</head>

<body>
    <?php include('userdashlayout.php') ?>
    <?php
    if (isset($_GET['nid'])) {
        $nid = $_GET['nid'];
        $nqry = "UPDATE notification set status=1 WHERE id=$nid";
        mysqli_query($con, $nqry);
    }
    ?>
    <?php
    // $asqry = "SELECT * FROM assigned_bin a RIGHT JOIN complaints c ON a.complain_id = c.complain_id WHERE c.complain_status ='Rejected' OR c.complain_status ='Rejected by Driver.'";

    $joinqry = "SELECT DISTINCT * FROM complaints C
    JOIN garbagebins b ON c.bin_id = b.bin_id
    WHERE c.user_id = $userid
    AND (c.complain_status ='Rejected' OR c.complain_status ='Rejected by Driver.')
    ";
    $r2 = mysqli_query($con, $joinqry);
    ?>
    <div class="h-full w-full p-5 ml-14 md:ml-64 ">
        <div class="w-full p-5 ">
            <h2 class="text-3xl border-b-2 border-blue-600">Complain Reports</h2>
        </div>
        <div class="container max-w-full px-4 mx-auto sm:px-8">
            <div class="py-8 ">
                <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                    <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                        <table class="min-w-full leading-normal" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Report Date
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Bin Report Picture
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Bin ID
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Location
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Complain Message
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Status
                                    </th>
                                    <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                        Action
                                    </th>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = mysqli_fetch_assoc($r2)) {
                                ?>
                                    <tr>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $data['timestamp'] ?>
                                            </p>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap w-full h-24 pb-[50%] relative">
                                                <img src="<?php echo $data['bin_picture'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $data['bin_id'] ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $data['location'] ?>

                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $data['description'] ?>

                                            </p>
                                        </td>

                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo $data['complain_status'] ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm border-b border-gray-200">
                                            <a href="usercomplaindetail.php?complainid=<?php echo $data['complain_id'] ?>&userid=<?php echo $userid; ?>" class="px-2 py-3 bg-green-300  rounded-md text-center">
                                                View
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
                        <script type="text/javascript" src="../../node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
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
</body>

</html>