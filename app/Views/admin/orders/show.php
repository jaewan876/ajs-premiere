<?= $this->extend('layout/admin_template') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="d-flex justify-content-between py-4">
        <div class="d-flex align-items-center">
            <!--  -->
            <nav aria-label="breadcrumb">
		        <ol class="breadcrumb">
		            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
		            <li class="breadcrumb-item"><a href="<?= base_url('admin/orders') ?>">Orders</a></li>
		            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
		        </ol>
		    </nav>
        </div>
        <div class="">
            <!-- controls -->
        </div>
    </div>

	<section class="pb-5">
		<h1>
			<?= $title ?>
		</h1>
	</section>

	<section class="row">
		<div class="col">
			<table class="table">
				<th colspan="3">Item</th>
				<th>Qty</th>
				<th colspan="1">Price</th>
				<th></th>
				<tbody>
					<?php foreach ($items as $key => $value): ?>
					<tr>
						<td colspan="3"><?= $value['name'] ?></td>
						<td><?= $value['item_qty'] ?></td>
						<td colspan="1"><?= number_to_currency($value['item_price'] ?? 0, 'USD', 'en_US', 2) ?></td>
						<td colspan="1"><?= number_to_currency($value['item_total'] ?? 0, 'USD', 'en_US', 2) ?></td>
					</tr>
					<?php endforeach ?>
					<tr class="fw-bold">
						<td colspan="4"></td>
						<td>Subtotal</td>
						<td><?= number_to_currency($orders['order_subtotal'] ?? 0, 'USD', 'en_US', 2) ?></td>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td>Tax</td>
						<td><?= number_to_currency(0, 'USD', 'en_US', 2) ?></td>
					</tr>
					<tr>
						<td colspan="4"></td>
						<td>Discount</td>
						<td><?= number_to_currency(0, 'USD', 'en_US', 2) ?></td>
					</tr>
					<tr class="fw-bold">
						<td colspan="4"></td>
						<td>Total</td>
						<td><?= number_to_currency($orders['order_total'] ?? 0, 'USD', 'en_US', 2) ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>
</div>


<?= $this->endSection() ?>