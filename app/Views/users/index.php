<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2>Staff Management</h2>
    <a href="<?= site_url('/users/create') ?>" class="btn btn-primary">Add New Staff</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Avatar</th>
                <th>Username</th>
                <th>Full Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td>
                            <?php if ($user['avatar']): ?>
                                <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" width="40" height="40" style="border-radius: 50%; object-fit: cover;">
                            <?php else: ?>
                                <span style="color: #6c757d;">No Avatar</span>
                            <?php endif; ?>
                        </td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['full_name']) ?></td>
                        <td>
                            <a href="<?= site_url('/users/edit/' . $user['id']) ?>" class="btn btn-primary" style="padding: 0.2rem 0.5rem; font-size: 0.8rem;">Edit</a>
                            <a href="<?= site_url('/users/delete/' . $user['id']) ?>" class="btn" style="background-color: #dc3545; color: white; padding: 0.2rem 0.5rem; font-size: 0.8rem;" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4" style="text-align: center;">No staff members found.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>