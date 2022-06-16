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
                                <h4 class="mb-sm-0"><?= $title ?></h4>

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

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name" value="<?= $staff[0]['name'] ?>" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Number</label>
                                                    <input type="text" class="form-control" name="number" value="<?= $staff[0]['number'] ?>" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" value="<?= $staff[0]['email'] ?>" />
                                                </div>


                                                <div class="col-md-4">
                                                    <label for="Staffname-field" class="form-label">Pin</label>
                                                    <input type="text" id="Staffname-field" name="password" class="form-control" placeholder="Enter Pin" value="<?= $staff[0]['password'] ?>" />
                                                </div>

                                                </br>



                                            </div>

                                            <div class="mb-0">
                                                <div class="col-md-4">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
                                                    </button>

                                                </div>
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


        <?php include 'template/footer_link.php'; ?>


</body>

</html>