<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'car_inventory');
if ($conn->connect_error) {
    die('Connection Failed : ' . $conn->connect_error);
}

// SQL query to fetch car data
$sql = "SELECT * FROM cars";
$result = $conn->query($sql);

$cars = array();

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $cars[] = $row;
    }
} else {
    echo "0 results";
}

// Close the database connection
$conn->close();

header('Content-Type: application/json');
echo json_encode($cars);
?>
