<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <?php $this->load->view('admin/template/header_link'); ?>
    <link rel="shortcut icon" href="<?= $favicon ?>" />
</head>


<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="<?= base_url() ?>" class="d-inline-block auth-logo">
                                <img src="<?= base_url() ?>assets/logo.png" alt="" height="22">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">ANGC MANAGEMENT PANEL</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to ANGC MANAGEMENT PANEL.</p>
                                </div>
                                <div class="p-2 mt-4">
                                    <h3> <?php if ($this->session->userdata('login_error') != '') {
                                            ?>
                                            <div class="alert alert-danger">
                                                <span><?= $this->session->userdata('login_error'); ?></span>
                                            </div>
                                        <?php

                                            }
                                            $this->session->unset_userdata('login_error');;
                                        ?>
                                    </h3>

                                    <form class="form-horizontal" method="POST" action="<?php echo base_url() . 'admin/login'; ?>">

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
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
                                            <button class="btn btn-success w-100" type="submit">Sign In</button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>