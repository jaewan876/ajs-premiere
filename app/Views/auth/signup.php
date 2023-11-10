<?= $this->extend('layout/default_template') ?>

<?= $this->section('content') ?>

<div class="container">

	<div class="row d-flex align-items-center justify-content-center mt-5">

        
        <div class="col-xl-4 col-lg-6 col-md-6 bg-light">

            <!-- SIGNUP FORM -->
            <form method="post" action="<?= base_url('signup') ?>" class="bg-light p-3">
                <?= csrf_field() ?>
                <div class="row g-3 mb-3">
                    <div class="col-12">
                        <h4>Signup</h4>
                        
                        <?php if(session()->has('error')): ?>
                            <span class="text-danger"><?= session()->get('error') ?></span>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Firstname</label>
                        <input name="firstname" type="text" class="form-control" placeholder="Firstname" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Lastname</label>
                        <input name="lastname" type="text" class="form-control" placeholder="Lastname" required>
                    </div>  
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-12">
                        <label class="form-label" for="">Email</label>
                        <input name="email" type="email" class="form-control" placeholder="Enter email" value="<?= set_value('email') ?>" required>
                    </div> 
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-12">
                        <label class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                    </div>                    
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-12">
                        <label class="form-label">Confirm Password</label>
                        <input name="password_confirm" type="password" class="form-control" placeholder="Password" required>
                    </div>  
                </div>
                <div class="row g-3">
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