<?= $this->extend('layout/default_template') ?>

<?= $this->section('content') ?>

<div class="container">
	<section class="py-5">
		<h1>
			<?= $title ?>
		</h1>
	</section>
			
	<section class="row cart">
		<div class="col pb-4">
			<table class="table">
				<th class="th-lg">Product</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total</th>
				<th></th>
				<tbody>
					<?php foreach ($items as $key => $value): ?>
					<tr>
						<td><?= $value['product_id'] ?></td>
						<td><?= number_to_currency($value['item_price'], 'USD', 'en_US', 2) ?></td>
						<td scope="1">
							<div class="input-group">
								<button class="btn">
									<i class="bi bi-plus"></i>
								</button>
								<input class="text-center" type="number" size="5" value="<?= $value['item_qty'] ?>" min="1" max="10" readonly>
								<button class="btn">
									<i class="bi bi-dash"></i>
								</button>
							</div>
						</td>
						<td><?= number_to_currency($value['item_price'] * $value['item_qty'], 'USD', 'en_US', 2) ?></td>
						<td>
							<form method="post" action="<?= base_url('cart/remove/'.$value['item_id']) ?>">
								<input type="hidden" name="redirect_success" value="<?= current_url() ?>">
								<input type="hidden" name="redirect_error" value="<?= current_url() ?>">
								<button class="btn text-danger" title="Delete">
									<i class="bi bi-x-lg"></i>
								</button>
							</form>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
		<div class="col-3">
			<h5>Summary</h5>
			<div class="mb-3">
				<a class="btn btn-light" href="<?= base_url('products') ?>">
					<i class="bi bi-arrow-left"></i> Continue Shopping
				</a>
			</div>

			<div class="d-flex align-items-center">
				<a class="btn btn-success" href="<?= base_url('checkout') ?>">
					Checkout <i class="bi bi-arrow-right"></i>
				</a>
			</div>
		</div>
	</section>
</div>

<?= $this->endSection() ?>