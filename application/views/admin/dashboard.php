<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">


<?php $this->load->view('admin/template/header_link'); ?>

<body>
  <div id="layout-wrapper">
    <?php $this->load->view('admin/template/header'); ?>

    <div class="main-content">

      <div class="page-content">
        <div class="container-fluid">

          <div class="row">
            <div class="col-12">
              <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">ANGC MANAGEMENT PANEL</h4>

                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                    <li class="breadcrumb-item active">ANGC MANAGEMENT PANEL</li>
                  </ol>
                </div>

              </div>
            </div>
          </div>


          <div class="page-content-wrapper">

            <?php
            if (sessionId('position') == '0') {
            ?>

              <div class="row">
                <div class="col-xxl-12">
                  <div class="row">
                    <div class="col-xl-4">
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                              <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                <i data-feather="briefcase" class="text-primary"></i>
                              </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                              <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                Total Leads</p>
                              <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="825"><?= $sleads ?></span></h4>

                              </div>
                              <p class="text-muted text-truncate mb-0">Total Leads Till Now</p>
                            </div>
                          </div>
                        </div><!-- end card body -->
                      </div>
                    </div><!-- end col -->

                    <div class="col-xl-4">
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                              <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                <i data-feather="award" class="text-warning"></i>
                              </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <p class="text-uppercase fw-medium text-muted mb-3">New Leads</p>
                              <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="7522"><?= $snew ?></span></h4>

                              </div>
                              <p class="text-muted mb-0">Leads this month</p>
                            </div>
                          </div>
                        </div><!-- end card body -->
                      </div>
                    </div><!-- end col -->

                    <div class="col-xl-4">
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                              <span class="avatar-title bg-soft-success text-info rounded-2 fs-2">
                                <i data-feather="clock" class="text-info"></i>
                              </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                              <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                Varified Leads</p>
                              <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="168"><?= $sverified ?></span></h4>
                              </div>
                              <p class="text-muted mb-0">All Varified Leads</p>
                            </div>
                          </div>
                        </div><!-- end card body -->
                      </div>
                    </div><!-- end col -->

                    <div class="col-xl-4">
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                              <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                <i data-feather="clock" class="text-info"></i>
                              </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                              <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                Rejected Leads</p>
                              <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="168"><?= $sreject ?></span></h4>

                              </div>
                              <p class="text-muted mb-0">All Rejected Leads</p>
                            </div>
                          </div>
                        </div><!-- end card body -->
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            <?php
            }
            ?>


            <?php
            if (sessionId('position') == '1') {
            ?>

              <div class="row">
                <div class="col-xxl-12">
                  <div class="row">
                    <div class="col-xl-4">
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                              <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                <i data-feather="briefcase" class="text-primary"></i>
                              </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                              <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                Total Leads</p>
                              <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="825"> <?= $leads ?></span></h4>

                              </div>
                              <p class="text-muted text-truncate mb-0">Total Leads Till Now</p>
                            </div>
                          </div>
                        </div><!-- end card body -->
                      </div>
                    </div><!-- end col -->

                    <div class="col-xl-4">
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                              <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                <i data-feather="award" class="text-warning"></i>
                              </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <p class="text-uppercase fw-medium text-muted mb-3">New Leads</p>
                              <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="7522"><?= $new ?></span></h4>

                              </div>
                              <p class="text-muted mb-0">New Leads </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div><!-- end col -->

                    <div class="col-xl-4">
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                              <span class="avatar-title bg-soft-success text-info rounded-2 fs-2">
                                <i data-feather="clock" class="text-info"></i>
                              </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                              <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                Varified Leads</p>
                              <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="168"><?= $verified ?></span></h4>
                              </div>
                              <p class="text-muted mb-0">All Varified Leads</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-xl-4">
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                              <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                <i data-feather="clock" class="text-info"></i>
                              </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                              <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                Total Staff</p>
                              <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="168"><?= $staff ?></span></h4>

                              </div>
                              <p class="text-muted mb-0">Total No of Staff</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            <?php
            }
            ?>




            <?php
            if (sessionId('position') == '2') {
            ?>

              <div class="row">
                <div class="col-xxl-12">
                  <div class="row">
                    <div class="col-xl-4">
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                              <span class="avatar-title bg-soft-primary text-primary rounded-2 fs-2">
                                <i data-feather="briefcase" class="text-primary"></i>
                              </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                              <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                Total Leads</p>
                              <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="825"><?= $vleads ?></span></h4>

                              </div>
                              <p class="text-muted text-truncate mb-0">Total Leads Till Now</p>
                            </div>
                          </div>
                        </div><!-- end card body -->
                      </div>
                    </div><!-- end col -->

                    <div class="col-xl-4">
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                              <span class="avatar-title bg-soft-warning text-warning rounded-2 fs-2">
                                <i data-feather="award" class="text-warning"></i>
                              </span>
                            </div>
                            <div class="flex-grow-1 ms-3">
                              <p class="text-uppercase fw-medium text-muted mb-3">New Leads</p>
                              <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="7522"><?= $vnew ?></span></h4>

                              </div>
                              <p class="text-muted mb-0">Leads this month</p>
                            </div>
                          </div>
                        </div><!-- end card body -->
                      </div>
                    </div><!-- end col -->

                    <div class="col-xl-4">
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                              <span class="avatar-title bg-soft-success text-info rounded-2 fs-2">
                                <i data-feather="clock" class="text-info"></i>
                              </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                              <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                Varified Leads</p>
                              <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="168"><?= $vverified ?></span></h4>
                              </div>
                              <p class="text-muted mb-0">All Varified Leads</p>
                            </div>
                          </div>
                        </div><!-- end card body -->
                      </div>
                    </div><!-- end col -->

                    <div class="col-xl-4">
                      <div class="card card-animate">
                        <div class="card-body">
                          <div class="d-flex align-items-center">
                            <div class="avatar-sm flex-shrink-0">
                              <span class="avatar-title bg-soft-info text-info rounded-2 fs-2">
                                <i data-feather="clock" class="text-info"></i>
                              </span>
                            </div>
                            <div class="flex-grow-1 overflow-hidden ms-3">
                              <p class="text-uppercase fw-medium text-muted text-truncate mb-3">
                                Rejected Leads</p>
                              <div class="d-flex align-items-center mb-3">
                                <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value" data-target="168"><?= $vreject ?></span></h4>

                              </div>
                              <p class="text-muted mb-0">All Rejected Leads</p>
                            </div>
                          </div>
                        </div><!-- end card body -->
                      </div>
                    </div>
                  </div>

                </div>
              </div>

            <?php
            }
            ?>


          </div>
        </div>
      </div>



    </div>
    <?php $this->load->view('admin/template/footer_link'); ?>
</body>

</html>