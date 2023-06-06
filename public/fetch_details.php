<?php
$con = mysqli_connect('localhost', 'root', '', 'project_gcs');
if ($con === false) {
    die("Error connection");
}

$assignId = $_GET['assignId'];
$aquery = "SELECT * FROM assigned_bin WHERE assign_id = $assignId";
$aresult = mysqli_query($con, $aquery);
$adata = mysqli_fetch_assoc($aresult);

if ($aresult) {
    $binId = $adata['assign_id'];
    $complainId = $adata['complain_id'];
    
    // Prepare the HTML markup with appropriate CSS classes
    $html = '
        <p class="text-gray-700 px-5 py-1 text-xl">Bin ID: ' . $binId . '</p>
        <p class="text-gray-700 px-5 py-1 text-xl">Complain ID: ' . $complainId . '</p>
    ';

    // Return the HTML markup
    echo $html;
} else {
    echo "Error retrieving details from the database";
}
?>
