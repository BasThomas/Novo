<?php
session_start();

$con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");

$name = $_POST['name'];
$password = $_POST['password'];

$userQuery="SELECT * FROM novo_admin WHERE Name = '$name'";

if (!mysqli_query($con,$userQuery))
{
    die('Error: ' . mysqli_error($con));
}
else
{
    $result = mysqli_query($con,$userQuery);
    
    while($currentUser = mysqli_fetch_array($result)){
        if($currentUser['Password'] != $password)
        {
            die('<h1>Wrong Password!</h1>');
        }
        $name = $currentUser['Name'];
        $_SESSION['name']=$name;
    }
    mysqli_close($con);
    header('Location: http://novoteam.nl/backend/site');
    exit();
}

header('Location: http://novoteam.nl/backend');
exit();
mysqli_close($con);
?>