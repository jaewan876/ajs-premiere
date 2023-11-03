<?= $this->extend('layout/admin_template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="d-flex justify-content-between py-4">
        <div class="d-flex align-items-center">
            <!--  -->
            <a class="me-3" href="<?= base_url('admin/user/admin') ?>">
                <i class="bi bi-arrow-left"></i>
            </a>
            <h4 class="mb-0"><?= $title ?></h4>
        </div>
        <div class="">
            <!-- controls -->
            
        </div>
    </div>

    <!-- Form Section -->
    <div class="row">
        <div class="col-md-12">
            <form method="post" action="<?= base_url('admin/user/admin') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="redirect_error" value="<?= current_url() ?>">
                <input type="hidden" name="redirect_success" value="<?= base_url('admin/user/admin') ?>">

                <?php if(session()->has('error')): ?>
                    <span class="text-danger"><?= session()->get('error') ?></span>
                <?php endif ?>

                <p>
                    Field make with (<strong>*</strong>) asterisk are required
                </p>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="">Username *</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="">Email *</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="">Password *</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="">Confirm Password *</label>
                            <input type="password" class="form-control" name="password_confirm" required>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="">Firstame</label>
                            <input class="form-control" type="text" name="firstname">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="">Lastame</label>
                            <input class="form-control" type="text" name="lastname">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="">Role *</label>
                            <select class="form-control" name="role" id="">
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Form Section -->
</div>

<?= $this->endSection() ?>