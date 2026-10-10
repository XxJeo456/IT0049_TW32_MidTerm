<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2>Record New Sale</h2>

<form action="<?= site_url('/sales/store') ?>" method="post">
    <?= csrf_field() ?>
    
    <div class="mb-3">
        <label for="product_id" class="form-label">Product</label>
        <select name="product_id" id="product_id" class="form-select" required>
            <option value="">-- Select Product --</option>
            <?php foreach ($products as $product): ?>
                <option value="<?= $product['id'] ?>">
                    <?= esc($product['name']) ?> (PHP <?= number_format($product['price'], 2) ?> | In Stock: <?= $product['stock_quantity'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="customer_id" class="form-label">Customer (Optional)</label>
        <select name="customer_id" id="customer_id" class="form-select">
            <option value="">-- Walk-in Customer --</option>
            <?php foreach ($customers as $customer): ?>
                <option value="<?= $customer['id'] ?>"><?= esc($customer['full_name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1" required>
    </div>

    <button type="submit" class="btn btn-primary">Complete Sale</button>
</form>
<?= $this->endSection() ?>