<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garbage Bins</title>
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
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

<body">
    <div class="flex">

    <?php include('dashlayout.php')
    ?>
    <div class="h-full w-full p-5 ml-14 md:ml-64 ">
        <div class="w-full p-5">
            <h2 class="text-3xl border-b-2 border-blue-600">Bins</h2>
        </div>
        <div class="w-full px-4 mb-8 ">
            <div class="bg-gray-200 rounded-lg shadow-md p-6">
                <div class="flex justify-between p-2">
                    <div>
                        <a href="addbin.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded">Add Bin</a>
                    </div>
                    <?php if (isset($_SESSION['message'])) {
                        $dmsg = $_SESSION['message'];
                    ?>
                        <div class="bg-red-100 border border-red-400 text-red-700 text-center flex px-4 py-2 justify-between w-1/5 rounded relative" role="alert">
                            <span class="block sm:inline"><?php echo $dmsg ?></span>
                        </div>
                    <?php
                        unset($_SESSION['message']);
                    }
                    ?>
                </div>
                <div class="container mx-auto px-4 py-8">
                    <div class="w-full flex flex-col">
                        <div class="flex-grow overflow-auto">
                            <table id="myTable" class="w-full py-5 table-auto ">
                                <thead>
                                    <tr class="bg-green-100 ">
                                        <th class="border-gray-400 mx-auto text-left">Bin ID</th>
                                        <th class="border-gray-400 text-left">Category</th>
                                        <th class="border-gray-400 text-left">Capacity</th>
                                        <th class="border-gray-400 text-left">Location</th>
                                        <th class="border-gray-400 text-left">Acton</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $qry = " SELECT * FROM garbagebins ";
                                    $result = mysqli_query($con, $qry);
                                    while ($d = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr class="">


                                            <td class="border-gray-400 py-2 w-1/5"><?php echo $d['bin_id'] ?></td>
                                            <td class="border-gray-400 py-2 w-1/5"><?php echo $d['type'] ?></td>
                                            <td class="border-gray-400 py-2 w-1/5"><?php echo $d['capacity'] ?></td>
                                            <td class="border-gray-400 py-2 w-1/5"><?php echo $d['location'] ?></td>
                                            <td class="border-gray-400 mt-3 px-4 w-1/5">
                                                <a href="editbin.php?editid=<?php echo $d['bin_id'] ?>" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                                <a onclick="showDelete(<?php echo $d['bin_id'] ?>);" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded cursor-pointer">Delete</a>
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
    <div id="deletebox" class="hidden fixed inset-0 bg-opacity-40 backdrop-blur-sm">
        <div class="flex h-full justify-center items-center">
            <div class="flex flex-col p-10 rounded-lg shadow bg-white">
                <div class="text-center">
                    <h2 class="font-semibold text-gray-800">Are you sure want to delete?</h2>
                </div>
                <div class="flex items-center mt-6">
                    <button onclick="hideDelete()" class="flex-1 px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
                        Cancel
                    </button>
                    <a href="" id="agree" class="flex-1 px-4 py-2 ml-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded-md text-center">
                        Agree
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showDelete(x) {
            document.getElementById("deletebox").style.display = "block";
            document.getElementById('agree').href = "deletebin.php?did=" + x;

        }

        function hideDelete() {
            document.getElementById("deletebox").style.display = "none";
        }
    </script>
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