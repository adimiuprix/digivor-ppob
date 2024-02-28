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
        <div class="container">
            <h2>Pilih salah satu kategori:</h2>

            <?php foreach($categoryItems as $item): ?>
            <div class="input-group">
                <input type="radio" id="truck" name="name_product" value="<?= $item['nama_product']; ?>">
                <label><?= $item['nama_product']; ?></label>
            </div>
            <?php endforeach; ?>
            <br/><br/>
            <!-- Hasilnya di render disini -->
            <div id="daftar"></div>
        </div>

        <input type="hidden" name="code_product" id="code_input">
        <input type="number" name="tujuan" placeholder="No. Tujuan">
        
        <button type="submit">Bayar</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(() => {
        const typeProductList = <?= json_encode($formattedPayments) ?>;

        $("input[name='name_product']").change(() => {
            const selectedValue = $("input[name='name_product']:checked").val();
            $('#daftar').empty().show();

            const prodList = typeProductList[selectedValue];

            const content = prodList.map(item => {
                return `<input type="radio" name="price" value="${item.harga}" data-name="${item.nama}" data-harga="${item.harga}" data-code="${item.code}">${item.nama}, Harga: ${item.harga} Code: ${item.code}<br>`;
            }).join('');

            $('#daftar').html(content).find('input[name="price"]').on('change', function() {
                const selectedCode = $(this).data('code');
                $('#code_input').val(selectedCode);
            });
        });
    });
    </script>
</body>
</html>