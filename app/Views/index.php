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
		<div class="row">
			<?php if (!empty($products)): ?>
				<?php foreach ($products as $key => $product): ?>
					<div class="col-md-3">
						product
					</div>
				<?php endforeach ?>
			<?php endif ?>
		</div>
	</div>
</section>
<section class="home-service py-4" style="background-color: grey">
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