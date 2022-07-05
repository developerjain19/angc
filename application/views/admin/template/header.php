<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="<?= base_url() ?>" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?= base_url() ?>assets/logo.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url() ?>assets/logo.png" alt="" height="60">
                        </span>
                    </a>

                    <a href="<?= base_url() ?>" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?= base_url() ?>assets/logo.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url() ?>assets/logo.png" alt="" height="60">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>


            </div>

            <div class="d-flex align-items-center">
                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>


                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/admin/images/users/user-dummy-img.jpg" alt="Header Avatar"> &nbsp; Welcome <?= sessionId('s_name') ?> <?php
                                                                                                                                                                                                                if (sessionId('position') == '0') {
                                                                                                                                                                                                                ?> (Staff)

                            <?php } else if (sessionId('position') == '2') {  ?>
                                (Verifier)
                            <?php } else {
                                                                                                                                                                                                                    echo 'Admin';
                                                                                                                                                                                                                }   ?>



                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">Welcome ANGC!</h6>

                        <a class="dropdown-item" href="<?= base_url('admin/Slogout') ?>"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="<?= base_url() ?>" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?= base_url() ?>assets/logo.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?= base_url() ?>assets/logo.png" alt="" height="60">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="<?= base_url() ?>" class="logo logo-light">
            <span class="logo-sm">
                <img src="<?= base_url() ?>assets/logo.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?= base_url() ?>assets/logo.png" alt="" height="60">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link " href="<?= base_url('dashboard'); ?>">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>

                </li>


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-account-circle-line"></i> <span data-key="t-authentication">Leads List</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>leads" class="nav-link" data-key="t-analytics"> All Leads
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>leads?status=New" class="nav-link" data-key="t-analytics"> New
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>leads?status=Verified" class="nav-link" data-key="t-crm"> Verified </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>leads?status=Reject" class="nav-link" data-key="t-ecommerce"> Rejected </a>
                            </li>

                        </ul>
                    </div>
                </li>



                <?php
                if (sessionId('position') == '1') {
                ?>

                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('staff'); ?>">
                            <i class="ri-apps-2-line"></i><span data-key="t-authentication">Staff List</span>
                        </a>
                    </li>




                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('lead_type'); ?>">
                            <i class="ri-stack-line"></i><span data-key="t-authentication">Leads Type</span>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="<?= base_url('service_type'); ?>">
                            <i class="ri-honour-line"></i><span data-key="t-authentication">Service Type</span>
                        </a>

                    </li>
                <?php
                }
                ?>




            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<div class="vertical-overlay"></div>