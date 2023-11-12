
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= (!empty($title) ? $title . ' - ' : '') ?> AJ's Premiere Print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/styles.css') ?>">
</head>
<body>
	<div class="d-flex flex-column min-vh-100">
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-black">
				<div class="container">
                    <a class="navbar-brand brand-logo-text" href="<?= base_url() ?>">AJ'S PREMIERE</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#home-nav" aria-controls="home-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="home-nav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('products') ?>" data-toggle="tab">Products</a>
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
                            <a class="btn btn-sm btn-light" href="<?= base_url('cart') ?>">
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

        <footer>
        	<div class="container">
                <section class="py-3 my-4">
                    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                        <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link px-2 text-muted">Home</a></li>
                        <li class="nav-item"><a href="<?= base_url('about-us') ?>" class="nav-link px-2 text-muted">About</a></li>
                    </ul>
                    <p class="text-center text-muted">© <?= date('Y') ?> AJ's Premiere Print</p>
                </section>
            </div>
        </footer>
	</div>

	<!-- Bootstrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/js/cart.js') ?>"></script>
</body>
</html>