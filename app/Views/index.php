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
					<div class="col-md-3">
						
						<div class="card" style="width: 18rem;">
							<div class="card-image" style="width: 100%; height: 180px; overflow-y: hidden;">
								<img src="<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['name'] ?>">
							</div>
							<div class="card-body">
								<h5 class="card-title"><?= $product['name'] ?></h5>
								<p class="card-text"><?= $product['description'] ?></p>
								<button class="btn btn-primary">Add to cart</button>
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