<?= $this->extend('layout/admin_template') ?>

<?= $this->section('content') ?>

<?php
    function display_image($image = null){
        return base_url($image);
    }
?>

<div class="container">
    <div class="d-flex justify-content-between py-4">
        <div class="d-flex align-items-center">
            <!--  -->
            <nav aria-label="breadcrumb">
		        <ol class="breadcrumb">
		            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
		            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
		        </ol>
		    </nav>
        </div>
        <div class="">
            <!-- controls -->
            <a class="btn btn-sm btn-success" href="<?= base_url('admin/products/add') ?>"><i class="bi bi-pencil-square"></i> ADD</a>
        </div>
    </div>

    <h4 class="mb-0"><?= $title ?></h4>

    <div class="row">
        <div class="col">
            <table class="table">
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>SKU</th>
                <th>In-Stock</th>
                <th>Updated</th>
                <th>Action</th>
                <tbody>
                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $key => $value): ?>
                        <tr>
                            <td>
                                <img 
                                    class="cover-sm-rounded" 
                                    src="<?= display_image($value['image']) ?>" 
                                    width="50" 
                                    style="object-fit: cover;">
                            </td>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['price'] ?></td>
                            <td><?= $value['sku'] ?></td>
                            <td><?= $value['in_stock'] ?></td>
                            <td><?= date('M d, Y', strtotime($value['updated_at'])) ?></td>
                            <td>
                                <a class="btn btn-sm btn-ligh" href="<?= base_url('admin/products/edit/'.$value['product_id']) ?>">
                                    <i class="bi bi-pencil-square"></i> View
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">
                                <p class="text-center py-2">No result found</p>
                            </td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>