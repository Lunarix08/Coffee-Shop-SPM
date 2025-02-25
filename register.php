<?php
session_start(); // Start the session
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomhp = $_POST['nomhp'];
    $namaPelanggan = $_POST['namaPelanggan'];
    $emel = $_POST['emel'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    $sql = "INSERT INTO pelanggan (nomhp, namaPelanggan, emel, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nomhp, $namaPelanggan, $emel, $password);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        // Error during registration
        $_SESSION['register_error'] = "Error: " . $stmt->error; // Changed to register_error
        header("Location: index.php"); // Redirect to the registration page
        exit();
    }

    $stmt->close();
}

$conn->close();
?>