<?php
include 'db.php'; // Include the database connection

function getAvailableMeja($conn) {
    $sql = "SELECT noMeja, info FROM meja WHERE tersedia = TRUE"; // Query to get available tables
    $result = $conn->query($sql);
    $meja = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $meja[] = $row; // Add each available table to the array
        }
    }
    return $meja; // Return the array of available tables
}

$availableMeja = getAvailableMeja($conn); // Call the function to get available tables
$conn->close(); // Close the database connection
?>