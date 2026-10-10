<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2>POS Dashboard</h2>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
    <div class="card" style="text-align: center;">
        <h3 style="color: #6c757d; font-size: 1rem; margin-bottom: 0.5rem;">Total Products</h3>
        <p style="font-size: 2rem; font-weight: bold; color: #343a40; margin: 0;"><?= $total_products ?></p>
        <a href="<?= site_url('/products') ?>" class="btn btn-primary" style="margin-top: 1rem; display: inline-block;">Manage Products</a>
    </div>

    <div class="card" style="text-align: center;">
        <h3 style="color: #6c757d; font-size: 1rem; margin-bottom: 0.5rem;">Total Customers</h3>
        <p style="font-size: 2rem; font-weight: bold; color: #343a40; margin: 0;"><?= $total_customers ?></p>
        <a href="<?= site_url('/customers') ?>" class="btn btn-primary" style="margin-top: 1rem; display: inline-block;">Manage Customers</a>
    </div>

    <div class="card" style="text-align: center;">
        <h3 style="color: #6c757d; font-size: 1rem; margin-bottom: 0.5rem;">Total Sales Recorded</h3>
        <p style="font-size: 2rem; font-weight: bold; color: #343a40; margin: 0;"><?= $total_sales ?></p>
        <a href="<?= site_url('/sales/record') ?>" class="btn btn-primary" style="margin-top: 1rem; display: inline-block;">Record New Sale</a>
    </div>
</div>
<?= $this->endSection() ?>