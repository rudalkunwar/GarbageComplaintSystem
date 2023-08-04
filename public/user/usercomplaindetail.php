<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaints Report</title>
    <link rel="stylesheet" href="../style.css">
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://kit.fontawesome.com/62f9066fa7.js" crossorigin="anonymous"></script>

    <script>
        //Create PDf from HTML...
        function CreatePDFfromHTML() {
            var HTML_Width = $(".html-content").width();
            var HTML_Height = $(".html-content").height();
            var top_left_margin = 15;
            var PDF_Width = HTML_Width + (top_left_margin * 2);
            var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
            var canvas_image_width = HTML_Width;
            var canvas_image_height = HTML_Height;

            var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

            html2canvas($(".html-content")[0]).then(function(canvas) {
                var imgData = canvas.toDataURL("image/jpeg", 1.0);
                var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
                for (var i = 1; i <= totalPDFPages; i++) {
                    pdf.addPage(PDF_Width, PDF_Height);
                    pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
                }
                pdf.save("complainreport.pdf");
                window.location.href = "complainreport.php";
                $(".html-content").hide();
            });
        }
    </script>
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
    <button id="downloadButton" onclick="CreatePDFfromHTML();" class="absolute z-10 top-8 right-5 bg-gray-800 text-white rounded-lg p-2 cursor-pointer">
        <i class="fas fa-download mr-2"></i> Download
    </button>
    <div class="h-full w-full p-5 ml-14 md:ml-64 html-content">
        <div class="w-full p-5 border-b-2 border-blue-600 ">
            <h2 class="text-3xl ">Complain Details</h2>
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

</body>

</html>