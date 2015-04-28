<?php

    $employee = $_POST['employeeSelector'];
    $project = $_POST['projectSelector'];

    if($employee == "Select an employee"){ die('Employee selection error!');}

    $con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");

    $sql="INSERT INTO novo_works (ProjectID, EmployeeID)
    VALUES ('$project', '$employee')";

    if (!mysqli_query($con,$sql)) {
      die('Error: ' . mysqli_error($con));
    }

    mysqli_close($con);
    header('Location: http://novoteam.nl/backend/site');
    exit();

?>