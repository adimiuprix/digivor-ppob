<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Payment</title>
</head>
<body>

    <?php if (!empty($notify)) : ?>
        <div><?= $notify ?></div>
    <?php endif; ?>

    <form action="<?= base_url('purchase-payment'); ?>" method="post">
        <?= csrf_field() ?>
        <select name="product" class="form-control">
            <?php foreach ($items as $item): ?>
            <option value=""><?= $item->nama_product; ?></option>
            <?php endforeach; ?>
        </select>
        <select name="product" class="form-control">
            <?php foreach ($productResults as $product): ?>
            <option value="<?= $product->code; ?>"><?= $product->nama; ?> Rp. <?= $product->harga; ?></option>
            <?php endforeach; ?>
        </select>
        <select name="price" class="form-control">
            <?php foreach ($productResults as $product): ?>
            <option value="<?= $product->harga; ?>">Rp. <?= $product->harga; ?></option>
            <?php endforeach; ?>
        </select>

        <input type="number" name="tujuan">

        <button type="submit">Bayar</button>
    </form>
</body>
</html>