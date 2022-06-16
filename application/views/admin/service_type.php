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
                                <h4 class="mb-sm-0">service Type</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">ANGC MANAGEMENT PANEL</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row g-4 mb-3">
                                        <div class="col-sm-auto">
                                            <div>
                                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>

                                            </div>
                                        </div>

                                    </div>

                                    <?php if ($msg = $this->session->flashdata('msg')) :
                                        $msg_class = $this->session->flashdata('msg_class') ?>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="alert  <?= $msg_class; ?>"><?= $msg; ?></div>
                                            </div>
                                        </div>
                                    <?php
                                        $this->session->unset_userdata('msg');
                                    endif; ?>

                                    <table id="example" class="table table-striped" style="width:100%">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    Sno
                                                </th>

                                                <th class="sort" data-sort="service Type_name">service Type</th>

                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">


                                            <?php
                                            $i = 0;
                                            if (!empty($type)) {
                                                foreach ($type as $row) {
                                                    $i = $i + 1;
                                                    $sid = encryptId($row['sid']);

                                            ?>
                                                    <tr>
                                                        <th scope="row">
                                                            <?= $i ?>
                                                        </th>
                                                        <td class="service_name"><?= $row['type'] ?></td>
                                                        <td>
                                                            <div class="d-flex gap-2">

                                                                <div class="edit">
                                                                    <a href="<?= base_url("Admin_Dashboard/servicetype_del/$sid") ?>" class="btn btn-sm btn-success">Delete</a>
                                                                </div>

                                                            </div>
                                                        </td>
                                                    </tr>

                                            <?php
                                                }
                                            }
                                            ?>



                                        </tbody>
                                    </table>

                                </div>


                            </div>
                        </div><!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end col -->
            </div>



            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Add Service Type</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form method="post" action="<?= base_url('service_type') ?>">
                            <div class="modal-body">


                                <div class="mb-3">
                                    <label for="servicename-field" class="form-label">Service Type </label>
                                    <input type="text" name="type" id="servicename-field" class="form-control" placeholder="Enter Type" required />
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Add service Type</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <?php $this->load->view('admin/template/footer'); ?>
        </div>
        <?php $this->load->view('admin/template/footer_link'); ?>


    </div>
    </div>
</body>

</html>