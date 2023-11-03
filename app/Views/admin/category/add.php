<?= $this->extend('layout/admin_template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="d-flex justify-content-between py-4">
        <div class="d-flex align-items-center">
            <!--  -->
            <a class="me-3" href="<?= base_url('admin/category') ?>">
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
            <form method="put" action="<?= base_url('admin/category') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="redirect_error" value="<?= current_url() ?>">
                <input type="hidden" name="redirect_success" value="<?= base_url('admin/category') ?>">

                <?php if(session()->has('error')): ?>
                    <span class="text-danger"><?= session()->get('error') ?></span>
                <?php endif ?>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="">Name</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="">Description</label>
                            <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
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