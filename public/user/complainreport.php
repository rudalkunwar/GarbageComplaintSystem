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
    <?php include('userdashlayout.php') ?>
    <?php
    $joinqry = "SELECT * FROM complaints C JOIN garbagebins b ON c.bin_id = b.bin_id WHERE user_id = $userid  ";
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
                                            <a href="usercomplaindetail.php?complainid=<?php echo $data['complain_id'] ?>&userid=<?php echo $userid; ?>"  class="px-2 py-3 bg-green-300  rounded-md text-center">
                                                Load More
                                            </a >
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
</body>

</html>