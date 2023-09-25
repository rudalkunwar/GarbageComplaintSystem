<?php
session_start();
$delid = $_GET['cid'];
$con = mysqli_connect('localhost', 'root', '', 'project_gcs');
if ($con === false) {
    die("Error connection");
}
// $qry = "DELETE FROM complaints WHERE complain_id=$delid";
$qry = "DELETE complaints, collections, assigned_bin
FROM complaints
LEFT JOIN collections ON complaints.complain_id = collections.complain_id
LEFT JOIN assigned_bin ON complaints.complain_id = assigned_bin.complain_id
WHERE complaints.complain_id = $delid;
";

if (mysqli_query($con, $qry)) {

    echo '<script>alert("Complain Deleted.")</script>';
    echo '<script>window.location.href = "complainhistory.php";</script>';
} else {
    echo '<script>alert("Error on Deleting Complain")</script>';

    echo '<script>window.location.href = "complainhistory.php";</script>';
}
mysqli_close($con);
