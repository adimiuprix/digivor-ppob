<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= base_url('beli-proses'); ?>" method="post">
        <?= csrf_field() ?>
        <select name="product" class="form-control">
            <?php foreach ($products as $product): ?>
            <option value="<?= $product['code']; ?>"><?= $product['nama']; ?></option>
            <?php endforeach; ?>
        </select>

        <select name="harga" class="form-control">
            <?php foreach ($products as $product): ?>
            <option value="<?= $product['harga']; ?>">Rp <?= $product['harga']; ?></option>
            <?php endforeach; ?>
        </select>

        <input type="number" name="tujuan">

        <button type="submit">Bayar</button>
    </form>
</body>
</html>