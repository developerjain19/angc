<footer class="footer-bg" data-background="img/bg/footer_bg.jpg">
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-widget black-bg mb-50">
                        <div class="fw-title mb-30">
                            <h4 class="title">Contact Us</h4>
                        </div>
                        <div class="footer-text mb-45">
                            <p class="text-justify"><b>Experience the power of giving : </b> Every child needs food, clothing, and shelter to survive. They need much more than that to thrive.</p>
                        </div>
                        <div class="footer-contact">
                            <ul>
                                <li>
                                    <div class="icon"><i class="fas fa-phone"></i></div>
                                    <div class="content">
                                        <span>PHONE NUMBER</span>
                                        <p><a href="tel:<?= $contactdetails[0]['f_contact'] ?>"><?= $contactdetails[0]['f_contact'] ?></a></p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="fas fa-envelope"></i></div>
                                    <div class="content">
                                        <span>EMAIL ADDRESs</span>
                                        <p><a href="mailto:<?= $contactdetails[0]['f_email'] ?>"><?= $contactdetails[0]['f_email'] ?></a>
                                            <a href="mailto:<?= $contactdetails[0]['s_email'] ?>"><?= $contactdetails[0]['s_email'] ?></a>
                                        </p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                    <div class="content">
                                        <span>address</span>
                                        <p><?= $contactdetails[0]['address'] ?></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="footer-right-wrap">
                        <div class="row justify-content-between">
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget mb-50">
                                    <div class="fw-title mb-30">
                                        <h4 class="title">Our Info</h4>
                                    </div>
                                    <div class="fw-link">
                                        <ul>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Share Responsibility - Donate</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-6">
                                <div class="footer-widget mb-50">
                                    <div class="fw-title mb-30">
                                        <h4 class="title">Quick Link</h4>
                                    </div>
                                    <div class="fw-link">
                                        <ul>
                                            <li><a href="#">User Login</a></li>
                                            <li><a href="#">User Registration</a></li>
                                            <li><a href="<?= base_url() ?>merchant_login">Merchant Login</a></li>
                                            <li><a href="<?= base_url() ?>">Orphanage Login</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-6 col-md-6">
                                <div class="footer-widget mb-50">
                                    <div class="fw-title mb-30">
                                        <h4 class="title">Subscribe Us</h4>
                                    </div>
                                    <div class="footer-newsletter">
                                        <form action="#">
                                            <input type="email" placeholder="Your Mail...">
                                            <button><i class="fas fa-angle-double-right"></i></button>
                                        </form>
                                    </div>
                                    <div class="footer-social">
                                        <ul>
                                            <li><a href="<?= $contactdetails[0]['facebook'] ?>"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="<?= $contactdetails[0]['instagram'] ?>"><span class="fab fa-instagram"></span></a></li>
                                            <li><a href="<?= $contactdetails[0]['youtube'] ?>"><span class="fab fa-youtube"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-payment-method-wrap">
                            <div class="content">
                                <p class="text-justify">We are a community dedicated to food adequacy for destitute children. We make donations simpler, direct and real.</p>
                            </div>
                            <div class="payment-card">
                                <img src="<?= base_url() ?>assets/img/images/payment_card.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="copyright-text">
                        <p>Copyright © <?= date("Y") ?>. All rights reserved. by Srimitra </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <button class="scroll-top scroll-to-target" data-target="html">
                        <i class="fas fa-angle-up"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <section class="login-register-area">
                    <div class="bg-white">
                        <div class="row no-gutters">
                            <div class="col-lg-12">
                                <div class="">
                                    <h3 class="widget-title">Log in your <span>account</span></h3>
                                    <p><?php
                                        if ($this->session->has_userdata('loginmsg')) {
                                            echo $this->session->userdata('loginmsg');
                                            $this->session->unset_userdata('loginmsg');
                                        }
                                        ?>
                                    </p>
                                    <form action="<?= base_url('Index/login') ?>" method="post" class="login-form" id="login_form">
                                        <div class="form-grp">
                                            <label for="username">Email or Username <span>*</span></label>
                                            <input type="text" class="form-control" name="email" placeholder="Your Email ID / Contact no.">
                                        </div>
                                        <div class="form-grp">
                                            <label for="password">Password <span>*</span></label>
                                            <input type="password" class="form-control" name="password" placeholder="*****">
                                        </div>


                                        <button class="btn btn-block">Login</button>
                                    </form>
                                    <br>
                                    <p class="text-center"><span class="or">OR</span></p>
                                    <ul class="action">
                                        <li class="text-center"><button id="regbutton" class="btn">Please Register With Us</button></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
            </section>
        </div>

    </div>

</div>
</div>


<div class="modal fade" id="REGModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <section class="login-register-area">
                    <div class="container">
                        <div class="bg-white">
                            <div class="row no-gutters">

                                <div class="col-lg-12">
                                    <div class="">
                                        <h3 class="widget-title">Register</h3>
                                        <p> <?php
                                            if ($this->session->has_userdata('regmsg')) {
                                                echo $this->session->userdata('regmsg');
                                            }
                                            ?></p>
                                        <form action="<?= base_url('Index/register') ?>" method="post" class="login-form">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-grp">
                                                        <label for="userName">Name <span>*</span></label>
                                                        <input type="text" class="form-control" name="name" id="fullname" placeholder="Your Name:" required>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-grp">
                                                        <label for="email">Email <span>*</span></label>
                                                        <input type="email" class="form-control" name="email" placeholder="Your Email:" value=" ">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-grp">
                                                        <label for="phone">Your Phone</label>
                                                        <input class="form-control" name="number" placeholder="Phone Number" id="company_contact" required="" maxlength="10">
                                                        <!-- <span id="mainphon"></span> -->
                                                    </div>
                                                </div>
                                            </div>


                                            <button class="btn btn-block">Register</button>

                                        </form>
                                        <br>
                                        <p class="text-center"><span class="or">OR</span></p>
                                        <ul class="action">
                                            <li class="text-center"><button id="loginbutton" class="btn">Please Login</button></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>

    </div>
</div>
</div>