<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice</title>
    </head>
    <body>
        <form action="<?= base_url('beli-checkout'); ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="code_product" value="<?= $invoice['code']; ?>" readonly />

            <label>Nama Produk:</label><br>
            <input type="text" name="nama_product" value="<?= $invoice['nama_product']; ?>" readonly /><br>
            <label>Harga:</label><br>
            <input type="text" name="harga" value="<?= $invoice['harga']; ?>" readonly /><br>

            <label>Tujuan:</label><br>
            <input type="text" name="tujuan" value="<?= $invoice['tujuan']; ?>" readonly /><br>

            <label>Hash trx:</label><br>
            <input type="text" name="hash" value="<?= $invoice['hash_id']; ?>" readonly /><br>

            <button type="submit">proses</button>
        </form>

    </body>
</html>