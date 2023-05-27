<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/riwayat.css">
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
        <table id="history-table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Tanggal Pembelian</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        <form action="riwayat.html" method="get">
            <button onclick="clearHist()">Clear History</button>
        </form>
        <i>* 1.untuk menambahkan data tabel maka, pilih produk -> add to cart <br> 2. masuk ke keranjang -> beli </i>
    </main>

    <script src="js/addtotable.js"></script>

</body>

</html>