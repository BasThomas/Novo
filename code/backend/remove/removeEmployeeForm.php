<script>
$(document).ready(function(){
    $("#projects").change(function(){
        var projectID = $(this).find(":selected").val();
        $('#employeeSelector').load("http://novoteam.nl/backend/remove/createRemoveForm.php?id=" + projectID);
    });
});
</script>

<!DOCTYPE HTML SYSTEM>
<html>
    <body>
        <h1>Remove Employee</h1>
        <form name="selectForm" class="selectForm" style="padding-bottom: 20px;" action="../remove/removeEmployee.php" method="post">
            <table style="margin-left: auto; margin-right: auto;">
            <tr>
                <td>
                    <?php 
                        $con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");

                        $query = "SELECT ProjectID, Name, Description, StartDate, EndDate FROM novo_project";
                        if (!mysqli_query($con,$query)){ die('Error: ' . mysqli_error($con)); }
                        else{ $result = mysqli_query($con,$query); }

                        echo "<select id='projects' name='projectSelector' size='12'>";
                        while($current = mysqli_fetch_array($result)){
                            echo "<option value='" . $current['ProjectID'] . "'"
                                 . "pname='" . $current['Name'] . "'"
                                 . "description='" . $current['Description'] . "'"
                                 . "start='" . $current['StartDate'] . "'"
                                 . "end='" . $current['EndDate'] . "'"
                                 . ">" . $current['Name'] . "</option>";
                        }
                        echo "</select><br>";
                    ?>
                </td>
                <td>
                    <div id="employeeSelector"></div>
                </td>
            </tr>
            </table>
            <input type='submit' value='Remove'>
        </form>
    </body>
</html>