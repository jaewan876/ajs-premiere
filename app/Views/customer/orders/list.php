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
				<th colspan="3">Orders</th>
				<th>Qty</th>
				<th colspan="1">Price</th>
				<th>Status</th>
				<th></th>
				<tbody>
					<?php foreach ($orders as $key => $value): ?>
					<tr>
						<td colspan="3">
							<p>
								<?= $value['order_id'] ?>
							</p>
						</td>
						<td><?= $value['order_quantity'] ?></td>
						<td colspan="1"><?= number_to_currency($value['order_total'] ?? 0, 'USD', 'en_US', 2) ?></td>
						<td>
							<span class="badge bg-light text-dark">
								<?= $value['order_status'] ?>
							</span>
						</td>
						<td>
							<a href="<?= base_url('account/orders/'.$value['order_id']) ?>">view</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</section>
</div>


<?= $this->endSection() ?>