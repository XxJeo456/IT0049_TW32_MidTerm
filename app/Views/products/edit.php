<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2>Edit Product</h2>

<div class="card">
    <form action="<?= site_url('/products/update/' . $product['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Product Name</label>
            <input type="text" name="name" value="<?= esc($product['name']) ?>" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Price (PHP)</label>
            <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Stock Quantity</label>
            <input type="number" name="stock_quantity" value="<?= $product['stock_quantity'] ?>" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Product Image</label>
            <?php if ($product['image']): ?>
                <div style="margin-bottom: 0.5rem;">
                    <img src="<?= base_url('uploads/products/' . $product['image']) ?>" width="60" height="60" style="object-fit:cover; border-radius: 4px;">
                </div>
            <?php endif; ?>
            <input type="file" name="image" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;">
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
        <a href="<?= site_url('/products') ?>" style="margin-left: 1rem; color: #6c757d; text-decoration: none;">Cancel</a>
    </form>
</div>
<?= $this->endSection() ?>