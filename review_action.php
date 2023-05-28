<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $stars = $_POST['stars'];
    $category = $_POST['category'];
    $product_name = $_POST['product_name'];
    $options = isset($_POST['options']) ? implode(", ", $_POST['options']) : "";
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

    // Upload image
    move_uploaded_file($tmp_image, "images/$image");

    // Insert review into database
    $stmt = $conn->prepare("INSERT INTO reviews (username, stars, category, product_name, options, description, image) VALUES (:username, :stars, :category, :product_name, :options, :description, :image)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':stars', $stars);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':options', $options);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $image);
    $stmt->execute();

    header("Location: index.html");
    exit();
}
