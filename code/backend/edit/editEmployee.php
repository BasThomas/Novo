<?php

$con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");

$selector = $_POST['selector'];
$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$description = mysqli_real_escape_string($con, $_POST['description']);

$sql="UPDATE novo_employee
      SET Name='" . $name . "', 
      Email='" . $email . "', 
      DoB='" . $dob . "', 
      Description='" . $description . "' 
      WHERE EmployeeID=" . $selector;

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header('Location: http://novoteam.nl/backend/site');
exit();
?>