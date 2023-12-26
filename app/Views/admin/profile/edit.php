<?= $this->extend('layout/admin_template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="d-flex justify-content-between py-4">
        <div class="d-flex align-items-center">
            <!--  -->
            <a class="me-3" href="<?= base_url('account') ?>">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="">
            <!-- controls -->
            
        </div>
    </div>

    <p>
        Field make with (<strong>*</strong>) asterisk are required
    </p>

    <!-- Form Section -->
    <div class="row mb-3">
        <div class="col-md-12">
            <form method="post" action="<?= base_url('account/profile/email/'.$user['user_id']) ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="redirect_error" value="<?= current_url() ?>">
                <input type="hidden" name="redirect_success" value="<?= current_url() ?>">

                <h5>Change Email</h5>

                <?php if(session()->has('email_error')): ?>
                    <span class="text-danger"><?= session()->get('email_error') ?></span>
                <?php endif ?>

                <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="">Email *</label>
                            <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Form Section -->

    <!-- Form Section -->
    <div class="row mb-3">
        <div class="col-md-12">
            <form method="post" action="<?= base_url('account/profile/name') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="redirect_error" value="<?= current_url() ?>">
                <input type="hidden" name="redirect_success" value="<?= current_url() ?>">

                <h5>Change Name</h5>

                <?php if(session()->has('name_error')): ?>
                    <span class="text-danger"><?= session()->get('name_error') ?></span>
                <?php endif ?>

                <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">

                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="">Firstame</label>
                            <input class="form-control" type="text" name="firstname" value="<?= $user['firstname'] ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="">Lastame</label>
                            <input class="form-control" type="text" name="lastname" value="<?= $user['lastname'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Form Section -->

    <!-- Form Section -->
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="<?= base_url('account/profile/password') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="redirect_error" value="<?= current_url() ?>">
                <input type="hidden" name="redirect_success" value="<?= current_url() ?>">

                <h5>Change Password</h5>

                <?php if(session()->has('password_error')): ?>
                    <span class="text-danger"><?= session()->get('password_error') ?></span>
                <?php endif ?>

                <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
                
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="">Previous Password *</label>
                            <input class="form-control" type="password" name="prev_password" required>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="">New Password *</label>
                            <input class="form-control" type="password" name="new_password" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="">Confirm Password *</label>
                            <input class="form-control" type="password" name="confirm_password" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Form Section -->
</div>

<?= $this->endSection() ?>