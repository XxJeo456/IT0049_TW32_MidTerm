<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - POS System</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body style="display: flex; align-items: center; justify-content: center; height: 100vh; background-color: #f8f9fa;">

<div style="width: 100%; max-width: 400px;">
    <div class="card">
        <h2 style="text-align: center; margin-bottom: 1.5rem;">POS Login</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form action="<?= site_url('/login') ?>" method="post">
            <?= csrf_field() ?>
            
            <div style="margin-bottom: 1rem;">
                <label for="username" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Username</label>
                <input type="text" name="username" id="username" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required autofocus>
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label for="password" style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Password</label>
                <input type="password" name="password" id="password" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.75rem; text-align: center;">Login</button>
        </form>
    </div>
</div>

</body>
</html>