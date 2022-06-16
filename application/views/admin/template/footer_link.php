<script src="<?= base_url() ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/feather-icons/feather.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="<?= base_url() ?>assets/admin/js/plugins.js"></script>


<script src="<?= base_url() ?>assets/admin/libs/particles.js/particles.js"></script>
<script src="<?= base_url() ?>assets/admin/js/pages/particles.app.js"></script>
<script src="<?= base_url() ?>assets/admin/js/pages/password-addon.init.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/pages/dashboard-projects.init.js"></script>
<script src="<?= base_url() ?>assets/admin/js/app.js"></script>

<script src="<?= base_url() ?>assets/admin/libs/prismjs/prism.js"></script>

<!-- gridjs js -->
<script src="<?= base_url() ?>assets/admin/libs/gridjs/gridjs.umd.js"></script>
<!-- gridjs init -->
<script src="<?= base_url() ?>assets/admin/js/pages/gridjs.init.js"></script>
<!-- listjs init -->
<script src="<?= base_url() ?>assets/admin/js/pages/listjs.init.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>


<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- listjs init -->
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<!-- Sweet Alerts js -->
<script src="<?= base_url() ?>assets/admin/libs/sweetalert2/sweetalert2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    CKEDITOR.replace('editor1', {
        height: 200,
        extraPlugins: 'colorbutton,colordialog',
        removeButtons: '',
        removeButtons: 'PasteFromWord'
    });
</script>