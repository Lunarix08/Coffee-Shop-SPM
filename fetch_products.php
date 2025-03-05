<?php
include 'db.php'; // Make sure db connection works

header('Content-Type: application/json');

if (isset($_GET['category'])) {
    $category = $_GET['category'];

    if ($category == 'semua') {
        $stmt = $conn->prepare("SELECT * FROM produk"); // Show all products
    } else {
        $stmt = $conn->prepare("SELECT * FROM produk WHERE kategori = ?");
        $stmt->bind_param("s", $category);
    }
} else {
    $stmt = $conn->prepare("SELECT * FROM produk");
}

$stmt->execute();
$result = $stmt->get_result();
$products = [];

while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

echo json_encode($products);
?>
