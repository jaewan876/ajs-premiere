<?= $this->extend('layout/admin_template') ?>

<?= $this->section('content') ?>

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
            <a class="btn btn-sm btn-success" href="<?= base_url('admin/category/add') ?>"><i class="bi bi-pencil-square"></i> ADD</a>
        </div>
    </div>

    <h4 class="mb-0"><?= $title ?></h4>

    <div class="row">
        <div class="col">
            <table class="table">
                <th>Name</th>
                <th>Updated</th>
                <th>Action</th>
                <tbody>
                    <?php if (!empty($categories)): ?>
                        <?php foreach ($categories as $key => $value): ?>
                        <tr>
                            <td><?= $value['category_name'] ?></td>
                            <td><?= date('M d, Y', strtotime($value['category_updated_at'])) ?></td>
                            <td>
                                <a class="btn btn-sm btn-ligh" href="<?= base_url('admin/category/edit/'.$value['category_id']) ?>">
                                    <i class="bi bi-pencil-square"></i> Edit
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