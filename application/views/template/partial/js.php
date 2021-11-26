<script src="<?= base_url() ?>assets/admin/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/select2/js/select2.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/sweetalert2/sweetalert2.all.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url() ?>assets/theme/datatables/datatables.min.js"></script>

<!-- jsquery mask -->
<script src="<?= base_url() ?>assets/admin/libs/jquery-mask/jquery.mask.min.js"></script>
<script src="<?= base_url() ?>assets/admin/libs/autonumeric/autoNumeric.js"></script>

<script src="<?= base_url() ?>assets/admin/js/app.js"></script>
<script src="<?= base_url() ?>assets/admin/js/admin.js?version=<?= time() ?>"></script>
<?php if ($this->uri->segment(1) == 'konsultan') : ?>
    <script src="<?= base_url() ?>assets/konsultan/konsultan.js?version=<?= time() ?>"></script>
<?php endif; ?>