<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Produk</title>
    <link rel="stylesheet" href="css/adminAdd.css">
</head>


<body>
    <?php
    include "headerAdmin.php";
    ?>
    <h2>Tambah Produk</h2>
    <form action="adminAddAction.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" required>
        </div>
        <div class="form-group">
            <label for="category">Kategori:</label>
            <select name="category" id="updateCategory" required>
                <option value="">Pilih kategori</option>
                <option value="Mouse">Mouse</option>
                <option value="Keyboard">Keyboard</option>
                <option value="Mousepad">Mousepad</option>
                <option value="Headset">Headset</option>
            </select>

            <div class="form-group">
                <label for="price">Harga:</label>
                <input type="number" name="price" required>
            </div>
            <div class="form-group">
                <label for="image">Gambar:</label>
                <input type="file" name="image" required>
            </div>
            <div class="form-group">
                <label for="desc">Deskripsi:</label>
                <textarea name="desc" required></textarea>
            </div>
            <button type="submit" name="add_produk">Tambah Produk</button>
    </form>
</body>

</html>