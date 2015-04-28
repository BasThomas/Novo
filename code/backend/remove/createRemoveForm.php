<?php 
    $currentProjectID = $_GET['id'];

    $con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");

    include 'getCurrentEmployees.php';
?>