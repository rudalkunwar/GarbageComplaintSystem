<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints Report</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" type="text/css" href="../../node_modules/datatables.net-dt/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="flex">
        <?php include('dashlayout.php') ?>
        <?php
        $asqry = "SELECT * FROM assigned_bin a RIGHT JOIN complaints c ON a.complain_id = c.complain_id WHERE c.complain_status <> 'new'";
        $res = mysqli_query($con, $asqry);
        ?>
        <div class="h-full w-full p-5 ml-14 md:ml-64">
            <div class="w-full p-5 ">
                <h2 class="text-3xl border-b-2 border-blue-600">Complain Histories</h2>
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
                                            Complain Message
                                        </th>
                                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Status
                                        </th>
                                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Details
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($data = mysqli_fetch_assoc($res)) {
                                    ?>
                                        <tr>
                                            <input id="aidpop" type="hidden" value="<?php echo $data['assign_id']; ?>">
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo $data['timestamp']; ?>
                                                </p>
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap w-full h-24 pb-[50%] relative">
                                                    <img src="../user/<?php echo $data['bin_picture']; ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo $data['bin_id']; ?>
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo $data['description']; ?>

                                                </p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo $data['complain_status']; ?>
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 text-sm border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">


                                                    <a href="detailscomplain.php?cid=<?php echo $data['complain_id'] ?>" class="px-2 py-3 bg-green-300  rounded-md text-black">View</a>
                                                </p>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="../../node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>