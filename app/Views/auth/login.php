<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <form action="<?= base_url('login/proses'); ?>" method="post">
        <?= csrf_field() ?>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= old('email') ?>">
    
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    
        <button type="submit">Login</button>
    </form>

    <?php if (isset($validation)): ?>
        <ul>
            <?php foreach ($validation->getErrors() as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (session()->has('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>
</body>
</html>