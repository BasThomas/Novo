<script>
$(document).ready(function(){
    $("#employees").change(function(){

        var id = $(this).find(":selected").val();
        var name = $(this).find(":selected").attr('ename');
        var email = $(this).find(":selected").attr('email');
        var dob = $(this).find(":selected").attr('dob');
        var description = $(this).find(":selected").attr('description');

        $('#name').val(name);
        $('#email').val(email);
        $('#dob').val(dob);
        $('#description').val(description);
        $('#picture').attr("src", "../../images/member/" + id + ".jpg");
        $('#employee').val(id);

    });
});
</script>

<!DOCTYPE HTML SYSTEM>
<html>
    <body>
        <h1>Edit employee</h1>
        <form class="selectForm" action="../edit/editEmployee.php" method="post">
            <table style="margin-left: auto; margin-right: auto;">
            <tr>
                <td>
                    <?php
                        $con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");

                        $query = "SELECT EmployeeID, Name, Email, DoB, Description FROM novo_employee";
                        if (!mysqli_query($con,$query)) {
                            die('Error: ' . mysqli_error($con));
                        } else {
                            $result = mysqli_query($con,$query);
                        }

                        echo "<select id='employees' name='selector' size='12'>";
                        while($current = mysqli_fetch_array($result)) {
                            echo "<option value='" . $current['EmployeeID'] . "'"
                                . "email='" . $current['Email'] . "'"
                                . "dob='" . $current['DoB'] . "'"
                                . "ename='" . $current['Name'] . "'"
                                . "description='" . $current['Description'] . "'"
                                . ">" . $current['Name'] . "</option>";
                        }
                        echo "</select><br>";
                    ?>
                </td>
                <td>
                    <input id="name" name="name" type="text" placeholder="Name" required><br>
                    <input id="email" name="email" type="email" placeholder="Email" required><br>
                    <input id="dob" name="dob" type="text" placeholder="Date of Birth" required><br>
                    <textarea id="description" name="description" type="text" placeholder="Description" required></textarea><br>
                </td>
            </tr>
            </table>
            <input name="submit" type="submit" value="Edit">
        </form>

        <table id="uploading" style="margin-left: auto; margin-right: auto; margin-bottom: 20px;">
        <tr>
            <td>
                <img id="picture" src="../../images/member_placeholder.jpg" alt="Profile Picture" width="150">
            </td>
            <td>
                <form class="uploadForm" action="../upload/uploadEmployee.php" enctype="multipart/form-data" method="post">
                    <input id="upload" name="file" type="file" accept="image/*" required><br>
                    <input id="employee" name="employee" type="hidden" required><br>
                    <input name="submit" type="submit" value="Upload">
                </form>
            </td>
        </tr>
        </table>
    </body>
</html>