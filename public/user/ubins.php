<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bins</title>
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <style>
        .dataTables_filter input {
            background-color: green;
        }

        .dataTables_wrapper {
            padding: 20px;
        }
    </style>
</head>

<body>
    <?php include('userdashlayout.php');

    ?>
    <div class="h-full w-full p-5 ml-14 md:ml-64 ">
        <div class="w-full my-5">
            <h2 class="text-3xl border-b-2 border-blue-600">Active Bins</h2>
        </div>
        <div class="w-full px-4 mb-8 ">
            <div class="bg-violet-100 rounded-lg shadow-md p-6">
                <div class="container mx-auto px-4 py-8">
                    <div class="w-full flex flex-col">
                        <div class="flex-grow overflow-auto">
                            <table id="myTable" class="w-full py-5 table-auto ">
                                <thead>
                                    <tr class="bg-green-100 ">
                                        <th class="border-gray-400 mx-auto text-left">Bin ID</th>
                                        <th class="border-gray-400 text-left">Location</th>
                                        <th class="border-gray-400 text-left">Category</th>
                                        <th class="border-gray-400 text-left">Capacity</th>
                                        <th class="border-gray-400 text-left">Status</th>
                                        <th class="border-gray-400 text-left">Acton</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $qry = "SELECT * FROM garbagebins WHERE bin_status = 'use'";
                                    $result = mysqli_query($con, $qry);
                                    while ($d = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr class="">
                                            <td class="border-gray-400 py-2 w-1/5"><?php echo $d['bin_id'] ?></td>
                                            <td class="border-gray-400 py-2 w-1/5"><?php echo $d['location'] ?></td>
                                            <td class="border-gray-400 py-2 w-1/5"><?php echo $d['type'] ?></td>
                                            <td class="border-gray-400 py-2 w-1/5"><?php echo $d['capacity'] ?></td>
                                            <th class="border-gray-400 text-left"><?php echo $d['bin_status'] ?></th>
                                            <td class="border-gray-400 mt-3 px-4 w-1/5">
                                                <a href="complainbin.php?binid=<?php echo $d['bin_id'] ?>" class="text-indigo-600 hover:text-indigo-900">
                                                    Add Complain
                                                </a>

                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "language": {
                    "search": "Search:",
                    "lengthMenu": "Show _MENU_ entries",
                    "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                    "paginate": {
                        "first": "First",
                        "last": "Last",
                        "next": "Next",
                        "previous": "Previous"
                    }
                }
            });
        });
    </script>
</body>

</html>