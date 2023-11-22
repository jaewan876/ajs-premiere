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
			            <li class="breadcrumb-item"><a href="<?= base_url('products') ?>">Products</a></li>
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

	<section class="row">
		<div class="col">
			<div class="row mb-5">
				<div class="col">
					<div class="row">
						<div class="col-3">
							<img src="<?= base_url($product['image']) ?>" alt="" width="100%" loading="lazy">
						</div>
						<div class="col">
							<h1>
								<?= $title ?>
							</h1>
							<div class="review-ratings mb-3">
								<i class="bi bi-star-fill"></i> <span>10 Reviews</span>
							</div>
							<h5>
								<span>$<?= $product['price'] ?></span>
							</h5>

							<p>
								<?= $product['description'] ?>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<h5>Customer reviews</h5>
					<button class="btn btn-primary">Write review</button>
				</div>
			</div>
		</div>
		<div class="col-3 bg-light">
			<aside>
                Sidebar
            </aside>
		</div>
	</section>
</div>

<?= $this->endSection() ?>