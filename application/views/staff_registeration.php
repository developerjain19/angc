<!doctype html>
<html class="no-js" lang="en">


<?php $this->load->view('admin/template/header_link'); ?>

<body>


    <section class="section pb-0 hero-section" id="hero">
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12">
                        <div class="card overflow-hidden m-0">

                            <div class="row justify-content-center g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>

                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="<?= base_url() ?>" class="d-block">
                                                    <img src="<?= base_url() ?>assets/logo.png" alt="" height="18">
                                                </a>
                                            </div>
                                            <div class="mt-auto">
                                                <div>
                                                    <div class="carousel-inner text-center text-white-50 pb-5">
                                                        <div class="carousel-item active">
                                                            <img src="<?= base_url() ?>assets/staff.jpg" style="max-height:400px; width: 100%;">
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div>
                                            <h1 class="display-6 fw-semibold mb-3 lh-base"> <span class="text-success">Staff Registration </span></h1>
                                            <p class="text-muted">Sign in to continue to ANGC.</p>
                                        </div>

                                        <div class="mt-4">

                                            <h5> <?php if ($msg = $this->session->userdata('regmsg')) : ?>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="alert"><?= $msg; ?></div>
                                                        </div>
                                                    </div>
                                                <?php
                                                        $this->session->unset_userdata('regmsg');
                                                    endif; ?>
                                            </h5>

                                            <form class="form-horizontal" method="POST" action="<?php echo base_url() . 'staff_regsiteration'; ?>">

                                                <div class="mb-3">
                                                    <label for="exampleInputName1">Name</label>
                                                    <input type="text" class="form-control" name="name" id="fullname" placeholder="Your Name:" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputNumber1">Email Address</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Your Email:" value=" " required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1">Number</label>
                                                    <input class="form-control" type="text" name="number" placeholder="Phone Number" id="company_contact" />
                                                    <span id="mainphon"></span>
                                                </div>

                                                <div class="mb-3">

                                                    <label class="form-label" for="password-input">Pin</label>
                                                    <div class="position-relative auth-pass-inputgroup mb-3">

                                                        <input type="password" class="form-control pe-5 password-input" name="password" placeholder="Password" id="password-input" maxlength="4">
                                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-success w-100" type="submit">Sign Up</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Already have an account ? <a href="<?= base_url() ?>" class="fw-semibold text-primary text-decoration-underline"> SignIn</a> </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $this->load->view('admin/template/footer_link'); ?>

</body>

</html>

<script type="text/javascript">
    var err = [];

    $('#company_contact').keyup(function() {

        var contact = $('#company_contact').val();

        if (!$('#company_contact').val()) {
            err.push('true');
            $('#mainphone').text('Company Contact is required');
        } else if (IsMobile(contact) == false) {
            err.push('true');
            $('#mainphone').text('Your Number is Invalid. Should contain 10 digit contact no.');
            // $('#cmp_main').text(contact);

        } else {
            err = [];
            $('#mainphone').text('');

        }
    });

    function IsMobile(contact) {

        contact = contact.replace(/\D/g, '');
        $('#company_contact').val(contact);

        var regex = /^(\+\d{1,3}[- ]?)?\d{10}$/;
        if (!regex.test(contact)) {
            return false;
        } else {
            return true;
        }
    }

    $(".txtOnly").keypress(function(e) {
        var key = e.keyCode;
        if (key >= 48 && key <= 57) {
            e.preventDefault();
        }
    });
    
    
    $('.password-input').keyup(function(e)
                                {
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});
    
    
    
</script>