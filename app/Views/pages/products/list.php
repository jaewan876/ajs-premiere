<?= $this->extend('layout/default_template') ?>

<?= $this->section('content') ?>

<div class="container">

	<section class="py-4">
		<h1>
			<?= $title ?>
		</h1>
	</section>

	<div class="row">
		<?php if (!empty($products)): ?>
			<?php foreach ($products as $key => $product): ?>
				<div class="col-sm-6 col-md-6 col-lg-3 mb-3">
					
					<div class="card">
						<div class="card-image" style="">
							<img src="<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['name'] ?>" loading="lazy">
						</div>
						<div class="card-body">
							<h5 class="card-title"><?= $product['name'] ?></h5>
							<div class="d-flex align-items-center justify-content-between">
								<span><strong>$<?= $product['price'] ?></strong></span>
								<button class="btn btn-primary btn-sm" id="add_to_cart" data-id="<?= $product['product_id'] ?>">
									Add to cart
								</button>
							</div>
						</div>
					</div>

				</div>
			<?php endforeach ?>
		<?php endif ?>
	</div>
</div>

<?= $this->endSection() ?>