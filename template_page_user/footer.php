</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © webadmin.
            </div>
            </div>
        </div>
    </div>
</footer>

</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
<script src="<?= base_url(); ?>assets/user_page/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/user_page/libs/metismenujs/metismenujs.min.js"></script>
<script src="<?= base_url(); ?>assets/user_page/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/user_page/libs/eva-icons/eva.min.js"></script>

<!-- apexcharts -->
<script src="<?= base_url(); ?>assets/user_page/libs/apexcharts/apexcharts.min.js"></script>

<!-- Vector map-->
<script src="<?= base_url(); ?>assets/user_page/libs/jsvectormap/js/jsvectormap.min.js"></script>
<script src="<?= base_url(); ?>assets/user_page/libs/jsvectormap/maps/world-merc.js"></script>

<script src="<?= base_url(); ?>assets/user_page/js/app.js"></script>

<!-- Additional JS -->
<script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    <?php if (!empty($this->session->flashdata('succ_msg'))) { ?>
        Toast.fire({
            icon: "success",
            title: <?= json_encode(str_replace('`', '', $this->session->flashdata('succ_msg'))) ?>
        });

    <?php } ?>
    <?php if (!empty($this->session->flashdata('err_msg'))) { ?>
        Toast.fire({
            icon: "error",
            title: <?= json_encode(str_replace('`', '', $this->session->flashdata('err_msg'))) ?>
        });
    <?php } ?>
</script>

<script>
    function handleLogout() {
        let swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success rounded-1",
                cancelButton: "btn btn-danger rounded-1 me-2"
            },
            buttonsStyling: false
        });
        
        swalWithBootstrapButtons.fire({
            title: "Apakah anda yakin ingin keluar aplikasi?",
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                location.href = "<?= base_url('logout') ?>"
            }
        });
    }
</script>

<?php (!empty($js_script)) ? $this->load->view($js_script) : '' ?>

</body>

</html>