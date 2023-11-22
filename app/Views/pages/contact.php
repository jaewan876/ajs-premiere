<?= $this->extend('layout/default_template') ?>

<?= $this->section('content') ?>

<div class="container">
	<section class="row py-5">
        <div class="col-md-12">
            <h3 class="text-center pb-4">Have any question, ask us.</h3>
            <p class="text-center pb-3">
            	Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolore obcaecati distinctio nihil accusamus saepe magnam cupiditate aspernatur voluptates provident nemo.
            </p>
        </div>
        <div class="col-md-6 mb-3">
            <form class="g-3" id="contact-form" method="post" action="<?= base_url('contact-us') ?>">
            	<?= csrf_field() ?>
                <input type="hidden" name="code" id="token_generator" readonly="">
                <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" type="text" name="name" placeholder="Name" required="">
                    </div>
                    <div class="col">
                        <input class="form-control" type="email" name="email" placeholder="Email" required="">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input class="form-control" id="contact-phone" type="tel" name="phone" placeholder="Phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required="">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <textarea class="form-control" name="message" id="message" cols="30" rows="5" placeholder="Message (200 characters)" maxlength="200" required=""></textarea>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">
                        Send
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <h4>Get in touch</h4>
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <td><i class="bi bi-envelope-at"></i></td>
                        <td>email@gmail.com</td>
                    </tr>
                    <tr>
                        <td><i class="bi bi-telephone"></i></td>
                        <td>876-484-3388</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
</div>

<?= $this->endSection() ?>