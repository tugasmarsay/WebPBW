<?php
include "connection.php";
if (isset($_POST['add_produk'])) {
    $nama = $_POST['nama'];
    $price = $_POST['price'];
    $cat = $_POST['category'];
    $desc = $_POST['desc'];
    $img = $_FILES['image']['name'];
    $img_temp_name = $_FILES['image']['tmp_name'];
    $img_folder = 'assets/' . $img;
    $stmt = $conn->prepare("INSERT INTO produk (nama, kategori, price, image, deskripsi) VALUES (:nama, :kategori, :price, :img, :desc)");
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':kategori', $cat);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':img', $img_folder);
    $stmt->bindParam(':desc', $desc);
    $stmt->execute();
    if ($stmt) {
        move_uploaded_file($img_temp_name, $img_folder);
        $msg = "produk ditambahkan";
        // echo $msg;
    } else {
        $msg = "produk gagal ditambahkan";
    }
    header("Location: adminEdit.php?msg=$msg");
}
