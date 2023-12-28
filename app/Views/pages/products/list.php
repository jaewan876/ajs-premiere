<?= $this->extend('layout/default_template') ?>

<?= $this->section('content') ?>

<div class="container">

	<section class="py-4">
		<div class="d-flex justify-content-between py-4">
	        <div class="d-flex align-items-center">
	            <!--  -->
	            <nav aria-label="breadcrumb">
			        <ol class="breadcrumb">
			            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
			            <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
			        </ol>
			    </nav>
	        </div>
	        <div class="">
	            <!-- controls -->
	            <form action="" method="get">
	            	<div class="input-group">
		            	<input type="search" name="search" class="form-control search-product" placeholder="Search"> 
		            	<button class="btn btn-success">Go</button>
		            </div>
	            </form>
	        </div>
	    </div>
	</section>

	<section class="row mb-5">
		<div class="col">
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
</div>

<?= $this->endSection() ?>