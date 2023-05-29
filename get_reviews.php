<?php
// Membuat koneksi ke database menggunakan PDO
try {
    include "connection.php";
    // Query untuk mengambil data review
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $stmt = $conn->query("SELECT * FROM reviews WHERE username LIKE '%$search%' OR product_name LIKE '%$search%'");
    } else {
        $query = "SELECT * FROM reviews";
        $stmt = $conn->query($query);
    }
    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mengirimkan data review sebagai respons JSON
    header('Content-Type: application/json');
    echo json_encode($reviews);
} catch (PDOException $e) {
    // Mengatasi kesalahan jika terjadi masalah dengan koneksi atau query
    echo "Error: " . $e->getMessage();
}
