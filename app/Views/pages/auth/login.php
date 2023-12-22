<?= $this->extend('layout/default_template') ?>

<?= $this->section('content') ?>

<div class="container py-5">

	<div class="row align-items-center justify-content-center mt-5">
        <div class="col-xl-4 col-lg-6 col-md-6 bg-light">

            <!-- LOGIN FORM -->
            <form method="post" action="<?= current_url() ?>" class="login-form bg-light p-3">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-12">
                        <h4>Login</h4>
                        <hr>
                        
                        <?php if(session()->has('error')): ?>
                            <span class="text-danger"><?= session()->get('error') ?></span>
                        <?php endif ?>
                        <input type="hidden" name="redirect" value="<?= $_GET['redirect'] ?? '' ?>">
                        <input type="hidden" name="redirect_error" value="<?= current_url(true) ?>">
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="form-label">
                                Email
                            </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input class="form-control" name="email" type="email" placeholder="Enter email" value="<?= set_value('email') ?>" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="" class="form-label">
                                Password
                            </label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="bi bi-key"></i>
                                </span>
                                <input class="form-control" name="password" type="password" placeholder="Enter password" required>
                            </div>
                        </div>
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