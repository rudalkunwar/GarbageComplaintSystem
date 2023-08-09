<?php
if (isset($_GET['nid'])) {
    $nid = $_GET['nid'];
    $con = mysqli_connect("localhost", "root", "", "project_gcs");
    if ($con === false) {
        die("Error connection");
    }
    $nqry = "DELETE FROM notification WHERE id = $nid";
    mysqli_query($con, $nqry);
}
?>
