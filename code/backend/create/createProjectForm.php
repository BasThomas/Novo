<!DOCTYPE HTML SYSTEM>
<html>
    <body>
        <h1>Create new project</h1>
        <form class="createForm" action="../create/createProject.php" method="post">
            <input name="name" type="text" placeholder="Name" required><br>
            <input name="startdate" type="text" placeholder="Start Date" required><br>
            <textarea id="description" name="description" type="text" placeholder="Description" required></textarea><br>
            <input name="submit" type="submit" value="Create">
        </form>
    </body>
</html>