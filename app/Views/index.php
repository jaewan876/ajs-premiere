<?= $this->extend('layout/default_template') ?>

<?= $this->section('content') ?>

<section class="home-hero py-5">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-6 mb-4">
				<h1 class="text-center text-md-start">
					<span class="text-danger">DIGITAL</span> 
					<span class="text-primary">PRINTING</span>
				</h1>
				<p class="text-center text-md-start">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis accusantium quasi corporis provident ad hic quae, reiciendis consequatur distinctio labore odit, esse alias voluptates.
				</p>
				<div class="text-center text-md-start">
					<a class="btn btn-success btn-lg fw-bold" href="<?= base_url('products') ?>">
						Shop Now <i class="bi bi-cart"></i> 
					</a>
					<a class="btn btn-outline-dark btn-lg fw-bold" href="<?= base_url('contact-us') ?>">
						Contact Us <i class="bi bi-arrow-right"></i>
					</a>
				</div>
			</div>
			<div class="col-md-6">
				<img src="<?= base_url('assets/images/static/digital-print-2.png') ?>" alt="Hero" class="hero-image" loading="lazy" width="75%">
			</div>
		</div>
	</div>
</section>

<section class="py-3">
	<div class="container">
		<div class="row">
			<div class="col">
				<img src="<?= base_url('assets/images/static/digital-print-1.jpg') ?>" alt="" class="img-fluid" width="" loading="lazy">
			</div>
			<div class="col">
				<img src="<?= base_url('assets/images/static/printer-2.webp') ?>" alt="" class="img-fluid" width="" loading="lazy">
			</div>
			<div class="col">
				<img src="<?= base_url('assets/images/static/shirt-1.jpg') ?>" alt="" class="img-fluid" width="" loading="lazy">
			</div>
		</div>
	</div>
</section>

<section class="home-product py-5 bg-light">
	<div class="container">
		<h3 class="mb-4">Feature Products</h3>
		<div class="row">
			<?php if (!empty($products)): ?>
				<?php foreach ($products as $key => $product): ?>
					<div class="col-sm-6 col-md-6 col-lg-3 mb-3">
						<a class="text-decoration-none" href="<?= base_url('products/'.$product['product_id'].'/'.$product['slug']) ?>">
							<div class="card product-card">
								<div class="card-image" style="">
									<img src="<?= $product['image'] ?>" class="card-img-top" alt="<?= $product['name'] ?>" loading="lazy">
								</div>
								<div class="card-body">
									<h5 class="card-title"><?= $product['name'] ?></h5>
									<div class="d-flex align-items-center justify-content-between">
										<span><strong>$<?= $product['price'] ?></strong></span>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>
	</div>
</section>

<?= $this->endSection() ?>