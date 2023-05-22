<?php
session_start();
if(isset($_SESSION['drivername']))
{
    session_destroy();
    header('location:../index.php');
}
?>