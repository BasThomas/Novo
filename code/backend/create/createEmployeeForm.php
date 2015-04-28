<!DOCTYPE HTML SYSTEM>
<html>
    <body>
        <h1>Create new employee</h1>
        <form class="createForm" action="../create/createEmployee.php" method="post">
            <input name="name" type="text" placeholder="Name" required><br>
            <input name="email" type="email" placeholder="Email" required><br>
            <input name="dob" type="text" placeholder="Date of Birth" required><br>
            <textarea id="description" name="description" type="text" placeholder="Description" required></textarea><br>
            <input name="Submit" type="submit" value="Create">
        </form>
    </body>
</html>