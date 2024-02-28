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

    <?php
        // Array daftar tipe barang untuk setiap kategori
        $typeProductList = array(
            'DANA' => array(
                array('nama' => 'Dana', 'harga' => '5000', 'code' => 'DANA1'),
                array('nama' => 'Dana', 'harga' => '10000', 'code' => 'DANA5'),
                array('nama' => 'Dana', 'harga' => '50000', 'code' => 'DANA50')
            ),
            'OVO' => array(
                array('nama' => 'Ovo', 'harga' => '30000', 'code' => 'VUJBHKH'),
                array('nama' => 'Ovo', 'harga' => '40000', 'code' => 'FHBIB78C')
            ),
            'SEABANK' => array(
                array('nama' => 'Seabank', 'harga' => '20000', 'code' => 'SJHIOTB'),
                array('nama' => 'Seabank', 'harga' => '50000', 'code' => 'PGBUFG')
            )
        );

    ?>

    <form action="<?= base_url('purchase-payment'); ?>" method="post">
        <?= csrf_field() ?>
        <div class="container">
            <h2>Pilih salah satu kategori:</h2>
            <div class="input-group">
                <input type="radio" id="truck" name="name_product" value="DANA">
                <label>Dana</label>
            </div>
            <div class="input-group">
                <input type="radio" id="mobil" name="name_product" value="OVO">
                <label>Ovo</label>
            </div>
            <div class="input-group">
                <input type="radio" id="motor" name="name_product" value="SEABANK">
                <label>Seabank</label>
            </div>

            <br/><br/>
            <!-- Hasilnya di render disini -->
            <div id="daftar"></div>
        </div>

        <input type="text" name="code_product" id="code_input" placeholder="code produk">
        <input type="number" name="tujuan" placeholder="No. Tujuan">
        <button type="submit">Bayar</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(() => {
        // Data daftar tipe barang dalam bentuk JSON
        const typeProductList = <?php echo json_encode($typeProductList); ?>;

        $("input[type='radio']").change(() => {
            const selectedValue = $("input[name='name_product']:checked").val();
            $('#daftar').show();

            // Mendapatkan daftar tipe barang sesuai dengan kategori yang dipilih
            const prodList = typeProductList[selectedValue];

            // Menyiapkan variabel untuk menyimpan konten yang akan ditampilkan
            let content = "";

            // Iterasi melalui daftar tipe barang dan menambahkan konten untuk setiap pilihan
            prodList.forEach(item => {
                content += `<input type="radio" name="price" value="${item.harga}" data-name="${item.nama}" data-harga="${item.harga}" data-code="${item.code}">${item.nama}, Harga: ${item.harga} Code: ${item.code}<br>`;
            });

            // Memasukkan konten ke dalam elemen dengan id "daftar"
            $('#daftar').html(content);
            
            // Menambahkan event listener untuk setiap input radio yang baru ditambahkan
            $('input[name="price"]').on('change', function() {
                const selectedCode = $(this).data('code'); // Mengambil nilai atribut data-code
                
                // Menetapkan nilai atribut data-code ke input dengan id "code_input"
                $('#code_input').val(selectedCode);
            });
        });
    });
    </script>
</body>
</html>