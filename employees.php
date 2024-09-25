<?php

// mysql
$host = "localhost";
$user = "php_app";
$password = "1234";
$database = "sql_hr";


$conn = new mysqli($host, $user, $password, $database);

if ($conn -> connect_error) {
    die("Connection failed: " .$conn->connect_error);
}

echo "Connection successful";

$sql = "SELECT e.employee_id, e.last_name, e.job_title, e.salary, e.office_id, m.first_name
FROM employees e
JOIN employees m 
ON e.reports_to = m.employee_id";
// INSERT INTO m.employee(name)
// VALUES ('jauns vards')";
// $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
</head>
<body>
    <h1>Employees</h1>
    <?php
    if($result->num_rows > 0){
        echo "<ul>";
        while($row = $result->fetch_assoc()){
            $employee =
            $row["employee_id"] . ",  ".
            //$row["first_name"] . ",  ".
            $row["last_name"] . ",  ".
            $row["job_title"] . ",  ".
            $row["salary"] . ",  ".
            $row["office_id"]; 
            echo "<li>{$employee}</li>";
        }
        echo "</ul>";
    }else {
        echo "No employees found.";
    }
    ?>

</body>
</html>