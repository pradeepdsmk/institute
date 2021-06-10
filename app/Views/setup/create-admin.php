<?= $this->extend('default-layout') ?>


<?= $this->section('content') ?>

<div class="signin-form-wrap">

    <form method="post" action="/setup/create_admin" class="form">
        <h3 class="title mb-3">Create Admin</h3>

        <div class="content">
            <?php if (isset($signin_error) && ($signin_error != '')) : ?>
                <div class="alert alert-warning" role="alert">
                    <?= $signin_error ?>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required />
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required />
            </div>
            <div class="d-grid mb-3">
                <button type="submit" name="signin-submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>

</div>

<?= $this->endSection() ?>