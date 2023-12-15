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
				<th>Qty</th>
				<th>Total</th>
				<tbody>
					<?php foreach ($items as $key => $value): ?>
					<tr>
						<td><?= $value['item_id'] ?></td>
						<td><?= $value['item_price'] ?></td>
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
							<div class="d-flex align-items-center">
								<button class="btn btn-light">
									<i class="bi bi-plus"></i>
								</button>
								<input class="text-center" type="number" size="5" value="<?= $value['item_qty'] ?>" min="1" readonly>
								<button class="btn btn-light">
									<i class="bi bi-dash"></i>
								</button>
							</div>
						</td>
						<td><?= $value['item_price'] * $value['item_qty'] ?></td>
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