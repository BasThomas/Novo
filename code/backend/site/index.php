<?php
    session_start();
    if(!isset($_SESSION['name']))
    {
        header('Location: http://novoteam.nl/backend');
        exit();
    }
?>

<!DOCTYPE HTML SYSTEM>
<html>
    <head>
        <meta charset="utf-8">
        <title>Admin Page</title>
        <link rel="stylesheet" type="text/css" href="../style.css">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        
        <script>
            $(document).ready(function(){
                $("#createEmployee").click(function(){
                    $("#page").load("../create/createEmployeeForm.php");
                });
            });
            
            $(document).ready(function(){
                $("#createProject").click(function(){
                    $("#page").load("../create/createProjectForm.php");
                });
            });
            
            $(document).ready(function(){
                $("#editEmployee").click(function(){
                    $("#page").load("../edit/editEmployeeForm.php");
                });
            });
            
            $(document).ready(function(){
                $("#editProject").click(function(){
                    $("#page").load("../edit/editProjectForm.php");
                });
            });
            
            $(document).ready(function(){
                $("#addEmployee").click(function(){
                    $("#page").load("../add/addEmployeeForm.php");
                });
            });
            
            $(document).ready(function(){
                $("#removeEmployee").click(function(){
                    $("#page").load("../remove/removeEmployeeForm.php");
                });
            });
            
            $(document).ready(function(){
                $("#setLeader").click(function(){
                    $("#page").load("../leader/setLeaderForm.php");
                });
            });
        </script>
        
    </head>
    <body>
        <div class="nav">
            <ul>
                <li><a href="#" id="createEmployee">Create Employee</a></li>
                <li><a href="#" id="createProject">Create Project</a></li>
                <li><a href="#" id="editEmployee">Edit Employee</a></li>
                <li><a href="#" id="editProject">Edit Project</a></li>
                <li><a href="#" id="addEmployee">Add Employees</a></li>
                <li><a href="#" id="removeEmployee">Remove Employees</a></li>
                <li><a href="#" id="setLeader">Set Project Leader</a></li>
            </ul>
        </div>
        <div id="page">
            <h1>Welcome to the Admin page!</h1>
        </div>
    </body>
</html>