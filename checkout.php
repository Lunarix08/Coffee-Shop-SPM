<?php
include 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Assuming cart items are sent as a JSON array
    $cartItems = json_decode($_POST['cartItems'], true);
    $idPelanggan = $_POST['idPelanggan']; // Get customer ID from session or input
    $tarikh = date('Y-m-d'); // Current date
    $status = 'Pending'; // Initial status

    // Insert into `pesanan` table
    $stmt = $conn->prepare("INSERT INTO pesanan (tarikh, status, idPelanggan) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $tarikh, $status, $idPelanggan);
    if ($stmt->execute()) {
        $pesananId = $stmt->insert_id; // Get the last inserted ID

        // Insert each cart item into `belian` table
        foreach ($cartItems as $item) {
            $info_belian = json_encode($item); // Convert item to JSON or format as needed
            $stmt = $conn->prepare("INSERT INTO belian (idPelanggan, info_belian) VALUES (?, ?)");
            $stmt->bind_param("is", $idPelanggan, $info_belian);
            $stmt->execute();
        }

        echo json_encode(['success' => true, 'message' => 'Checkout successful!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to create order.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>