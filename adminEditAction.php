<?php

include "connection.php";
// Mendapatkan data dari form

if (isset($_POST['editproduk'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $cat = $_POST['category'];
    $desc = $_POST['desc'];
    $img = $_FILES['image']['name'];
    $img_temp_name = $_FILES['image']['tmp_name'];
    $img_folder = 'assets/' . $img;

    // Query UPDATE menggunakan PDO
    $stmt = $conn->prepare("UPDATE produk SET nama = :name, kategori = :category, price = :price, image = :image, deskripsi = :description WHERE id =:id");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':category', $cat);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':image', $img_folder);
    $stmt->bindParam(':description', $desc);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    // echo $name . $price . $cat . $desc . $img . $id;
    header("Location: adminEdit.php");
    $conn = null;
}
