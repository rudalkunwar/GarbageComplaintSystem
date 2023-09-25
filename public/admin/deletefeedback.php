<?php 
session_start();
$delid = $_GET['id'];
$con = mysqli_connect('localhost','root','','project_gcs');
if($con === false)
{
    die("Error connection");
}
$qry = "DELETE FROM feedback WHERE id=$delid";

if(mysqli_query($con,$qry)){

    echo '<script>alert("Feedback Deleted.")</script>';
    echo '<script>window.location.href = "feedback.php";</script>';

}
else
{
    echo '<script>alert("Error on Deleting Feedback")</script>';

    echo '<script>window.location.href = "feedback.php";</script>';
}
mysqli_close($con);
?>