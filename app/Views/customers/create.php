<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h2>Add New Customer</h2>

<div class="card">
    <form action="<?= site_url('/customers/store') ?>" method="post">
        <?= csrf_field() ?>
        
        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Full Name</label>
            <input type="text" name="full_name" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Email</label>
            <input type="email" name="email" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;" required>
        </div>

        <div style="margin-bottom: 1rem;">
            <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Phone</label>
            <input type="text" name="phone" style="width: 100%; padding: 0.5rem; border: 1px solid #ced4da; border-radius: 4px;">
        </div>

        <button type="submit" class="btn btn-primary">Save Customer</button>
        <a href="<?= site_url('/customers') ?>" style="margin-left: 1rem; color: #6c757d; text-decoration: none;">Cancel</a>
    </form>
</div>
<?= $this->endSection() ?>