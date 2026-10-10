<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POS System</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    
<nav class="navbar">
    <a class="navbar-brand" href="<?= site_url('/') ?>">POS System</a>
    
    <?php if (session()->get('isLoggedIn')): ?>
        <ul class="navbar-nav">
            <li><a href="<?= site_url('/products') ?>">Products</a></li>
            <li><a href="<?= site_url('/customers') ?>">Customers</a></li>
            <li><a href="<?= site_url('/users') ?>">Staff</a></li>
            <li><a href="<?= site_url('/sales/record') ?>">Record Sale</a></li>
            <li><a href="<?= site_url('/sales/history') ?>">Sales History</a></li>
        </ul>
        
        <div class="user-info">
            <?php if (session()->get('avatar')): ?>
                <img src="<?= base_url('uploads/avatars/' . session()->get('avatar')) ?>" alt="Avatar">
            <?php endif; ?>
            <span><?= esc(session()->get('full_name')) ?></span>
            <a href="<?= site_url('/logout') ?>" class="btn btn-outline-light">Logout</a>
        </div>
    <?php endif; ?>
</nav>

<div class="container">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>
</div>

</body>
</html>