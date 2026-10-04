<?php
require "services/config.php";

$q_pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$q_produk    = mysqli_query($conn, "SELECT * FROM produk");
$q_penjualan = mysqli_query($conn, "
    SELECT p.id_penjualan, pl.nama, pr.nama_produk, p.jumlah,
           (p.jumlah * pr.harga) AS total, p.tanggal
    FROM penjualan p
    JOIN pelanggan pl ON p.id_pelanggan = pl.id_pelanggan
    JOIN produk pr ON p.id_produk = pr.id_produk
    ORDER BY p.id_penjualan
");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Online</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Toko Online</h1>
        <nav>
            <a href="#pelanggan">Pelanggan</a>
            <a href="#produk">Produk</a>
            <a href="#penjualan">Penjualan</a>
        </nav>
    </header>

    <main>
        <section class="card" id="pelanggan">
            <h2>Data Pelanggan</h2>
            <div class="table-wrap">
                <table>
                    <tr><th>ID</th><th>Nama</th><th>Email</th><th>Kota</th><th>No HP</th></tr>
                    <?php while ($row = mysqli_fetch_assoc($q_pelanggan)) { ?>
                    <tr>
                        <td><?= $row['id_pelanggan'] ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['kota']) ?></td>
                        <td><?= htmlspecialchars($row['no_hp']) ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </section>

        <section class="card" id="produk">
            <h2>Data Produk</h2>
            <div class="table-wrap">
                <table>
                    <tr><th>ID</th><th>Nama Produk</th><th>Kategori</th><th>Harga</th><th>Stok</th></tr>
                    <?php while ($row = mysqli_fetch_assoc($q_produk)) { ?>
                    <tr>
                        <td><?= $row['id_produk'] ?></td>
                        <td><?= htmlspecialchars($row['nama_produk']) ?></td>
                        <td><?= htmlspecialchars($row['kategori']) ?></td>
                        <td>Rp <?= number_format($row['harga'], 0, ',', '.') ?></td>
                        <td><?= $row['stok'] ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </section>

        <section class="card" id="penjualan">
            <h2>Data Penjualan</h2>
            <div class="table-wrap">
                <table>
                    <tr><th>ID</th><th>Pelanggan</th><th>Produk</th><th>Jumlah</th><th>Total</th><th>Tanggal</th></tr>
                    <?php while ($row = mysqli_fetch_assoc($q_penjualan)) { ?>
                    <tr>
                        <td><?= $row['id_penjualan'] ?></td>
                        <td><?= htmlspecialchars($row['nama']) ?></td>
                        <td><?= htmlspecialchars($row['nama_produk']) ?></td>
                        <td><?= $row['jumlah'] ?></td>
                        <td>Rp <?= number_format($row['total'], 0, ',', '.') ?></td>
                        <td><?= $row['tanggal'] ?></td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </section>
    </main>

    <footer>
        <p>Tugas ISCOM - Toko Online</p>
    </footer>
</body>
</html>
