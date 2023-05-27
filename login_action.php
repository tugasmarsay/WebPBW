<?php
session_start();
include 'connection.php';
$username = $_POST['username'];
$password = $_POST['password'];

try {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

if ($stmt->rowCount() == 1) {
    header('Location: home.php');
} else {
    try {
        $stmt2 = $conn->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    if ($stmt2->rowCount() == 1) {
        header('Location: adminEdit.php');
    } else {
        $_SESSION['login_error'] = "Username atau password salah.";
        header('location: index.php');
        exit();
    }
}
$_SESSION['username'] = $_POST['username'];
$conn = null;

$_SESSION['last_activity'] = time();
$session_timeout = 1800;
$_SESSION['last_activity'] = time();

// Periksa waktu sesi saat ada permintaan
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $session_timeout)) {
}
