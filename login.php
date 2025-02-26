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
            $_SESSION['user_id'] = $user['id']; // Set user ID in session
            header("Location: index.php"); // Redirect to index.php
            exit();
        } else {
            // Invalid password
            $_SESSION['login_error'] = "Kata laluan tidak sah."; // Changed to login_error
            header("Location: index.php"); // Redirect to the login page
            exit();
        }
    } else {
        // No user found
        $_SESSION['login_error'] = "Tiada pengguna ditemui dengan e-mel tersebut."; // Changed to login_error
        header("Location: index.php"); // Redirect to the login page
        exit();
    }

    $stmt->close();
}

$conn->close();
?>