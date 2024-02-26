<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>

    <form action="<?= base_url('register/save'); ?>" method="post">
        <?= csrf_field() ?>
        <label for="username">username</label>
        <input type="text" name="username" id="username" value="<?= old('username') ?>">
    
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?= old('email') ?>">
    
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
        <button type="submit">Register</button>
    </form>

    <?php if (isset($validation)): ?>
        <ul>
            <?php foreach ($validation->getErrors() as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>