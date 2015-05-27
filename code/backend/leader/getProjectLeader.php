<?php

    $query="SELECT *
            FROM novo_works W JOIN novo_employee E
            ON E.EmployeeID = W.EmployeeID
            WHERE W.ProjectID = '$currentProjectID'
            AND W.EmployeeID NOT IN
                                (SELECT LeaderID
                                FROM novo_project
                                WHERE ProjectID = '$currentProjectID');";

    if (!mysqli_query($con,$query)) {
        die('Error: ' . mysqli_error($con));
    } else {
        $result = mysqli_query($con,$query);

        echo "<select name='employeeSelector' size='12'>";

        while($currentEmployee = mysqli_fetch_array($result)) {
            echo "<option value='" . $currentEmployee['EmployeeID'] . "'"
                        . "email='" . $currentEmployee['Email'] . "'"
                        . "dob='" . $currentEmployee['DoB'] . "'"
                        . "ename='" . $currentEmployee['Name'] . "'"
                        . "description='" . $currentEmployee['Description'] . "'"
                        . ">" . $currentEmployee['Name'] . "</option>";
        }

        echo "</select><br>";
    }

?>