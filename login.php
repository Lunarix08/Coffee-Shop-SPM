<?php
session_start(); // Start the session
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emel = $_POST['emel'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM pelanggan WHERE emel = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $emel);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Successful login
            echo "Login successful! Welcome, " . $user['namaPelanggan'];
        } else {
            // Invalid password
            $_SESSION['login_error'] = "Invalid password."; // Changed to login_error
            header("Location: index.php"); // Redirect to the login page
            exit();
        }
    } else {
        // No user found
        $_SESSION['login_error'] = "No user found with that email."; // Changed to login_error
        header("Location: index.php"); // Redirect to the login page
        exit();
    }

    $stmt->close();
}

$conn->close();
?>