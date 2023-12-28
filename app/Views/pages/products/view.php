<?= $this->extend('layout/default_template') ?>

<?= $this->section('content') ?>

<?php  
	$in_stock_msg = '';
	$add_to_cart_disabled = '';
	$limit = $product['in_stock'];

	if($product['max_item_limit'] > 0 && $product['max_item_limit'] < $product['in_stock']){
		// max amount per purchase
		$limit = $product['max_item_limit'];
	}

	if($product['in_stock'] < 5){
		$in_stock_msg = $product['in_stock'] . ' left in stock';
	}

	if($product['in_stock'] == 0){
		// out of stock
		$in_stock_msg = 'Out of stock';
		$add_to_cart_disabled = 'disabled';
	}
?>

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
	            
	        </div>
	    </div>
	</section>

	<section class="row mb-5">
		<div class="col">
			<div class="row mb-5">
				<div class="col">
					<div class="row">
						<div class="col-4">
							<img src="<?= base_url($product['image']) ?>" alt="<?= $title ?>" width="100%" loading="lazy">
						</div>
						<div class="col">
							<h1>
								<?= $title ?>
							</h1>
							<div class="review-ratings mb-3">
								<i class="bi bi-star-fill"></i> <span>0 Reviews</span>
							</div>

							<?php if ($in_stock_msg): ?>
							<div class="review-ratings mb-3">
								<p class="text-danger">
									<?= $in_stock_msg ?>
								</p>
							</div>
							<?php endif ?>
							
							<div class="mb-3">
								<h5>
									<span><?= number_to_currency($product['price'], 'USD', 'en_US', 2) ?></span>
								</h5>
							</div>

							<div class="mb-3">
								<form method="post" action="<?= base_url('cart') ?>">
									<input type="hidden" name="redirect" value="<?= current_url() ?>">
									<input type="hidden" name="redirect_success" value="<?= current_url() ?>">
									<input type="hidden" name="redirect_error" value="<?= base_url() . '?redirect =' . current_url() ?>">
									<input type="hidden" name="customer" value="<?= session()->get('customer_id') ?? "" ?>">
									<input type="hidden" name="product" value="<?= $product['product_id'] ?>">
									<input type="hidden" name="price" value="<?= $product['price'] ?? "" ?>">
									<?php if (session()->has('customer_id')): ?>
									<div class="input-group">
										<?php if (isset($product['limit']) && $product['limit'] > 0): ?>
										<select name="quantity" id="" required>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
										</select>
										<?php else: ?>
										<input class="" name="quantity" type="number" min="1" max="<?= $limit ?>" size="1" value="1" required>
										<?php endif ?>
										<button class="btn btn-warning" <?= $add_to_cart_disabled ?>>
											Add to cart
										</button>
									</div>
									<?php endif ?>
								</form>
							</div>

							<div class="">
								<h4>Description</h4>
								<p>
									<?= $product['description'] ?>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<h5>Customer reviews</h5>
					<?php if (session()->has('customer_id')): ?>
					<button class="btn btn-primary">Write review</button>
					<?php endif ?>
				</div>
			</div>
		</div>
		<div class="col-3">
			<aside>
                
            </aside>
		</div>
	</section>
</div>

<?= $this->endSection() ?>