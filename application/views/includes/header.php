<nav class="navbar navbar-expand-lg navbar-landing fixed-top" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url() ?>">
            <img src="<?= base_url() ?>assets/logo.png" class="card-logo card-logo-dark" alt="logo dark" height="50">
            <img src="<?= base_url() ?>assets/logo.png" class="card-logo card-logo-light" alt="logo light" height="50">
        </a>
        <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="mdi mdi-menu"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <div class="">
                <a href="<?= base_url() ?>#login" class="btn btn-link fw-medium text-decoration-none text-dark">Staff/Associate Log In</a>
                <a href="<?= base_url() ?>staff_regsiteration" class="btn btn-primary">Staff/Associate Registration</a>

                <a href="<?= base_url() ?>lead_login" class="btn btn-info dd-none">User Login</a>
            </div>

        </div>

        <div class="flex_box">
            <a href="<?= base_url() ?>lead_login" class="btn btn-info wdd-none ">User Login</a>
        </div>
    </div>
</nav>