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
                <th>Order ID</th>
                <th>Items</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <th>Updated</th>
                <th>Action</th>
                <tbody>
                    <?php if (!empty($orders)): ?>
                        <?php foreach ($orders as $key => $value): ?>
                        <tr>
                            <td>
                                
                            </td>
                            <td><?= $value['order_id'] ?></td>
                            <td><?= $value['price'] ?></td>
                            <td><?= $value['order_id'] ?></td>
                            <td><?= $value['order_id'] ?></td>
                            <td><?= date('M d, Y', strtotime($value['updated_at'])) ?></td>
                            <td>
                                <a class="btn btn-sm btn-ligh" href="<?= base_url('admin/orders/edit/'.$value['order_id']) ?>">
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