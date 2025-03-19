<?php
session_start();
include 'db.php'; // Include your database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to checkout.");
}

// Get the order details from the session or request
$orderType = $_POST['orderType'] ?? 'N/A'; // Dine-In or Take Away
$tableSelected = ($orderType === 'Take Away') ? NULL : ($_POST['tableSelected'] ?? 'N/A'); // Set to NULL for Take Away
$cartItems = json_decode($_POST['cartItems'], true); // Decode JSON string to array

// Check if cartItems is an array
if (!is_array($cartItems)) {
    die("Invalid cart items data.");
}

// Prepare an associative array to aggregate quantities and calculate total price
$aggregatedItems = [];
$totalPrice = 0; // Initialize total price

// Aggregate quantities and calculate total price for each product
foreach ($cartItems as $item) {
    if (isset($aggregatedItems[$item['name']])) {
        $aggregatedItems[$item['name']]['quantity'] += $item['quantity']; // Increase quantity if product already exists
    } else {
        $aggregatedItems[$item['name']] = [
            'quantity' => $item['quantity'],
            'price' => floatval(str_replace('RM ', '', $item['price'])) // Convert price to float
        ]; // Initialize quantity and price if new product
    }
}

// Construct the info_belian string and calculate total price
$orderInfoBelian = [];
foreach ($aggregatedItems as $name => $data) {
    $orderInfoBelian[] = $name . ' x ' . $data['quantity']; // Format: ProductName x Quantity
    $totalPrice += $data['quantity'] * $data['price']; // Calculate total price
}
$orderInfoBelianString = implode(', ', $orderInfoBelian); // Combine into a single string

// Get the current date
$currentDate = date('Y-m-d H:i:s'); // Format the date as needed

// Insert into pesanan table
$stmt = $conn->prepare("INSERT INTO pesanan (tarikh, status, idPelanggan, noMeja, cara) VALUES (?, ?, ?, ?, ?)");
$status = 'Pending'; // Set the initial status of the order
$stmt->bind_param("ssiss", $currentDate, $status, $_SESSION['user_id'], $tableSelected, $orderType);
$stmt->execute();

// Check for errors in pesanan insertion
if ($stmt->error) {
    die("Error inserting into pesanan: " . $stmt->error);
}

// Get the last inserted order ID
$orderId = $stmt->insert_id;

// Insert into belian table
$stmt = $conn->prepare("INSERT INTO belian (idPelanggan, info_belian, jumlah_harga) VALUES (?, ?, ?)");
$stmt->bind_param("isd", $_SESSION['user_id'], $orderInfoBelianString, $totalPrice); // Use the aggregated string and total price
$stmt->execute();

// Check for errors in belian insertion
if ($stmt->error) {
    die("Error inserting into belian: " . $stmt->error);
}

// Close the connection
$stmt->close();
$conn->close();

// Redirect to a confirmation page or display a success message
header("Location: index.php"); // Redirect to a confirmation page
exit();
?>