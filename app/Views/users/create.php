<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2>Add New Staff Member</h2>

<div class="card">
    <form action="<?= site_url('/users/store') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Username</label>
            <input type="text" name="username" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Full Name</label>
            <input type="text" name="full_name" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Password</label>
            <input type="password" name="password" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Avatar Image</label>
            <input type="file" name="avatar" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;">
        </div>

        <button type="submit" class="btn btn-primary">Save Staff</button>
        <a href="<?= site_url('/users') ?>" style="margin-left: 1rem; color: #6c757d; text-decoration: none;">Cancel</a>
    </form>
</div>
<?= $this->endSection() ?>