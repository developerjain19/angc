<!doctype html>
<html class="no-js" lang="en">


<?php $this->load->view('admin/template/header_link'); ?>

<body>


    <div class="layout-wrapper landing">
        <?php include('includes/header.php'); ?>


        <section class="section pb-0 hero-section" id="login" style="background-image: url('<?= base_url() ?>assets/Shiny Overlay.svg');background-size: cover;
    height: 100vh; background-position:center">
            <div class="auth-page-content overflow-hidden pt-lg-5">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="card overflow-hidden m-0">

                                <div class="row justify-content-center g-0">
                                   

                                    <div class="col-lg-12">
                                        <div class="p-lg-5 p-4">
                                            <div>
                                                <h1 class="display-6 fw-semibold mb-3 lh-base text-center"> <span class="text-primary">Login Here </span></h1>
                                                <p class="text-muted text-center">Sign in to continue to ANGC.</p>
                                            </div>

                                            <div class="mt-4">
                                                <h5> <?php if ($this->session->userdata('login_error') != '') {
                                                        ?>
                                                        <div class="alert alert-danger">
                                                            <span><?= $this->session->userdata('login_error'); ?></span>
                                                        </div>
                                                    <?php

                                                        }
                                                        $this->session->unset_userdata('login_error');;
                                                    ?>
                                                </h5>
                                                <h5> <?php if ($msg = $this->session->userdata('msg')) :
                                                            $msg_class = $this->session->userdata('msg_class') ?>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="alert  <?= $msg_class; ?>"><?= $msg; ?></div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                            $this->session->unset_userdata('msg');
                                                        endif; ?>
                                                </h5>

                                                <form class="form-horizontal" method="POST" action="<?php echo base_url('admin/login'); ?>">

                                                    <div class="mb-3">
                                                        <label for="username" class="form-label">Number</label>
                                                        <input type="text" class="form-control" name="number" id="" placeholder="Contact Number">
                                                    </div>

                                                    <div class="mb-3">

                                                        <label class="form-label" for="password-input">Password</label>
                                                        <div class="position-relative auth-pass-inputgroup mb-3">

                                                            <input type="password" class="form-control pe-5" name="password" placeholder="Password" id="password-input">
                                                            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                        </div>
                                                    </div>


                                                    <div class="mt-4">
                                                        <button class="btn btn-primary w-100" type="submit">Sign In</button>
                                                    </div>


                                                </form>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <p class="mb-0">Don't have an account ? <a href="<?= base_url() ?>staff_regsiteration" class="fw-semibold text-primary text-decoration-underline"> Signup</a> </p>
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

        <script src="<?= base_url() ?>assets/admin/js/pages/landing.init.js"></script>
        <?php $this->load->view('admin/template/footer_link'); ?>

</body>

</html>