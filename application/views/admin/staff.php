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
                                <h4 class="mb-sm-0">Staff</h4>

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
                                                <th class="sort" data-sort="date">Create Date</th>
                                                <th class="sort" data-sort="Staff_name">Staff Code</th>
                                                <th class="sort" data-sort="Staff_name">Name</th>
                                                <th class="sort" data-sort="email">Email</th>
                                                <th class="sort" data-sort="phone">Phone</th>

                                                <th class="sort" data-sort="phone">Pin</th>

                                                <th class="sort" data-sort="phone">Add Verfier</th>

                                                <th class="sort" data-sort="status">Profile Status</th>
                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">


                                            <?php
                                            $i = 0;
                                            if (!empty($staff)) {
                                                foreach ($staff as $row) {
                                                    $i = $i + 1;
                                                    $uid = encryptId($row['uid']);

                                            ?>
                                                    <tr>
                                                        <th scope="row">
                                                            <?= $i ?>
                                                        </th>
                                                        <td class="date"> <?php echo convertDatedmy($row['create_date']); ?></td>
                                                        <td class="lead_name"><?= $row['staff_code'] ?></td>
                                                        <td class="lead_name"><?= $row['name'] ?></td>
                                                        <td class="email"><?= $row['email'] ?></td>
                                                        <td class="phone"><?= $row['number'] ?></td>
                                                        <td class="phone"><?= $row['password'] ?></td>

                                                        <td>
                                                            <select name="positiond" class="form-control positiondhm" id="positiond<?= $row['uid'] ?>" data-id="<?= $row['uid'] ?>">
                                                                <option value="2" <?= (($row['position'] == '2') ? 'selected' : '') ?>>Verifier</option>
                                                                <option value="0" <?= (($row['position'] == '0') ? 'selected' : '') ?>>Staff</option>
                                                            </select>
                                                        </td>

                                                        <td class="status">

                                                            <select name="status" class="form-control statushm" id="status<?= $row['uid'] ?>" data-id="<?= $row['uid'] ?>">
                                                                <option value="1" <?= (($row['status'] == '1') ? 'selected' : '') ?>>Verified</option>
                                                                <option value="0" <?= (($row['status'] == '0') ? 'selected' : '') ?>>Not Verified</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-2">

                                                                <div class="edit">
                                                                    <a href="<?= base_url("staff_edit/$uid") ?>" class="btn btn-sm btn-success">Edit</a>
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
                            <h5 class="modal-title" id="exampleModalLabel">Add Staff</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form method="post" action="<?= base_url('staff') ?>">
                            <div class="modal-body">


                                <div class="mb-3">
                                    <label for="leadname-field" class="form-label">Staff Name</label>
                                    <input type="text" name="name" id="leadname-field" class="form-control" placeholder="Enter Name" required />
                                </div>

                                <div class="mb-3">
                                    <label for="email-field" class="form-label">Email</label>
                                    <input type="email" name="email" id="email-field" class="form-control" placeholder="Enter Email" required />
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Phone</label>
                                    <input type="text" id="phone-field " name="number" class="form-control" placeholder="Enter Phone no." required />
                                </div>


                                <div class="mb-3">
                                    <label for="Staffname-field" class="form-label">Pin</label>
                                    <input type="text" id="Staffname-field" name="password" class="form-control" placeholder="Enter Pin" required />
                                </div>


                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Add Staff</button>
                                    <!-- <button type="button" class="btn btn-success" id="edit-btn">Update</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <?php $this->load->view('admin/template/footer'); ?>
        </div>
        <?php $this->load->view('admin/template/footer_link'); ?>

        <script>
            $('.statushm').change(function() {

                var pid = $(this).data('id');
                var status = $('#status' + pid).val();
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('admin_Dashboard/staffstatus') ?>",
                    data: {
                        status: status,
                        pid: pid
                    },
                    success: function(response) {
                        $('#positiondmsg').html('');
                        alert('Status Updated Successfully');
                    }
                });
            });
            $('.positiondhm').change(function() {

                var pid = $(this).data('id');
                var positiond = $('#positiond' + pid).val();
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('admin_Dashboard/stafftoverfier') ?>",
                    data: {
                        positiond: positiond,
                        pid: pid
                    },
                    success: function(response) {
                        $('#statusmsg').html('');
                        alert('Changes Updated Successfully');
                    }
                });
            });
        </script>
    </div>
    </div>
</body>

</html>