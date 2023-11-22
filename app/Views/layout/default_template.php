
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= (!empty($title) ? $title . ' - ' : '') ?> AJ's Premiere Print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css" integrity="sha512-KulI0psuJQK8UMpOeiMLDXJtGOZEBm8RZNTyBBHIWqoXoPMFcw+L5AEo0YMpsW8BfiuWrdD1rH6GWGgQBF59Lg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
</head>
<body>
	<div class="d-flex flex-column min-vh-100">
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">
                    <a class="navbar-brand brand-logo-text" href="<?= base_url() ?>">AJ'S PREMIERE PRINT</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#home-nav" aria-controls="home-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="home-nav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('products') ?>" data-toggle="tab">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('about-us') ?>" data-toggle="tab">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('contact-us') ?>" data-toggle="tab">Contact</a>
                            </li>
                            <?php if (! session()->get('isLoggedIn')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('login') ?>" data-toggle="tab">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('signup') ?>" data-toggle="tab">Signup</a>
                            </li>
                            <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('admin') ?>" data-toggle="tab">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('logout') ?>" data-toggle="tab">Logout</a>
                            </li>
                            <?php endif ?>
                        </ul>
                        <div class="d-flex">
                            <a class="btn btn-sm btn-dark" href="<?= base_url('cart') ?>">
                                <i class="bi bi-cart"></i> <span id="cart_count"><strong>0</strong></span>
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
		</header>

		<!-- MAIN -->
        <main class="flex-grow-1">
            <?= $this->renderSection('content') ?>
        </main>
        <!-- MAIN -->

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-white text-muted">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span>Get connected with us on social networks:</span>
                </div>
                <!-- Left -->
                <!-- Right -->
                <div>
                    <a href="" class="me-4 link-secondary"> <i class="fab fa-facebook-f"></i> </a>
                    <a href="" class="me-4 link-secondary"> <i class="fab fa-twitter"></i> </a>
                    <a href="" class="me-4 link-secondary"> <i class="fab fa-google"></i> </a>
                    <a href="" class="me-4 link-secondary"> <i class="fab fa-instagram"></i> </a>
                    <a href="" class="me-4 link-secondary"> <i class="fab fa-linkedin"></i> </a>
                    <a href="" class="me-4 link-secondary"> <i class="fab fa-github"></i> </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->
            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3 text-secondary"></i>AJ's Premiere Print
                            </h6>
                            <p>
                                Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                            </p>
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Products</h6>
                            <p> <a href="#!" class="text-reset">Angular</a> </p>
                            <p> <a href="#!" class="text-reset">React</a> </p>
                            <p> <a href="#!" class="text-reset">Vue</a> </p>
                            <p> <a href="#!" class="text-reset">Laravel</a> </p>
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Useful links</h6>
                            <p> <a href="#!" class="text-reset">Pricing</a> </p>
                            <p> <a href="#!" class="text-reset">Settings</a> </p>
                            <p> <a href="#!" class="text-reset">Orders</a> </p>
                            <p> <a href="#!" class="text-reset">Help</a> </p>
                        </div>
                        <!-- Grid column -->
                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p><i class="fas fa-home me-3 text-secondary"></i> New York, NY 10012, US</p>
                            <p> <i class="fas fa-envelope me-3 text-secondary"></i> info@example.com </p>
                            <p><i class="fas fa-phone me-3 text-secondary"></i> + 01 234 567 88</p>
                            <p><i class="fas fa-print me-3 text-secondary"></i> + 01 234 567 89</p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->
            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
                <p class="text-center text-muted">©
                    <?= date('Y') ?> AJ's Premiere Print</p>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
	</div>

	<!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/cart.js') ?>"></script>
</body>
</html>