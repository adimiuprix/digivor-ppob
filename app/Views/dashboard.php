<?= $nama; ?>
<?= $saldo; ?>
<?= $email; ?>
<?php if (!empty($notify)) : ?>
    <div><?= $notify ?></div>
<?php endif; ?>

<?php foreach($categories as $category): ?>
    <a href="<?= base_url('order/' . $category['category']); ?>"><?= $category['category']; ?></a>
<?php endforeach; ?>