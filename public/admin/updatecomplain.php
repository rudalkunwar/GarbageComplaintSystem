<?php
$con = mysqli_connect('localhost', 'root', '', 'project_gcs');
if (isset($_POST['update'])) {
    $complain = $_POST['complain_id'];
    $complain_msg = $_POST['description'];
    $assigned_driver = $_POST['assigned_driver'];
    $assigned_date = $_POST['assigned_date'];
    $assign_desc = $_POST['description'];
    $complainstatus = $_POST['complain_status'];
    echo "$complainstatus";
    $qry1 = "UPDATE complaints set complain_status='$complainstatus' WHERE complain_id = $complain ";
    if (strcmp($complainstatus, 'Reject') == 0) {
        if (mysqli_query($con, $qry1)) {
            echo '<script> alert("Complain Rejected"); </script> ';
            header('location:dashboard.php');
        }
    } else {
        mysqli_query($con, $qry1);
        $qry2 = "INSERT INTO assigned_bin(complain_id,assigned_driver,assignment_date,description) VALUES ($complain,'$assigned_driver','$assigned_date','$assign_desc')";
        if (mysqli_query($con, $qry2)) {
            $qry3  = "UPDATE drivers set driver_status = 'Assigned' WHERE driver_name ='$assigned_driver'";
            mysqli_query($con, $qry3);
            echo '<script> alert("Complain Accepted and Updated"); </script> ';
            header('location:dashboard.php');
        }
    }
}
$con->close();
