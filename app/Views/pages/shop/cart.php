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
				<th colspan="3" class="th-lg">Item</th>
				<th></th>
				<th colspan="1">Price</th>
				<tbody>
					<?php foreach ($items as $key => $value): ?>
					<tr>
						<td colspan="3">
							<p>
								<?= $value['name'] ?>
							</p>

							<div class="d-inline-block">
								<form method="post" action="<?= base_url('cart/update/'.$value['item_id']) ?>">
									<input type="hidden" name="redirect_success" value="<?= current_url() ?>">
									<input type="hidden" name="redirect_error" value="<?= current_url() ?>">
									<input type="hidden" name="item_price" value="<?= $value['price'] ?>">
									<select name="item_qty" id="cart_item_qty" onchange='this.form.submit()'>
										<?php for ($i = 1; $i <= 20; $i++): ?>
											<option value="<?= $i ?>" <?= ($i == $value['item_qty'] ? 'selected':'') ?>><?= $i ?></option>
										<?php endfor ?>
									</select>
								</form>
							</div>

							<div class="" hidden>
								<form method="post" action="<?= base_url('cart/update/'.$value['item_id']) ?>">
									<input type="hidden" name="redirect_success" value="<?= current_url() ?>">
									<input type="hidden" name="redirect_error" value="<?= current_url() ?>">
									<div class="input-group input-group-sm border" id="cart_item_qty" data-id="<?= $value['item_id'] ?>">
										<button class="btn btn-light btn-outline-secondary btn-minus border" type="button">
											<i class="bi bi-plus"></i>
										</button>
										<input class="border text-center" name="item_qty" type="number" value="<?= $value['item_qty'] ?>" min="1" max="10" readonly>
										<button class="btn btn-plus btn-outline-secondary border" type="button">
											<i class="bi bi-dash"></i>
										</button>
									</div>
								</form>
							</div>
							<div class="d-inline-block px-1">
								<form method="post" action="<?= base_url('cart/remove/'.$value['item_id']) ?>">
									<input type="hidden" name="redirect_success" value="<?= current_url() ?>">
									<input type="hidden" name="redirect_error" value="<?= current_url() ?>">
									<button class="btn text-danger" title="Delete">
										<i class="bi bi-x-lg"></i> Delete
									</button>
								</form>
							</div> 
							
							
						</td>
						<td></td>
						<td colspan="1"><?= number_to_currency($value['item_price'] ?? 0, 'USD', 'en_US', 2) ?></td>
					</tr>
					<?php endforeach ?>
					
					<?php if ($subtotal): ?>
					<tr class="fw-bold">
						<td colspan="3"></td>
						<td colspan="1">
							Subtotal (<?= $quantity ?> <?= $quantity > 1 ? 'items':'item' ?>):
						</td>
						<td colspan="1">
							<?= number_to_currency($subtotal ?? 0, 'USD', 'en_US', 2) ?>
						</td>
					</tr>
					<?php endif ?>
					
				</tbody>
			</table>
		</div>
		<div class="col-3">
			<div>
				<table class="table table-borderless">
					<tbody>
						<tr>
							<td>Subtotal</td>
							<td><?= number_to_currency($subtotal ?? 0, 'USD', 'en_US', 2) ?></td>
						</tr>
						<tr>
							<td>Tax</td>
							<td><?= number_to_currency(0, 'USD', 'en_US', 2) ?></td>
						</tr>
						<tr>
							<td>Discount</td>
							<td><?= number_to_currency(0, 'USD', 'en_US', 2) ?></td>
						</tr>
						<tr>
							<td>
								<b>Total</b>
							</td>
							<td>
								<b><?= number_to_currency($total ?? 0, 'USD', 'en_US', 2) ?></b>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="mb-3">
				<a class="btn btn-light mb-1" href="<?= base_url('products') ?>">
					<i class="bi bi-arrow-left"></i> Continue Shopping
				</a>

				<?php if ($total): ?>
				<a class="btn btn-success mb-1" href="<?= base_url('checkout') ?>">
					Checkout <i class="bi bi-arrow-right"></i>
				</a>
				<?php endif ?>
			</div>			
		</div>
	</section>
</div>

<?= $this->endSection() ?>