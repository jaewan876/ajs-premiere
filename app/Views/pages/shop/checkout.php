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
			<table class="table mb-3">
				<th colspan="3" class="th-lg">Item</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Subtotal</th>
				<tbody>
					<?php foreach ($items as $key => $value): ?>
					<tr>
						<td colspan="3"><?= $value['name'] ?></td>
						<td>
							<?= $value['item_qty'] ?>
						</td>
						<td><?= number_to_currency($value['item_price'], 'USD', 'en_US', 2) ?></td>
						<td><?= number_to_currency($value['item_price'] * $value['item_qty'], 'USD', 'en_US', 2) ?></td>
					</tr>
					<?php endforeach ?>
					<tr>
						<td colspan="3"></td>
						<td>
							<b><?= $quantity ?></b>
						</td>
						<td></td>
						<td>
							<b><?= number_to_currency($subtotal, 'USD', 'en_US', 2) ?></b>
						</td>
					</tr>
				</tbody>
			</table>

			<?php if (!empty($cart[0]['cart_id']) && $total): ?>
			<div class="row">
				<div class="col">
					<h5>Payment Method</h5>
					<form method="post" action="<?= base_url('cart/update_payment/'.$cart[0]['cart_id'] ?? null) ?>">
						<input type="hidden" name="redirect_success" value="<?= current_url() ?>">
						<input type="hidden" name="redirect_error" value="<?= current_url() ?>">
						<div class="form-check">
							<input class="form-check-input" type="radio" name="payment_method" value="cash" id="cash_payment" <?= ($cart[0]['payment_method'] == 'cash'?'checked':'') ?> onchange="this.form.submit()">
							<label class="form-check-label" for="cash_payment">
								Cash
							</label>
						</div>
						<div class="form-check">
							<input class="form-check-input" type="radio" name="payment_method" value="card" id="card_payment" <?= ($cart[0]['payment_method'] == 'card'?'checked':'') ?> onchange="this.form.submit()">
							<label class="form-check-label" for="card_payment">
								Card
							</label>
						</div>
					</form>
				</div>
			</div>
			<?php endif ?>

		</div>
		<div class="col-3">
			<div>
				<table class="table table-borderless">
					<tbody>
						<tr>
							<td>Subtotal</td>
							<td><?= number_to_currency($subtotal, 'USD', 'en_US', 2) ?></td>
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
								<b><?= number_to_currency($total, 'USD', 'en_US', 2) ?></b>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="mb-3">
				<?php if ($items): ?>
					<?php 
						$paid_status = 0;

						if($cart[0]['payment_method'] == 'card'){
							$paid_status = 1;
						}
					?>
					<form method="post" action="<?= base_url('checkout') ?>">
						<input type="hidden" name="redirect_success" value="<?= base_url('account/orders') ?>">
						<input type="hidden" name="redirect_error" value="<?= current_url() ?>">
						<input type="hidden" name="cart_id" value="<?= $cart[0]['cart_id'] ?>">
						<input type="hidden" name="customer_id" value="<?= $cart[0]['customer_id'] ?>">

						<input type="hidden" name="payment_method" value="<?= $cart[0]['payment_method'] ?>">
						<input type="hidden" name="is_paid" value="<?= $paid_status ?>">
						<input type="hidden" name="quantity" value="<?= $quantity ?>">

						<input type="hidden" name="tax" value="0">
						<input type="hidden" name="discount" value="0">

						<input type="hidden" name="subtotal" value="<?= $subtotal ?>">
						<input type="hidden" name="total" value="<?= $total ?>">
						
						<a class="btn btn-light" href="<?= base_url('cart') ?>">
							<i class="bi bi-arrow-left"></i> Back to cart
						</a>
						<button class="btn btn-success">
							Place Order
						</button>
					</form>
				<?php else: ?>
					<a class="btn btn-light" href="<?= base_url('cart') ?>">
						<i class="bi bi-arrow-left"></i> Back to cart
					</a>
				<?php endif ?>
			</div>
		</div>
	</section>
</div>

<?= $this->endSection() ?>