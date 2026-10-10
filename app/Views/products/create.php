<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2>Add New Product</h2>

<div class="card">
    <form action="<?= site_url('/products/store') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Product Name</label>
            <input type="text" name="name" value="<?= old('name') ?>" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Price (PHP)</label>
            <input type="number" step="0.01" name="price" value="<?= old('price') ?>" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Stock Quantity</label>
            <input type="number" name="stock_quantity" value="<?= old('stock_quantity') ?>" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Product Image</label>
            <input type="file" name="image" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Product</button>
        <a href="<?= site_url('/products') ?>" style="margin-left: 1rem; color: #6c757d; text-decoration: none;">Cancel</a>
    </form>
</div>
<?= $this->endSection() ?>