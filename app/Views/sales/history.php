<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2>Sales History</h2>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product</th>
                <th>Customer</th>
                <th>Sold By (Staff)</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($sales)): ?>
                <?php foreach ($sales as $sale): ?>
                    <tr>
                        <td>#<?= $sale['id'] ?></td>
                        <td><?= esc($sale['product_name']) ?></td>
                        <td><?= $sale['customer_name'] ? esc($sale['customer_name']) : '<span style="color: #6c757d;">Walk-in</span>' ?></td>
                        <td><?= esc($sale['staff_name']) ?></td>
                        <td><?= $sale['quantity'] ?></td>
                        <td>PHP <?= number_format($sale['total_price'], 2) ?></td>
                        <td><?= $sale['created_at'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="7" style="text-align: center;">No sales recorded yet.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>