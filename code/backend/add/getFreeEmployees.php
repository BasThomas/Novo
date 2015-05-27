<?php

    $query = "  SELECT *
                FROM novo_employee E
                WHERE E.Name NOT IN
                                (SELECT E.Name
                                FROM novo_works W RIGHT JOIN novo_employee E
                                ON E.EmployeeID = W.EmployeeID
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