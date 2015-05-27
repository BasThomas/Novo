<?php
    session_start();
    if(isset($_SESSION['name']))
    {
        header('Location: http://novoteam.nl/backend/site');
        exit();
    }
?>

<!DOCTYPE HTML SYSTEM>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin page</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="login">
            <h1>Admin page</h1>
            <form action="login.php" method="post">
                <input name="name" type="text" placeholder="Name" required><br>
                <input name="password" type="password" placeholder="Password" required><br>
                <input name="login" type="submit" value="Login">
            </form>
        </div>
    </body>
</html>