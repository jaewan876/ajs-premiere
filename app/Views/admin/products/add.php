<?= $this->extend('layout/admin_template') ?>

<?= $this->section('content') ?>

<div class="container mb-5">
    <div class="d-flex justify-content-between py-4">
        <div class="d-flex align-items-center">
            <!--  -->
            <a class="me-3" href="<?= base_url('admin/products') ?>">
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
            <form method="post" enctype="multipart/form-data" action="<?= base_url('admin/products') ?>">
                <?= csrf_field() ?>
                <input type="hidden" name="user_id" value="<?= session()->get('user_id') ?>">
                <input type="hidden" name="redirect_error" value="<?= current_url() ?>">
                <input type="hidden" name="redirect_success" value="<?= base_url('admin/products') ?>">

                <?php if(session()->has('error')): ?>
                    <span class="text-danger"><?= session()->get('error') ?></span>
                <?php endif ?>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="">Name *</label>
                            <input class="form-control" type="text" name="name" required>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="">Description</label>
                            <textarea class="form-control" name="description" cols="30" rows="10" id="ck_editor5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="">Price *</label>
                            <input class="form-control" type="text" name="price">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="">Category *</label>
                            <select class="form-control" name="category">
                            	<option value="">Select Category</option>
                            	<?php if (!empty($categories)): ?>
                            		<?php foreach ($categories as $key => $value): ?>
                            			<option value="<?= $value['category_id'] ?>">
                                            <?= $value['category_name'] ?>         
                                        </option>
                            		<?php endforeach ?>
                            	<?php endif ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="">Publish *</label>
                            <select class="form-control" name="publish">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="">SKU</label>
                            <input class="form-control" type="text" name="sku">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label" for="">In Stock</label>
                            <input type="number" class="form-control" name="in_stock" min="0" max="100" value="0">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Max limit per order</label>
                            <input type="number" class="form-control" name="max_item_limit" min="0" max="100" value="0">
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label" for="">Image</label>
                            <input class="form-control" name="image" type="file" accept="image/png, image/jpg, image/jpeg" required>
                            <small>Maximum image size: 1000 x 1000</small><br>
                            <small>Maximum file size: 1MB</small><br>
                            <code>
                                Image formats: .png, .jpg, .jpeg
                            </code>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/currencyformatter.js/2.2.0/currencyFormatter.min.js" integrity="sha512-zaNuym1dVrK6sRojJ/9JJlrMIB+8f9IdXGzsBQltqTElXpBHZOKI39OP+bjr8WnrHXZKbJFdOKLpd5RnPd4fdg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?= $this->endSection() ?>