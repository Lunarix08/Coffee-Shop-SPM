<?php
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
            echo "Login successful! Welcome, " . $user['namaPelanggan'];
        } else {
            header("Location: index.php?error=Invalid password.");
            exit();
        }
    } else {
        header("Location: index.php?error=No user found with that email.");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>