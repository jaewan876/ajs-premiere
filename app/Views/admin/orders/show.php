<?= $this->extend('layout/admin_template') ?>

<?= $this->section('content') ?>

<div class="container mb-3">
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

	<section class="pb-4">
		<h1>
			<?= $title ?>
		</h1>
	</section>

	<section class="row mb-5">

		<div class="col-md-6">
			<table class="table">
				<tbody>
					<tr>
						<td>Order Time</td>
						<td><?= $orders['order_created_at'] ?></td>
					</tr>
					<tr>
						<td>Order Status</td>
						<td>
							<span class="badge bg-info text-dark">
								<?= ucfirst(str_replace("_", " ", $orders['order_status'])) ?>
							</span>
						</td>
					</tr>
					<tr>
						<td>Payment Status</td>
						<td>
							<?= $orders['order_is_paid'] == 0 ? 'Pending':'Completed' ?>
						</td>
					</tr>
					<tr>
						<td>Payment Method</td>
						<td><?= ucfirst($payment[0]['payment_method']) ?></td>
					</tr>					
				</tbody>
			</table>

			<form method="post" action="<?= base_url('admin/orders/status/'.$orders['order_id']) ?>">
				<input type="hidden" name="redirect" value="<?= current_url() ?>">
				<input type="hidden" name="redirect_success" value="<?= current_url() ?>">
				<div class="form-row">
					<div class="col-md-4">
						<div class="form-group">
							<label class="form-label" for="">Update Status</label>
							<div class="input-group">
								<span class="input-group-text">Status</span>
								<select class="form-select" name="status" onchange='this.form.submit()' required>
									<option value="">Select Status</option>
									<option value="pending">Pending</option>
									<option value="shipped">Shipped</option>
									<option value="in_transit">In transit</option>
									<option value="completed">Completed</option>
									<option value="delivered">Delivered</option>
									<option value="on_hold">On hold</option>
									<option value="canceled">Canceled</option>
									<option value="declined">Declined</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-6">
			update
		</div>
		
	</section>

	<section class="row">
		<div class="col">
			<h5>Item Details</h5>

			<table class="table">
				<th colspan="3">Item</th>
				<th>Qty</th>
				<th colspan="1">Price</th>
				<th>Total Price</th>
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