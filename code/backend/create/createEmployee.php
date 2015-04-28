<?php
$con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");

$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$description = $_POST['description'];


$sql="INSERT INTO novo_employee (Name, Email, DoB, Description )
VALUES ('$name', '$email', '$dob', '$description')";

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header('Location: http://novoteam.nl/backend/site');
exit();
?>