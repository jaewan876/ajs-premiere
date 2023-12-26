<?= $this->extend('layout/default_template') ?>

<?= $this->section('content') ?>

<div class="container">
	<section class="py-5">
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
						<td><?= number_to_currency($orders[0]['order_subtotal'] ?? 0, 'USD', 'en_US', 2) ?></td>
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
						<td><?= number_to_currency($orders[0]['order_total'] ?? 0, 'USD', 'en_US', 2) ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>
</div>


<?= $this->endSection() ?>