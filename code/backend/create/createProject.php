<?php
$con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");

$name = $_POST['name'];
$description = $_POST['description'];
$startdate = $_POST['startdate'];


$sql="INSERT INTO novo_project (Name, Description, StartDate )
VALUES ('$name', '$description', '$startdate')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header('Location: http://novoteam.nl/backend/site');
exit();
?>