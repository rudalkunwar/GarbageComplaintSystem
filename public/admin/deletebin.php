<?php 
session_start();
$delid = $_GET['did'];
$con = mysqli_connect('localhost','root','','project_gcs');
if($con === false)
{
    die("Error connection");
}
try{
    $qry = "DELETE FROM garbagebins WHERE bin_id=$delid";

    if(mysqli_query($con,$qry)){
        $_SESSION['message'] = "Bin Delete successfully!";
        echo '<script>window.location.href = "bins.php";</script>';
    
    }
}catch(mysqli_sql_exception $e){
    echo '<script>alert("Error on Deleting bin")</script>';

    echo '<script>window.location.href = "bins.php";</script>';
}
mysqli_close($con);
?>