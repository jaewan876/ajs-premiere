<?= $this->extend('layout/default_template') ?>

<?= $this->section('content') ?>

<div class="container">
	<section class="py-5">
		<h1>
			<?= $title ?>
		</h1>
	</section>
			
	<section class="row">
		<div class="col pb-4">
			<p>
				Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed aut voluptate, sunt tempore sit, dolores doloribus dignissimos modi fugiat similique ea qui consequuntur ad, molestiae eius praesentium eveniet expedita deleniti?
			</p>
			<img class="img-fluid rounded mx-auto" src="<?= base_url('assets/images/static/printing-services.jpg') ?>" alt="" loading="lazy">
		</div>
		<div class="col">
			<img class="img-fluid rounded mx-auto" src="<?= base_url('assets/images/static/shirt-2.jpg') ?>" alt="" loading="lazy">
		</div>
	</section>
</div>

<?= $this->endSection() ?>