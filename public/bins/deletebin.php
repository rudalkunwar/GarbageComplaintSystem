<?php 
session_start();
$delid = $_GET['did'];
$con = mysqli_connect('localhost','root','','gcs_database');
if($con === false)
{
    die("Error connection");
}
$qry = "DELETE FROM garbagebins WHERE id=$delid";

if(mysqli_query($con,$qry)){
    $_SESSION['message'] = "Bin Delete successfully!";
    echo '<script>window.location.href = "bins.php";</script>';

}
else
{
    echo '<script>alert("Error on Deleting Driver")</script>';

    echo '<script>window.location.href = "driver.php";</script>';
}
?>