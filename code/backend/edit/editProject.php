<?php
$con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");

$selector = $_POST['selector'];
$name = $_POST['name'];
$description = mysqli_real_escape_string($con, $_POST['description']);
$startdate = $_POST['startdate'];
$enddate = $_POST['enddate'];

$sql="UPDATE novo_project
      SET Name='" . $name . "', 
      Description='" . $description . "', 
      StartDate='" . $startdate . "', 
      EndDate='" . $enddate . "' 
      WHERE ProjectID=" . $selector;

if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}

mysqli_close($con);
header('Location: http://novoteam.nl/backend/site');
exit();
?>