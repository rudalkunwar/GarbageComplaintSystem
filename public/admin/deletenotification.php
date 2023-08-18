<?php
if (isset($_GET['nid'])) {
    $nid = $_GET['nid'];
    $con = mysqli_connect("localhost", "root", "", "project_gcs");
if ($con === false) {
    die("Error connection ");
}
    $nqry = "DELETE FROM notification WHERE id = $nid";
    if(mysqli_query($con, $nqry)){
        echo '<script>alert("Notification Deleted Sucessfully")</script>';
        header('location:notification.php');
    }
}
?>
