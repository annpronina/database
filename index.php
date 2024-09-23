<?php

// mysql
$host = "localhost";
$user = "php_app";
$password = "1234";
$database = "sql_store";


$conn = new mysqli($host, $user, $password, $database);

if ($conn -> connect_error) {
    die("Connection failed: " .$conn->connect_error);
}

echo "Connection successful";

$sql = "SELECT customer_id, first_name, last_name FROM customers";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers</title>
</head>
<body>
    <h1>Customers</h1>
    <?php
    if($result->num_rows > 0){
        echo "<ul>";
        while($row = $result->fetch_assoc()){
            $customer =
            $row["customer_id"] . ",  ".
            $row["first_name"] . ",  ".
            $row["last_name"];
            // $row["birth_date"] . ",  ".
            // $row["phone"] . ",  ".
            // $row["address"] . ",  ".
            // $row["city"] . ",  ".
            // $row["state"] . ",  ".
            // $row["point"];
            echo "<li>{$customer}</li>";
        }
        echo "</ul>";
    }else {
        echo "No customers found.";
    }
    ?>

</body>
</html>