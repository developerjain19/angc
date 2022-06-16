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
                                <h4 class="mb-sm-0">lead</h4>

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
                                                <?php
                                                if (sessionId('position') == '0') {
                                                ?>
                                                    <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i class="ri-add-line align-bottom me-1"></i> Add</button>
                                                <?php
                                                }
                                                ?>
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

                                    <table id="example23" class="table table-striped" style="width:100%">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 50px;">
                                                    SNo
                                                </th>
                                                <th class="sort" data-sort="date">Create Date</th>
                                                <th class="sort" data-sort="date">User Code</th>
                                                <th class="sort" data-sort="lead_name">Name</th>
                                                <th class="sort" data-sort="email">Email</th>
                                                <th class="sort" data-sort="phone">Phone</th>
                                                <!--<th class="sort" data-sort="phone">DOB</th>-->
                                                <th class="sort" data-sort="status">Varification</th>

                                                <?php
                                                if (sessionId('position') != '2') {
                                                ?>
                                                    <th class="sort" data-sort="phone">Add Verifier</th>
                                                <?php
                                                }
                                                ?>


                                                <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                        </thead>



                                        <?php
                                        if (sessionId('position') == '1') {
                                        ?>
                                            <tbody class="list form-check-all">


                                                <?php
                                                $i = 0;
                                                if (!empty($leads)) {
                                                    foreach ($leads as $row) {
                                                        $i = $i + 1;
                                                        $lid = encryptId($row['lid']);

                                                ?>
                                                        <tr>
                                                            <th scope="row">
                                                                <?= $i ?>
                                                            </th>
                                                            <td class="date"> <?php echo convertDatedmy($row['create_date']); ?></td>
                                                            <td class="lead_name"><?= $row['user_code'] ?></td>
                                                            <td class="lead_name"><?= $row['name'] ?></td>
                                                            <td class="email"><?= $row['email'] ?></td>
                                                            <td class="phone"><?= $row['number'] ?></td>


                                                            <td class="status">

                                                                <select name="status" class="form-control statushm" id="status<?= $row['lid'] ?>" data-id="<?= $row['lid'] ?>">

                                                                    <option value="New" <?= (($row['verification'] == 'New') ? 'selected' : '') ?>>New</option>
                                                                    <option value="Verified" <?= (($row['verification'] == 'Verified') ? 'selected' : '') ?>>Verified</option>
                                                                    <option value="Reject" <?= (($row['verification'] == 'Reject') ? 'selected' : '') ?>>Rejected</option>
                                                                </select>

                                                            </td>

                                                            <td class="status">
                                                                <select name="featured" class="form-control featuredhm" id="featured<?= $row['lid'] ?>" data-id="<?= $row['lid'] ?>">
                                                                    <option value="">Select</option>

                                                                    <?php

                                                                    $veri = getWhereData('tbl_staff', array('position' => '2'));
                                                                    foreach ($veri as $verify) {

                                                                    ?>

                                                                        <option value="<?= $verify['uid'] ?>" <?= (($row['verifer'] == $verify['uid']) ? 'selected' : '') ?>><?= $verify['name']  ?></option>

                                                                    <?php
                                                                    }
                                                                    ?>




                                                                </select>
                                                            </td>

                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <a href="<?= base_url("documents/$lid") ?>" class="btn btn-sm btn-danger edit-item-btn">Document Checklist</a>
                                                                    </div>

                                                                    <div class="edit">
                                                                        <a href="<?= base_url("leads_edit/$lid") ?>" class="btn btn-sm btn-success">Edit</a>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>

                                                <?php
                                                    }
                                                }
                                                ?>



                                            </tbody>
                                        <?php
                                        }
                                        ?>


                                        <?php
                                        if (sessionId('position') == '0') {
                                        ?>
                                            <tbody class="list form-check-all">


                                                <?php
                                                $i = 0;
                                                if (!empty($sleads)) {
                                                    foreach ($sleads as $row) {
                                                        $i = $i + 1;
                                                        $lid = encryptId($row['lid']);

                                                ?>
                                                        <tr>
                                                            <th scope="row">
                                                                <?= $i ?>
                                                            </th>
                                                            <td class="date"> <?php echo convertDatedmy($row['create_date']); ?></td>
                                                            <td class="lead_name"><?= $row['user_code'] ?></td>
                                                            <td class="lead_name"><?= $row['name'] ?></td>
                                                            <td class="email"><?= $row['email'] ?></td>
                                                            <td class="phone"><?= $row['number'] ?></td>


                                                            <td class="status">

                                                                <span class="badge badge-soft-success text-uppercase"><?= $row['verification'] ?></span>
                                                            </td>




                                                            <td class="status">
                                                                <select name="featured" class="form-control featuredhm" id="featured<?= $row['lid'] ?>" data-id="<?= $row['lid'] ?>">
                                                                    <option value="">Select</option>

                                                                    <?php

                                                                    $veri = getWhereData('tbl_staff', array('position' => '2'));
                                                                    foreach ($veri as $verify) {

                                                                    ?>

                                                                        <option value="<?= $verify['uid'] ?>" <?= (($row['verifer'] == $verify['uid']) ? 'selected' : '') ?>><?= $verify['name']  ?></option>

                                                                    <?php
                                                                    }
                                                                    ?>




                                                                </select>
                                                            </td>

                                                            <td>
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <a href="<?= base_url("documents/$lid") ?>" class="btn btn-sm btn-danger edit-item-btn">Document Checklist</a>
                                                                    </div>

                                                                    <div class="edit">
                                                                        <a href="<?= base_url("leads_edit/$lid") ?>" class="btn btn-sm btn-success">Edit</a>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>

                                                <?php
                                                    }
                                                }
                                                ?>



                                            </tbody>
                                        <?php
                                        }
                                        ?>




                                        <?php
                                        if (sessionId('position') == '2') {
                                        ?>
                                            <tbody class="list form-check-all">


                                                <?php
                                                $i = 0;
                                                if (!empty($vleads)) {
                                                    foreach ($vleads as $row) {
                                                        $i = $i + 1;
                                                        $lid = encryptId($row['lid']);

                                                ?>
                                                        <tr>
                                                            <th scope="row">
                                                                <?= $i ?>
                                                            </th>
                                                            <td class="date"> <?php echo convertDatedmy($row['create_date']); ?></td>
                                                            <td class="lead_name"><?= $row['user_code'] ?></td>
                                                            <td class="lead_name"><?= $row['name'] ?></td>
                                                            <td class="email"><?= $row['email'] ?></td>
                                                            <td class="phone"><?= $row['number'] ?></td>


                                                            <td class="status">

                                                                <select name="status" class="form-control statushm" id="status<?= $row['lid'] ?>" data-id="<?= $row['lid'] ?>">

                                                                    <option value="New" <?= (($row['verification'] == 'New') ? 'selected' : '') ?>>New</option>
                                                                    <option value="Verified" <?= (($row['verification'] == 'Verified') ? 'selected' : '') ?>>Verified</option>
                                                                    <option value="Reject" <?= (($row['verification'] == 'Reject') ? 'selected' : '') ?>>Rejected</option>
                                                                </select>

                                                            </td>
                                                            <td class="status">
                                                                <div class="d-flex gap-2">
                                                                    <div class="edit">
                                                                        <a href="<?= base_url("documents/$lid") ?>" class="btn btn-sm btn-danger edit-item-btn">Document Checklist</a>
                                                                    </div>

                                                                    <div class="edit">
                                                                        <a href="<?= base_url("leads_edit/$lid") ?>" class="btn btn-sm btn-success">Edit</a>
                                                                    </div>

                                                                </div>
                                                            </td>
                                                        </tr>

                                                <?php
                                                    }
                                                }
                                                ?>



                                            </tbody>
                                        <?php
                                        }
                                        ?>
                                    </table>

                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Add Lead</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="close-modal"></button>
                        </div>
                        <form method="post" action="<?= base_url('admin_Dashboard/leads') ?>">
                            <div class="modal-body">



                                <div class="mb-3">
                                    <label for="leadname-field" class="form-label">lead Name</label>
                                    <input type="text" name="name" id="leadname-field" class="form-control" placeholder="Enter Name" required />

                                    <input type="hidden" name="staff_id" id="leadname-field" class="form-control" value="<?= sessionId('staff_id') ?>" />
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
                                    <label for="leadname-field" class="form-label">Type of Lead</label>


                                    <select name="lead_type" id="leadname-field" class="form-control">
                                        <option>Select Lead type </option>
                                        <?php
                                        $i = 0;
                                        if (!empty($ltype)) {
                                            foreach ($ltype as $type) {
                                        ?>
                                                <option value="<?= $type['type'] ?>"><?= $type['type'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="leadname-field" class="form-label">Type of Service</label>
                                    <select name="service_type" id="leadname-field" class="form-control">
                                        <option>Select Service type </option>
                                        <?php
                                        $i = 0;
                                        if (!empty($stype)) {
                                            foreach ($stype as $type) {
                                        ?>
                                                <option value="<?= $type['type'] ?>"><?= $type['type'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>


                            </div>
                            <div class="modal-footer">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" id="add-btn">Add lead</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <?php $this->load->view('admin/template/footer'); ?>
        </div>
        <?php $this->load->view('admin/template/footer_link'); ?>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
        <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    </div>
    </div>

    <script>
        $('.statushm').change(function() {

            var pid = $(this).data('id');
            var status = $('#status' + pid).val();
            $.ajax({
                method: "POST",
                url: "<?= base_url('admin_Dashboard/leadverfication') ?>",
                data: {
                    status: status,
                    pid: pid
                },
                success: function(response) {
                    $('#positiondmsg').html('');
                    alert('Verification Updated Successfully');
                }
            });
        });


        $('.featuredhm').change(function() {

            var pid = $(this).data('id');
            var featured = $('#featured' + pid).val();
            $.ajax({
                method: "POST",
                url: "<?= base_url('admin_Dashboard/addverfier') ?>",
                data: {
                    featured: featured,
                    pid: pid
                },
                success: function(response) {
                    $('#salemsg').html('');
                    alert('Verfier Added Successfully');
                }
            });
        });



        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>



</body>

</html>