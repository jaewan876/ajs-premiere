<?= $this->extend('layout/default_template') ?>

<?= $this->section('content') ?>

<section class="home-hero py-4">
	<div class="container">
		<div class="row">
			<div class="col">
				summary
			</div>
			<div class="col">
				image
			</div>
		</div>
	</div>
</section>
<section class="home-product py-4">
	<div class="container">
		<h3 class="mb-3">Products</h3>
		<div class="row">
			<?php if (!empty($products)): ?>
				<?php foreach ($products as $key => $product): ?>
					<div class="col-sm-6 col-md-6 col-lg-3 mb-3">
						
						<div class="card">
							<div class="card-image" style="width: 100%; height: 180px; overflow-y: hidden;">
								<img src="<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
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
</section>
<section class="home-service py-4">
	<div class="container">
		<div class="row">
			<div class="col">
				service
			</div>
			<div class="col">
				
			</div>
		</div>
	</div>
</section>

<?= $this->endSection() ?>