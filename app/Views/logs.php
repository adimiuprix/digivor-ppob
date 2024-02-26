<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs transaction</title>
</head>
<body>
    <!-- Jika ada data transaksi -->
    <?php if (!empty($logTransactions)): ?>
    <table>
        <thead>
            <tr>
                <th>Nama produk</th>
                <th>Nomor tujuan</th>
                <th>Harga</th>
                <th>Code transaksi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- Looping untuk setiap transaksi -->
            <?php foreach ($logTransactions as $transaction): ?>
                <tr>
                    <td><?= $transaction['nama_product'] ?></td>
                    <td><?= $transaction['tujuan'] ?></td>
                    <td><?= $transaction['harga'] ?></td>
                    <td><?= $transaction['code'] ?></td>
                    <td><?= $transaction['status'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>Tidak ada data transaksi.</p>
    <?php endif; ?>
</body>
</html>