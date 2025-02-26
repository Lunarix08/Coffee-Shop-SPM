<?php
session_start(); // Start the session
include 'db.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize input data
    $nomhp = trim($_POST['nomhp']); // Phone number
    $namaPelanggan = trim($_POST['namaPelanggan']); // Customer name
    $emel = trim($_POST['emel']); // Email
    $password = $_POST['password']; // Password
    $confirm_password = $_POST['confirm_password']; // Confirm password

    // Validate input data
    if (empty($nomhp) || empty($namaPelanggan) || empty($emel) || empty($password) || empty($confirm_password)) {
        $_SESSION['register_error'] = "Semua medan diperlukan.";
        header("Location: index.php");
        exit();
    }

    if (!filter_var($emel, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['register_error'] = "Alamat e-mel tidak sah.";
        header("Location: index.php");
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['register_error'] = "Kata laluan tidak sepadan.";
        header("Location: index.php");
        exit();
    }

    // Check if the email is already in use
    $sql = "SELECT * FROM pelanggan WHERE emel = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $emel);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['register_error'] = "Alamat e-mel sudah digunakan.";
        header("Location: index.php");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $sql = "INSERT INTO pelanggan (nomhp, namaPelanggan, emel, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nomhp, $namaPelanggan, $emel, $hashed_password);

    if ($stmt->execute()) {
        $_SESSION['register_success'] = "Pendaftaran berjaya! Anda kini boleh log masuk.";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['register_error'] = "Error adding user: " . $stmt->error; // Provide specific error message
        header("Location: index.php");
        exit();
    }

    // Close the statement and connection
    $stmt->close(); // Close the statement
}

// Close the database connection
$conn->close(); // Close the database connection
?>