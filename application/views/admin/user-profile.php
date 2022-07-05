<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">


<?php $this->load->view('admin/template/header_link'); ?>

<body>
    <div id="layout-wrapper">
        <header id="page-topbar" style="left: 0px;">
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
                                    <img class="rounded-circle header-profile-user" src="<?= base_url() ?>assets/admin/images/users/user-dummy-img.jpg" alt="Header Avatar"> &nbsp; Welcome <?= sessionId('name') ?>


                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <h6 class="dropdown-header">Welcome ANGC!</h6>

                                <a class="dropdown-item" href="<?= base_url('admin/leadlogout') ?>"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="vertical-overlay"></div>

        <div class="main-content" style="margin-left:0px">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">User Dashboard</h4>
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                        <li class="breadcrumb-item active">ANGC MANAGEMENT PANEL</li>
                                    </ol>
                                </div>
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



                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Basic Info</h5>
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <div class="row">
                                                            <div class="col-sm-4">

                                                                <th class="ps-0" scope="row">Full Name :</th>
                                                                <td class="text-muted"><?= $leads[0]['name'] ?></td>

                                                            </div>
                                                            <div class="col-sm-4">

                                                                <th class="ps-0" scope="row">Mobile :</th>
                                                                <td class="text-muted"><?= $leads[0]['number'] ?></td>

                                                            </div>
                                                            <div class="col-sm-4">

                                                                <th class="ps-0" scope="row">Email :</th>
                                                                <td class="text-muted"><?= $leads[0]['email'] ?></td>

                                                            </div>
                                                            <div class="col-sm-4">

                                                                <th class="ps-0" scope="row">Type of Lead :</th>
                                                                <td class="text-muted"><?= $leads[0]['lead_type'] ?></td>

                                                            </div>
                                                            <div class="col-sm-4">

                                                                <th class="ps-0" scope="row">Type of Service :</th>
                                                                <td class="text-muted"><?= $leads[0]['service_type'] ?></td>

                                                            </div>
                                                        </div>
                                                    </tbody>
                                                    <div class="col-sm-4">

                                                        <th class="ps-0" scope="row">Verification :</th>
                                                        <td class="text-muted"><span class="badge badge-soft-<?= (($leads[0]['verification'] == 'New') ? 'primary' : (($leads[0]['verification'] == 'Verified') ? 'success' : 'danger')) ?> text-uppercase"><?= $leads[0]['verification'] ?></span></td>

                                                    </div>
                                            </div>
                                            </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">Admin Comment</h5>



                                            <div class="table-responsive">
                                                <br>
                                                <table id="" class="table table-striped" style="width:100%">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th class="sort" data-sort="Lead Type_name">Date</th>
                                                            <th class="sort" data-sort="action">Comment</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <?php
                                                                $comment = getWhereData('tbl_admin_comment', array('lead_id' => sessionId('lid')));

                                                                if (!empty($comment)) {
                                                                    foreach ($comment as $com) {


                                                                ?>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row"><span class="text-muted">
                                                                                    <?= date_format(date_create($com['create_date']), 'd-m-Y') ?> </span></td>
                                                                            <th class="ps-0" scope="row"><span class="text-muted">
                                                                                    <?= $com['comment'] ?> </span></td>
                                                                        </tr>

                                                                <?php
                                                                    }
                                                                }
                                                                ?>



                                                            </div>

                                                        </div>
                                                    </tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

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
                                    <h5 class="card-title mb-3">Add Document</h5>
                                    <table id="" class="table table-striped" style="width:100%">


                                        <div class="row">

                                            <form method="post" enctype="multipart/form-data" action="<?= base_url('LeadPanel/document_text') ?>">
                                                <input type="hidden" class="form-control" name="lead_id" value="<?= sessionId('lid') ?>" />
                                                <?php
                                                $i = 0;

                                                $textdoc =   getWhereData('tbl_document_list', array('text_box' => '1'));
                                                if (!empty($textdoc)) {
                                                    foreach ($textdoc as $row) {
                                                        $i = $i + 1;
                                                        $count = getWhereData('tbl_document_text',  array('doc_id' => $row['did'], 'lead_id' => sessionId('lid')));
                                                ?>
                                                        <div class="col-sm-6 pd10">
                                                            <i class="las la-random"></i> <?= ucwords($row['document']) ?>
                                                            <input type="text" class="form-control <?= $row['attr_id'] ?>" name="remark[]" value="<?= (($count == '') ? '' : $count[0]['remark']) ?> " id="<?= $row['attr_id'] ?>" maxlength="<?= (($row['attr_id'] == 'Numberonly') ? '12' : (($row['attr_id'] == 'ContactNumber') ? '10' : ''))
                                                                                                                                                                                                                                                ?>">
                                                            </td>
                                                            <input type="hidden" class="form-control" name="doc_id[]" value="<?= $row['did'] ?>" />


                                                        </div>

                                                <?php
                                                    }
                                                }
                                                ?>

                                                <div class="col-sm-12">
                                                    <br>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                        Submit
                                                    </button>
                                                </div>


                                            </form>
                                        </div>


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

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
                                    <h5 class="card-title mb-3">Document List</h5>
                                    <table id="" class="table table-bordered" style="width:100%; overflow-x:scroll; ">
                                        <thead class="table-light">
                                            <tr>

                                                <th class="sort" data-sort="date">Document</th>

                                                <th class="sort" data-sort="lead_name">verified</th>
                                                <th class="sort" data-sort="lead_name">Doc. File</th>

                                                <th class="sort" data-sort="lead_name">Remark</th>

                                            </tr>
                                        </thead>
                                        <tbody class="list form-check-all">

                                            <form method="post" enctype="multipart/form-data" action="<?= base_url('LeadPanel/insert_document') ?>">
                                                <input type="hidden" class="form-control" name="lead_id" value="<?= sessionId('lid') ?>" />
                                                <?php
                                                $i = 0;
                                                if (!empty($doc)) {
                                                    foreach ($doc as $row) {
                                                        $i = $i + 1;
                                                ?>

                                                        <tr>

                                                            <td class="lead_name"> <i class="las la-random"></i> <?= ucwords($row['document']) ?></td>
                                                            <input type="hidden" class="form-control" name="doc_id[]" value="<?= $row['did'] ?>" />

                                                            <?php
                                                            $count = getWhereData('tbl_document',  array('doc_id' => $row['did'], 'lead_id' => sessionId('lid')));
                                                            ?>

                                                            <td class="lead_name"> <?php
                                                                                    if ($count != '') {
                                                                                        if ($count[0]['status'] == 1) {
                                                                                            echo '<button class="btn btn-success">Verified</button>';
                                                                                        } else {
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                <br>
                                                            </td>

                                                            <td>


                                                                <input type="file" class="form-control" name="image_temp[]">

                                                                <input type="hidden" class="form-control" name="image[]" value="<?php
                                                                                                                                if ($count != '') {
                                                                                                                                    echo $count[0]['image'];
                                                                                                                                }
                                                                                                                                ?>">




                                                                <?php
                                                                if ($count != '') {
                                                                    if ($count[0]['image'] != '') {
                                                                        echo '<a href="' . base_url() . 'uploads/files/' . $count[0]['image'] . '" target="_blank" class="btn btn-success">View</a>';
                                                                    } else {
                                                                        echo ' No file';
                                                                    }
                                                                }
                                                                ?>

                                                            </td>



                                                            <td> <?php
                                                                    if ($count != '') {
                                                                        echo $count[0]['remark'];
                                                                    } else {
                                                                        echo 'No Comment';
                                                                    }
                                                                    ?></td>
                                                        <?php
                                                    }
                                                        ?>



                                                        </tr>

                                                    <?php
                                                }

                                                    ?>
                                                    <tr>

                                                        <th colspan="1"></th>
                                                        <th>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                                                Submit
                                                            </button>
                                                        </th>
                                                    </tr>

                                            </form>


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="text-center">Submission of details:
                            </h1>
                            <h6 class="text-danger text-center">You can upload a submission file or enter details manually</h6>

                        </div>

                    </div>


                    <div class="row">
                        <div class="col-lg-12">


                            <div class="card">
                                <?php $file = getWhereData('tbl_submission_file',  array('lead_id' => sessionId('lid')));    ?>

                                <div class="card-body">
                                    <form method="post" enctype="multipart/form-data" action="<?= base_url('LeadPanel/insert_submission_file') ?>">
                                        <div class="row">
                                            <input type="hidden" class="form-control" name="lead_id" value="<?= sessionId('lid') ?>" />
                                            <div class="col-md-6">
                                                <label class="form-label">upload file</label>
                                                <input type="file" class="form-control" name="file_temp">

                                                <input type="hidden" class="form-control" name="file" value="<?php
                                                                                                                if ($file != '') {
                                                                                                                    echo $file[0]['file'];
                                                                                                                }
                                                                                                                ?>">
                                            </div>
                                            </br>

                                            <?php
                                            if ($file != '') {
                                            ?> <div class="col-md-6">
                                                    <br><a href="<?= base_url() ?>/uploads/submission/<?= $file[0]['file'] ?>" class="btn btn-light" target="_blank">
                                                        <img src="<?= base_url() ?>assets/document.png" height="50px"></a>
                                                </div>
                                            <?php
                                            }
                                            ?>
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


                    <div class="row">
                        <div class="col-12">


                            <div class="card">
                                <div class="card-body">
                                    <?php
                                    if (!empty($submission)) {
                                        foreach ($submission as $sub) {
                                            $pr = 0;
                                    ?>

                                            <table id="" class="table table-striped" style="width:100%">
                                                <h3><?= $sub['submissions'] ?> </h3>
                                                <thead class="table-light">
                                                    <tr>
                                                        <th class="sort" data-sort="date">Sno</th>
                                                        <th class="sort" data-sort="date">Bill Date</th>
                                                        <th class="sort" data-sort="date">Bill No.</th>
                                                        <th class="sort" data-sort="lead_name">Party Name</th>
                                                        <th class="sort" data-sort="lead_name">Amount</th>
                                                        <th class="sort" data-sort="lead_name">Payment</th>


                                                    </tr>
                                                </thead>
                                                <tbody class="list form-check-all">


                                                    <?php
                                                    $i = 0;

                                                    $submit = getWhereData('tbl_submission', array('submission_id' => $sub['sid'], 'lead_id' => sessionId('lid')));

                                                    if (!empty($submit)) {
                                                        foreach ($submit as $row) {
                                                            $i = $i + 1;

                                                            $submit_data = getWhereData('tbl_submission', array('sub_id' => $row['sub_id'], 'lead_id' => sessionId('lid')));

                                                            // print_r($submit_data);


                                                    ?>
                                                            <form method="post" enctype="multipart/form-data" action="<?= base_url('LeadPanel/update_submission') ?>">
                                                                <tr>
                                                                    <td class="lead_name"><?= $i; ?> </td>
                                                                    <td><?= $submit_data[0]['bill_date'] ?>
                                                                    </td>


                                                                    <td> <?= $submit_data[0]['bill_no'] ?>
                                                                    </td>


                                                                    <td><?= $submit_data[0]['party_name'] ?>
                                                                    </td>
                                                                    <td><?= $submit_data[0]['amount'] ?>
                                                                        <?php $pr += $submit_data[0]['amount'] ?>
                                                                    </td>

                                                                    <td>
                                                                        <?= $submit_data[0]['payment']; ?>
                                                                    </td>


                                                                </tr>
                                                            </form>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                    <tr>


                                                        <td colspan="4">
                                                        </td>
                                                        <td colspan="3">Total : <span class="totalamt<?= $sub['sid'] ?>"><?= $pr ?></span></td>

                                                    </tr>



                                                </tbody>
                                            </table>
                                    <?php
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>





                </div>

            </div>
            <?php $this->load->view('admin/template/footer_link'); ?>
        </div>
    </div>

    <script>
        $('.custom').on('change', function() {
            this.value = this.checked ? 1 : 0;
        }).change();


        $("#txtOnly").keypress(function(e) {
            var key = e.keyCode;
            if (key >= 48 && key <= 57) {
                e.preventDefault();
            }
        });



        $('.Numberonly').keyup(function(e) {
            if (/\D/g.test(this.value)) {
                // Filter non-digits from input value.
                this.value = this.value.replace(/\D/g, '');
            }
        });



        $('#PANNumber').keypress(function(event) {
            var key = event.which;
            var esc = (key == 127 || key == 8 || key == 0 || key == 46);
            $('#mainphone').text('Pan number is not valid');
            var regExp = /[a-zA-z]{5}\d{4}[a-zA-Z]{1}/;
            var txtpan = $(this).val();
            if (txtpan.length < 10) {
                if (txtpan.match(regExp)) {
                    $('#mainphone').text('Pan number is not valid');
                }
            } else {
                event.preventDefault();
            }
        });
    </script>

</body>

</html>