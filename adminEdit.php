<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/adminEdit.css">
</head>

<body>
    <?php
    include "headerAdmin.php";
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo '<script>
            window.alert("' . $msg . '");
        </script>';
        $_GET['msg'] = '';
    }
    ?>
    <a href="adminAdd.php" class="add-btn">+</a>
    <section class="show-product">
        <table>
            <thead>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Edit/Hapus</th>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->query("SELECT * FROM produk");
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (count($products) > 0) {
                    foreach ($products as $row) {
                ?>
                        <tr>
                            <td><img src="<?php echo $row['image']; ?>" alt=""></td>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['price']; ?></td>
                            <td>
                                <a href="adminEdit.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('apakah ingin dihapus?')">Delete</a>
                                <button class="edit-btn" onclick="showUpdateForm(<?php echo $row['id']; ?>)">Update</button>

                            </td>
                        </tr>
                <?php
                    }
                }

                ?>

            </tbody>
        </table>
    </section>
    <div id="updatePopup" class="popup">
        <div class="popup-content">
            <span class="close" onclick="closeUpdateForm()">&times;</span>
            <h2>Update Product</h2>
            <form id="updateForm" method="POST" action="adminEditAction.php">
                <input type="hidden" name="id" id="updateId">
                <label for="name">Nama:</label>
                <input type="text" name="name" id="updateName" required>
                <label for="category">Kategori:</label>
                <input type="text" name="category" id="updateCategory" required>
                <label for="price">Harga:</label>
                <input type="number" name="price" id="updatePrice" required>
                <label for="image">Gambar:</label>
                <div class="file-upload">
                    <input type="file" name="image" id="updateImage" required>
                    Upload File
                </div>
                <label for="description">Deskripsi:</label>
                <textarea name="description" id="updateDescription" required></textarea>
                <input type="submit" value="Update">
            </form>
        </div>
    </div>
    <script>
        function showUpdateForm(id) {
            document.getElementById("updateId").value = id;
            document.getElementById("updatePopup").classList.add("show");
            document.getElementById("updatePopup").style.display = "block";

        }

        function closeUpdateForm() {
            document.getElementById("updatePopup").classList.remove("show");
            document.getElementById("updatePopup").style.display = "none";

        }
    </script>
</body>

</html>