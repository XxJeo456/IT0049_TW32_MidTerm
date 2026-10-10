<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2>Customer Management</h2>
    <a href="<?= site_url('/customers/create') ?>" class="btn btn-primary">Add New Customer</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($customers)): ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td>#<?= $customer['id'] ?></td>
                        <td><?= esc($customer['full_name']) ?></td>
                        <td><?= esc($customer['email']) ?></td>
                        <td><?= esc($customer['phone']) ?: 'N/A' ?></td>
                        <td>
                            <a href="<?= site_url('/customers/edit/' . $customer['id']) ?>" class="btn btn-primary" style="padding: 0.2rem 0.5rem; font-size: 0.8rem;">Edit</a>
                            <a href="<?= site_url('/customers/delete/' . $customer['id']) ?>" class="btn" style="background-color: #dc3545; color: white; padding: 0.2rem 0.5rem; font-size: 0.8rem;" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" style="text-align: center;">No customers found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>