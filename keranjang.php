<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/keranjang.css">
    <link rel="shortcut icon" href="assets/icon.png">

    <title>CART</title>
</head>

<body>
    <?php include 'navigasi.php'; ?>

    <main>
        <div class="top">
            <ul>
                <li><a href="riwayat.php">Riwayat</a></li>
                <li><a href="keranjang.php">Keranjang</a></li>
            </ul>
        </div>
        <div id="cart-items">

        </div>
        <div id="cart-total">
            <p>Total Harga : </p>
        </div>
    </main>
    <script src="js/addtocart.js"></script>
    <?php include 'footer.php'; ?>
</body>