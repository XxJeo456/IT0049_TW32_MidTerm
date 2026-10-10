<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2>Product Management</h2>
    <a href="<?= site_url('/products/create') ?>" class="btn btn-primary">Add New Product</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td>
                            <?php if ($product['image']): ?>
                                <img src="<?= base_url('uploads/products/' . $product['image']) ?>" width="40" height="40" style="object-fit:cover; border-radius: 4px;">
                            <?php else: ?>
                                <span style="color: #6c757d;">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td><?= esc($product['name']) ?></td>
                        <td>PHP <?= number_format($product['price'], 2) ?></td>
                        <td><?= $product['stock_quantity'] ?></td>
                        <td>
                            <a href="<?= site_url('/products/edit/' . $product['id']) ?>" class="btn btn-primary" style="padding: 0.2rem 0.5rem; font-size: 0.8rem;">Edit</a>
                            <a href="<?= site_url('/products/delete/' . $product['id']) ?>" class="btn" style="background-color: #dc3545; color: white; padding: 0.2rem 0.5rem; font-size: 0.8rem;" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" style="text-align: center;">No products found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>