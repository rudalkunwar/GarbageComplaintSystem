<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bin Complaint Form</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/62f9066fa7.js" crossorigin="anonymous"></script>

</head>

<body class="">








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
        <?php //include('layout/dashlayout.php') 
        ?>
        <?php
        // $qry2 = " SELECT * FROM complaints C JOIN garbagebins b ON c.bin_id = b.bin_id WHERE bin_status='use' AND complain_status='new'";
        // $qry3  = "SELECT driver_name FROM drivers WHERE driver_status = 'Free'";
        // $result = mysqli_query($con, $qry2);
        // $result2 = mysqli_query($con, $qry3);
        ?>
        <div class="h-full w-full ">
            <div class="w-full p-5 ">
                <h2 class="text-3xl border-b-2 border-blue-600">Complain Reports</h2>
            </div>
            <div class="container max-w-full px-4 mx-auto sm:px-8">
                <div class="py-8 ">
                    <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
                        <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Report Date
                                        </th>
                                        <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                            Bin Report Picture
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
                                    // while ($data = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo "hello"; ?>
                                            </p>
                                            </p>
                                        </td>
                                        <td class="w-[20px] px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap w-full h-24 pb-[75%] relative">
                                                <img src="../user/<?php echo $data['bin_picture'] ?>" class="absolute inset-0 w-full h-full object-cover" alt="">
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo '1234' ?>

                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo 'dfjsfa' ?>
                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php echo 'dsafa' ?>

                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php  ?>

                                            </p>
                                        </td>
                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <?php  ?>

                                            </p>
                                        </td>

                                        <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                <button id="openFormButton" class="px-3 py-1 font-semibold leading-tight text-green-500">Manage</button>
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                <div id="popupForm" class="hidden w-96 h-full bg-white rounded-md shadow-lg">
                                    <div class="px-10 py-5 w-full ">
                                        <div class="flex justify-between">
                                            <h3 class="text-gray-900 text-xl font-semibold">Update Complain</h3>
                                            <span id="closeFormButton"> <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="default-modal">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button> </span>
                                        </div>
                                        <form>
                                            <div class="my-4">
                                                <label for="updateMessage" class="block text-gray-700 font-medium mb-2">Update Message:</label>
                                                <textarea name="updateMessage" id="updateMessage" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500" rows="6"></textarea>
                                            </div>
                                            <div class="flex justify-between my-4">
                                                <label for="assignedDriver" class="block text-gray-700 font-medium mr-2">Assign Driver:</label>
                                                <select id="assignedDriver" name="assignedDriver" class="w-1/2 px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                                                    <!-- Options for drivers -->
                                                </select>
                                            </div>
                                            <div class="flex justify-between my-4">
                                                <label for="assignedDriver" class="block text-gray-700 font-medium mr-2">Action:</label>
                                                <select id="assignedDriver" name="assignedDriver" class="w-1/2 ml-5 px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500">
                                                    <option value="">Accept</option>
                                                    <option value="">Reject</option>
                                                </select>
                                            </div>
                                            <div class="text-right mt-2 mb-5">
                                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">Submit</button>
                                                <!-- <button id="closeFormButton" class="text-gray-500 ml-2 hover:text-gray-900 font-medium rounded-lg text-sm px-5 py-2.5" type="button">Close</button> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>

    </html>
    <!-- Modal toggle -->
    <!-- HTML -->


    <!-- JavaScript -->
    <script>
        const openFormButton = document.getElementById('openFormButton');
        const closeFormButton = document.getElementById('closeFormButton');
        const popupForm = document.getElementById('popupForm');

        openFormButton.addEventListener('click', () => {
            popupForm.classList.remove('hidden');
        });

        closeFormButton.addEventListener('click', () => {
            popupForm.classList.add('hidden');
        });
    </script>
</body>

</html>


</body>

</html>