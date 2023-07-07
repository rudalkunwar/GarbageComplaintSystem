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
        $qry2 = " SELECT * FROM complaints C JOIN garbagebins b ON c.bin_id = b.bin_id WHERE complain_status='new'";
        $qry3  = "SELECT driver_name FROM drivers WHERE driver_status = 'Free'";
        $result = mysqli_query($con, $qry2);
        $result3 = mysqli_query($con, $qry3);
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
                                    <tr>
                                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Report Date
                                        </th>
                                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Report Picture
                                        </th>
                                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            User ID
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
                                    while ($data = mysqli_fetch_assoc($result)) {
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
                                                <p class="text-gray-900 whitespace-no-wrap w-full h-16 pb-[75%] relative">
                                                    <img src="../user/<?php echo $data['bin_picture'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                                                </p>
                                            </td>
                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <?php echo $data['user_id'] ?>

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

                                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                                <p class="text-gray-900 whitespace-no-wrap">
                                                    <button onclick="openPopupForm(<?php echo $data['complain_id'] ?>)" class="px-3 py-1 font-semibold leading-tight text-green-500">Manage</button>

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

    <div id="popupForm" class="hidden">
        <div class="fixed inset-0 z-10 flex items-center justify-center backdrop-blur-md bg-gray-600 bg-opacity-40">
            <div class=" w-2/5 bg-violet-200 rounded-md shadow-lg">
                <div class="px-10 py-5 w-full ">
                    <div class="flex justify-between">
                        <h3 class="text-gray-900 text-xl font-semibold">Update Complain</h3>
                        <span onclick=" closePopupForm()"> <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="default-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button> </span>
                    </div>
                    <form method="POST" action="updatecomplain.php" onsubmit="return checkDate(event);">
                        <input name="complain_id" id="hiddenid" type="hidden" value="">
                        <div class="my-4">
                            <label for="updateMessage" class="block text-gray-700 font-medium mb-2">Update Message:</label>
                            <textarea name="description" id="updateMessage" class="w-full px-4 py-2 rounded-lg border focus:ring-blue-500" rows="6"></textarea>
                        </div>
                        <div class="flex justify-between my-4">
                            <label for="assignedDriver" class="block text-gray-700 font-medium mr-2">Assign Driver:</label>
                            <select id="assignedDriver" name="assigned_driver" class="w-1/2 px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                                <?php
                                while ($row = mysqli_fetch_assoc($result3)) {
                                    $driverName = $row['driver_name'];
                                ?>
                                    <option value="<?php echo $driverName; ?>"><?php echo $driverName; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="flex justify-between my-4">
                            <label for="complain_status" class="block text-gray-700 font-medium mr-2">Action:</label>
                            <select id="complain_status" name="complain_status" class="w-1/2  px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                                <option value="In progress,Driver Assigned.">Accept</option>
                                <option value="Rejected">Reject</option>
                            </select>
                        </div>
                        <div class="flex justify-between my-4">
                            <label for="date" class="block text-gray-700 font-medium mb-2">Assign Date:</label>
                            <input type="date" id="date" name="assigned_date" class="w-1/2  px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="text-right mt-2 mb-5">
                            <input type="submit" value="Submit" name="update" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5" onsubmit="confirm('Are you sure to update complain.')">
                        </div>
                    </form>
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
    <script>
        function checkDate(event) {
            var dateInput = document.getElementById('date');
            var selectedDate = new Date(dateInput.value);
            var today = new Date();

            if (selectedDate < today) {
                alert("Cannot select a past date.");
                event.preventDefault(); // Prevent form submission
                return false;
            }

            return true;
        }


        function openPopupForm(x) {
            document.getElementById('hiddenid').value = x;
            const popupForm = document.getElementById('popupForm');
            popupForm.classList.remove('hidden');
        }

        function closePopupForm() {
            const popupForm = document.getElementById('popupForm');
            popupForm.classList.add('hidden');
        }
    </script>
</body>
</html>