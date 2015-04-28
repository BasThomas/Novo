<script>
$(document).ready(function(){
    $("#projects").change(function(){
     
        var id = $(this).find(":selected").val();
        var name = $(this).find(":selected").attr('pname');
        var description = $(this).find(":selected").attr('description');
        var startdate = $(this).find(":selected").attr('start');
        var enddate = $(this).find(":selected").attr('end');
         
        $('#pname').val(name);
        $('#description').val(description);
        $('#start').val(startdate);
        $('#end').val(enddate);
        $('#picture').attr("src", "../../images/project/" + id + ".jpg");
        $('#project').val(id);
         
    });
});
</script>

<!DOCTYPE HTML SYSTEM>
<html>
    <body>
        <h1>Edit project</h1>
        <form class="selectForm" action="../edit/editProject.php" method="post">
            <table style="margin-left: auto; margin-right: auto;">
            <tr>
                <td>
                    <?php 
                        $con = mysqli_connect("localhost", "delta_website", "admin", "delta_website");

                        $query = "SELECT ProjectID, Name, Description, StartDate, EndDate FROM novo_project";
                        if (!mysqli_query($con,$query)){ die('Error: ' . mysqli_error($con)); }
                        else{ $result = mysqli_query($con,$query); }

                        echo "<select id='projects' name='selector' size='12'>";
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
                    <input id="pname" name="name" type="text" placeholder="Name" required><br>
                    <input id="start" name="startdate" type="text" placeholder="Start Date" required><br>
                    <input id="end" name="enddate" type="text" placeholder="End Date"><br>
                    <textarea id="description" name="description" type="text" placeholder="Description" required></textarea><br>
                </td>
            </tr>
            </table>
            <input name="submit" type="submit" value="Edit">
        </form>
        
        <table id="uploading" style="margin-left: auto; margin-right: auto; margin-bottom: 20px;">
        <tr>
            <td>
                <img id="picture" src="" alt="Project Picture" width="400">
            </td>
            <td>
                <form class="uploadForm" action="../upload/uploadProject.php" enctype="multipart/form-data" method="post">
                    <input id="upload" name="file" accept="image/*" type="file">
                    <input id="project" name="project" type="hidden" required><br>
                    <input name="submit" type="submit" value="Upload">
                </form>
            </td>
        </tr>
        </table>
    </body>
</html>