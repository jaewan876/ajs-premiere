<?= $this->extend('layout/default_template') ?>

<?= $this->section('content') ?>

<div class="container">

	<div class="row align-items-center justify-content-center mt-5">
        <div class="col-xl-4 col-lg-6 col-md-6 bg-light">

            <!-- LOGIN FORM -->
            <form method="post" action="<?= base_url('login') ?>" class="login-form bg-light p-3">
                <?= csrf_field() ?>
                <div class="row g-3 mb-3">
                    <div class="col-12">
                        <h4>Login</h4>
                        
                        <?php if(session()->has('error')): ?>
                            <span class="text-danger"><?= session()->get('error') ?></span>
                        <?php endif ?>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="">Email</label>
                        <input name="email" type="email" class="form-control" id="" aria-describedby="" placeholder="Enter email" value="<?= set_value('email') ?>" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="form-control btn btn-primary">Log In</button>
                    </div>
                </div>
            </form>
            <!-- LOGIN FORM -->

        </div>
    </div>

</div>

<?= $this->endSection() ?>