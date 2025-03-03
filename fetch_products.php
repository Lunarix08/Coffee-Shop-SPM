<?php
include 'db.php'; // Include the database connection

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    if ($category === 'semua') {
        $sql = "SELECT * FROM produk"; // Query to get all products
    } else {
        $sql = "SELECT * FROM produk WHERE kategori = ?"; // Query to get products by category
    }
    $stmt = $conn->prepare($sql);
    if ($category !== 'semua') {
        $stmt->bind_param("s", $category);
    }
    $stmt->execute();
    $result = $stmt->get_result();

    $products = array();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row; // Add each product to the array
    }

    echo json_encode($products); // Return products as JSON
    $stmt->close();
}
$conn->close(); // Close the database connection
?>