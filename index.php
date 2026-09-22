<?php
require_once 'products.php';
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Inventaris Toko Bangunan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 25px; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f8f9fa; }
        .kritis { background-color: #ffcccc; color: #8b0000; font-weight: bold; }
    </style>
</head>
<body>

    <h2>Sistem Informasi Inventaris Toko Bangunan</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataProduk as $item): ?>
                <?php $statusKritis = cekStokKritis($item['stok']); ?>
                <tr class="<?= $statusKritis ? 'kritis' : '' ?>">
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['nama'] ?></td>
                    <td><?= $item['kategori'] ?></td>
                    <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                    <td><?= $item['stok'] ?></td>
                    <td><?= $item['deskripsi'] ?></td>
                    <td><?= $statusKritis ? 'Stok Kritis (< 3)!' : 'Aman' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h3>Total Nilai Aset Keseluruhan: Rp <?= number_format(hitungTotalAset($dataProduk), 0, ',', '.') ?></h3>

</body>
</html>