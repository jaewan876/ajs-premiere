<?= $this->extend('layout/default_template') ?>

<?= $this->section('content') ?>

<div class="container py-5">

	<div class="row d-flex align-items-center justify-content-center mt-5">
        <div class="col-xl-4 col-lg-6 col-md-6 bg-light">

            <!-- SIGNUP FORM -->
            <form method="post" action="<?= base_url('signup') ?>" class="bg-light p-3">
                <?= csrf_field() ?>
                <div class="row">
                    <div class="col-12">
                        <h4>Signup</h4>
                        <hr>
                        
                        <?php if(session()->has('error')): ?>
                            <span class="text-danger"><?= session()->get('error') ?></span>
                        <?php endif ?>

                        <input type="hidden" name="redirect_error" value="<?= current_url() ?>">
                        <input type="hidden" name="redirect_success" value="<?= base_url('login') ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">Firstname</label>
                            <input name="firstname" type="text" class="form-control" placeholder="" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="form-label">Lastname</label>
                            <input class="form-control" name="lastname" type="text" placeholder="" required>
                        </div>
                    </div>  
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input class="form-control" name="email" type="email" placeholder="" value="<?= set_value('email') ?>" required>
                        </div>
                    </div> 
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input class="form-control" name="password" type="password" placeholder="" required>
                        </div>
                    </div>                    
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="form-group">
                            <label class="form-label">Confirm Password</label>
                            <input class="form-control" name="password_confirm" type="password" placeholder="" required>
                        </div>
                    </div>  
                </div>
                <div class="row mb-3">
                    <div class="col-12">
                        <button type="submit" class="form-control btn btn-primary">Create Account</button>
                    </div>
                </div>
            </form>
            <!-- SIGNUP FORM -->

        </div>
    </div>

</div>

<?= $this->endSection() ?>